<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Rating;
use Illuminate\Http\Request;

class ListingRatingController extends Controller
{
    public function store(Request $request, Listing $listing)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = new Rating([
            'user_id' => auth()->id(),
            'listing_id' => $listing->id,
            'rating' => $request->rating,
        ]);

        $rating->save();

        return redirect()->back()->with('success', 'Thank you for your rating!');
    }
}
