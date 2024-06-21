<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentLibraryCategory;
use App\Models\DownloadHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\RedirectResponse;

class DocumentLibraryController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (!Gate::allows('course_access')) {
            return abort(401);
        }

        $categories = DocumentLibraryCategory::withCount('documents')->get();
        $documents = Document::paginate(10);
        $recentDownloads = collect();

        $prefix = 'admin';

        if (auth()->check()) {
            // Retrieve documents downloaded by the current user
            $recentDownloads = auth()->user()->downloadHistories()->with('document')->get();
        }

        return view('admin.library.index', compact('documents', 'recentDownloads', 'categories', 'prefix'));
    }

    public function create()
    {
        $this->middleware('permission:create-user');
        $prefix = 'admin';
        $categories = DocumentLibraryCategory::all();
        return view('admin.library.create', compact('prefix', 'categories'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'document_library_category_id' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
            'date' => 'nullable|date',
            'file' => 'nullable|mimes:pdf,pptx,docx|max:2048',
        ]);

        // Map category names to their respective IDs
        $categoryMappings = [
            'Compliance' => 1,
            'Funding and tenders' => 2,
            'Finance' => 3,
            'HR' => 4,
            'Legal' => 5,
            'Marketing and Sales' => 6,
            'Operations' => 7,
        ];

        // Get the category ID based on the selected category name
        $documentLibraryCategoryId = $request->document_library_category_id ? $categoryMappings[$request->document_library_category_id] : null;

        $document = new Document();
        $document->name = $request->name;
        $document->document_library_category_id = $documentLibraryCategoryId;
        $document->status = $request->status;
        $document->date = $request->date;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            // Store the file in the public/documents directory
            $filePath = $file->storeAs('public/documents', $fileName);

            // Set the file path relative to the public directory
            $document->file_path = $filePath;
        }

        $document->save();
        $notification = [
            'message' => 'Document created successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.document-library.index', ['prefix' => 'admin'])->with($notification);
    }


    public function show(Document $document)
    {
        return view('admin.library.show', compact('document'));
    }

    public function view(Document $document)
    {
        // Create a new record in download history
        $downloadHistory = new DownloadHistory();
        $downloadHistory->document_id = $document->id;
        $downloadHistory->user_id = auth()->id(); // Assuming the user is authenticated
        $downloadHistory->downloaded_at = now();
        $downloadHistory->save();

        // Redirect the user to download the file
        return redirect(asset('storage/' . $document->file_path));
    }

    public function downloadFile($id)
    {
        $document = Document::findOrFail($id);

        $filePath = $document->file_path;
        $fileName = $document->file_name;

        // Ensure the file exists
        if (!Storage::exists($filePath)) {
            abort(404, 'File not found');
        }

        // Log the file size for debugging
        $fileSize = Storage::size($filePath);
        Log::info("File size of $fileName: $fileSize bytes");

        // Get the file's MIME type
        $mimeType = Storage::mimeType($filePath);

        // Create a streamed response to download the file
        return response()->streamDownload(function () use ($filePath) {
            $stream = Storage::readStream($filePath);
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, $fileName, ['Content-Type' => $mimeType]);
    }

    public function recordDownload($id)
    {
        $document = Document::findOrFail($id);

        // Record the download history
        DownloadHistory::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'document_id' => $document->id,
            'downloaded_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }

    // public function downloadFile($id)
    // {
    //     $document = Document::findOrFail($id);

    //     $filePath = $document->file_path;
    //     $fileName = $document->file_name;

    //     // Ensure the file exists
    //     if (!Storage::exists($filePath)) {
    //         abort(404, 'File not found');
    //     }

    //     // Log the file size for debugging
    //     $fileSize = Storage::size($filePath);
    //     Log::info("File size of $fileName: $fileSize bytes");

    //     // Get the file's MIME type
    //     $mimeType = Storage::mimeType($filePath);

    //     // Record the download history
    //     DownloadHistory::create([
    //         'user_id' => auth()->id(), // Assuming the user is authenticated
    //         'document_id' => $document->id,
    //         'downloaded_at' => now(),
    //     ]);

    //     // Create a streamed response to download the file
    //     return response()->streamDownload(function () use ($filePath) {
    //         $stream = Storage::readStream($filePath);
    //         fpassthru($stream);
    //         if (is_resource($stream)) {
    //             fclose($stream);
    //         }
    //     }, $fileName, ['Content-Type' => $mimeType]);
    // }


    // public function downloadFile($id): RedirectResponse
    // {
    //     $document = Document::findOrFail($id);

    //     $filePath = $document->file_path;
    //     $fileName = $document->file_name;

    //     // Ensure the file exists
    //     if (!Storage::exists($filePath)) {
    //         abort(404, 'File not found');
    //     }

    //     // Log the file size for debugging
    //     $fileSize = Storage::size($filePath);
    //     Log::info("File size of $fileName: $fileSize bytes");

    //     // Set the file path relative to the public directory
    //     $publicFilePath = str_replace('public/', '', $filePath);

    //     // Get the file's MIME type
    //     $mimeType = Storage::mimeType($filePath);

    //     // Record the download history
    //     DownloadHistory::create([
    //         'user_id' => auth()->id(), // Assuming the user is authenticated
    //         'document_id' => $document->id,
    //         'downloaded_at' => now(),
    //     ]);

    //     // Create a streamed response to download the file
    //     $response = response()->streamDownload(function () use ($filePath) {
    //         $stream = Storage::readStream($filePath);
    //         fpassthru($stream);
    //         if (is_resource($stream)) {
    //             fclose($stream);
    //         }
    //     }, $fileName, ['Content-Type' => $mimeType]);

    //     // Flash a message to the session to indicate the download
    //     return back()->with('downloaded', true);
    // }

    //    public function downloadFile($id): StreamedResponse
//    {
//        $document = Document::findOrFail($id);
//
//        $filePath = $document->file_path;
//        $fileName = $document->file_name;
//
//        // Ensure the file exists
//        if (!Storage::exists($filePath)) {
//            abort(404, 'File not found');
//        }
//
//        // Log the file size for debugging
//        $fileSize = Storage::size($filePath);
//        Log::info("File size of $fileName: $fileSize bytes");
//
//        // Set the file path relative to the public directory
//        $publicFilePath = str_replace('public/', '', $filePath);
//
//        // Get the file's MIME type
//        $mimeType = Storage::mimeType($filePath);
//
//        // Record the download history
//        DownloadHistory::create([
//            'user_id' => auth()->id(), // Assuming the user is authenticated
//            'document_id' => $document->id,
//            'downloaded_at' => now(),
//        ]);
//
//        // Create a streamed response to download the file
//        return response()->streamDownload(function () use ($filePath) {
//            $stream = Storage::readStream($filePath);
//            fpassthru($stream);
//            if (is_resource($stream)) {
//                fclose($stream);
//            }
//        }, $fileName, ['Content-Type' => $mimeType]);
//    }

    //    public function download($id)
//    {
//        // Find the document by its ID
//        $document = Document::findOrFail($id);
//
//        // Check if the file exists
//        if (Storage::disk('public')->exists($document->file_path)) {
//            // Get the file path
//            $filePath = storage_path('app/public/' . $document->file_path);
//
//            // Return the file as a downloadable response
//            return response()->download($filePath, $document->name);
//        } else {
//            // If the file doesn't exist, return a 404 error
//            abort(404, 'File not found');
//        }
//    }





    //    public function download(Document $document): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
//    {
//        // Save the download history
//        DownloadHistory::create([
//            'user_id' => auth()->id(), // Assuming the user is authenticated
//            'document_id' => $document->id,
//            'downloaded_at' => now(),
//        ]);
//
//        // Redirect the user to download the file
//        return redirect(asset('storage/' . $document->file_path));
//    }

    public function edit(Document $document)
    {
        $this->middleware('permission:create-user');
        return view('admin.library.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
            'date' => 'required|date',
        ]);

        $document->update([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'status' => $request->input('status'),
            'date' => $request->input('date'),
        ]);

        return redirect()->route('admin.library.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        $this->middleware('permission:create-user');
        $document->delete();
        return redirect()->route('admin.library.index')->with('success', 'Document deleted successfully.');
    }
}
