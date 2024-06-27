<?php

namespace App\Http\Controllers;

use App\Mail\ListingInquiry;
use App\Models\Listing;
use App\Notifications\ListingInquiryNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class InquiryController extends Controller
{
    public function store(Request $request, Listing $listing)
    {
        try {
            // Validate the request data
            $request->validate([
                'message' => 'required',
            ]);

            $inquiry = $request->all();

            // Send the email
            Mail::to($listing->user->email)->send(new ListingInquiry($request->all(), $listing));

            // Send the notification
            Notification::send($listing->user, new ListingInquiryNotification($listing, $inquiry));

            // Optionally, you can notify the owner via another channel here

            return redirect()->route('marketplace.listing.index')->with('success', 'Your inquiry has been sent successfully!');
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Error sending inquiry email: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error sending your inquiry. Please try again later.');
        }
    }

}
