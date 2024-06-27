<?php

namespace App\Http\Controllers;

use App\Mail\NewListingNotification;
use App\Models\Listing;
use App\Models\MarketplaceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = MarketplaceCategory::all();
        $listings = Listing::with('ratings','user')
            ->orderBy('average_rating', 'desc')
            ->get();

        return view('marketplace.listings.index',compact('categories','listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pg_listings = Listing::with('ratings')->paginate(5); // 5 items per pag
        return view('marketplace.listings.create',compact('pg_listings'));
    }

    public function create_List()
    {
        return view('marketplace.listings.create-listing');
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
                'location' => 'required|string',
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

            // Check if the listing already exists for the user
            $listing = Listing::create([
                'user_id' => $userId,
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'availability' => $validatedData['availability'],
                'sku' => $validatedData['sku'],
                'category' => $validatedData['category'],
                'tags' => $validatedData['tags'],
                'location' => $validatedData['location'],
                'product_image' => json_encode($images, JSON_UNESCAPED_SLASHES)
            ]);

            Log::info('Uploaded images: ' . json_encode($images, JSON_UNESCAPED_SLASHES));
            Log::info('Saved listing: ', $listing->toArray());

            // Send email to all users
            $users = User::all();
            foreach ($users as $user) {
                Mail::to($user->email)->queue(new NewListingNotification($listing));
            }


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
    public function edit( $id)
    {
        $listing = Listing::findOrFail($id);
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
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'availability' => 'nullable|string',
                'sku' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'tags' => 'nullable|string',
                'location' => 'required',
                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validate each file in the array
            ]);

            $userId = Auth::id();
            $listing = Listing::where('id', $id)->where('user_id', $userId)->firstOrFail();

            $images = json_decode($listing->product_image, true) ?? [];

            if ($request->hasFile('product_image')) {
                foreach ($request->file('product_image') as $file) {
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $path = $file->storeAs('images', $filename, 'public');
                    $images[] = $path;
                }
            }

            $listing->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'availability' => $validatedData['availability'],
                'sku' => $validatedData['sku'],
                'category' => $validatedData['category'],
                'tags' => $validatedData['tags'],
                'location' => $validatedData['location'],
                'product_image' => json_encode($images, JSON_UNESCAPED_SLASHES)
            ]);

            Log::info('Updated images: ' . json_encode($images, JSON_UNESCAPED_SLASHES));
            Log::info('Updated listing: ', $listing->toArray());

            // Prepare success notification
            $notification = array(
                'message' => 'Product Item updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('marketplace.listing.index')->with($notification);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating listing: ' . $e->getMessage());

            // Prepare error notification
            $notification = array(
                'message' => 'There was an error updating the product item. Please try again.',
                'alert-type' => 'error'
            );

            return redirect()->back()->withInput()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
