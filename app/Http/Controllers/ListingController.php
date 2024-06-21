<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\MarketplaceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = MarketplaceCategory::all();
        $listing = Listing::all();

        return view('marketplace.listings.index',compact('categories','listing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marketplace.listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'availability' => 'nullable|string',
                'sku' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'tags' => 'nullable|string',
                'preferences' => 'required|array', // Assuming preferences is an array
                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validate each file in the array
            ]);

            $userId = Auth::id();
            $images = [];

            if ($request->hasFile('product_image')) {
                foreach ($request->file('product_image') as $file) {
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $path = $file->storeAs('images', $filename, 'public');
                    $images[] = $path;
                }
            }

            foreach ($validatedData['preferences'] as $preference) {
                $listing = Listing::firstOrCreate(
                    ['preferences' => json_encode($preference,JSON_UNESCAPED_SLASHES), 'user_id' => $userId],
                    [
                        'title' => $validatedData['title'],
                        'description' => $validatedData['description'],
                        'price' => $validatedData['price'],
                        'availability' => $validatedData['availability'],
                        'sku' => $validatedData['sku'],
                        'category' => $validatedData['category'],
                        'tags' => $validatedData['tags'],
                        'product_image' => json_encode($images,JSON_UNESCAPED_SLASHES)
                    ]
                );
            }

            Log::info('Uploaded images: ' . json_encode($images,JSON_UNESCAPED_SLASHES));
            Log::info('Saved listing: ', $listing->toArray());


            // Prepare success notification
            $notification = array(
                'message' => 'Product Item created successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('marketplace.listing.index')->with($notification);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error creating listing: ' . $e->getMessage());

            // Prepare error notification
            $notification = array(
                'message' => 'There was an error creating the product item. Please try again.',
                'alert-type' => 'error'
            );

            return redirect()->back()->withInput()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        // Ensure the user owns the listing
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('marketplace.listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
