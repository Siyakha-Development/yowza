<?php

namespace App\Http\Controllers;

use App\Mail\AdminRSVPCancellation;
use App\Mail\UserRSVPCancellation;
use Illuminate\Http\Request;
use App\Models\RSVP;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRSVPConfirmation;
use App\Mail\AdminRSVPNotification;

class RSVPController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $userId = Auth::id();
        $eventId = $request->input('event_id');

        try {
            // Check if the user has already RSVPed for the event
            $existingRSVP = RSVP::where('user_id', $userId)->where('event_id', $eventId)->first();

            if ($existingRSVP) {
                return redirect()->back()->with('error', 'You have already RSVPed for this event.');
            }

            // Create a new RSVP
            $rsvp = RSVP::create([
                'user_id' => $userId,
                'event_id' => $eventId,
            ]);

            $event = Event::findOrFail($eventId);

            // Send confirmation email to user
            Mail::to(Auth::user()->email)->send(new UserRSVPConfirmation($event));

            // Get the total number of RSVPs for the event
            $rsvpCount = RSVP::where('event_id', $eventId)->count();

            // Send notification email to admin
            Mail::to('admin@gmail.com')->send(new AdminRSVPNotification($event, $rsvpCount));

            $notification = [
                'message' => 'Event Successfully Updated',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            // Handle the error
            $notification = [
                'message' => 'Error: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            // Redirect back with an error message
            return redirect()->back()->with($notification);
        }
    }

    public function cancel(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $userId = Auth::id();
        $eventId = $request->input('event_id');

        try {
            // Check if the user has an RSVP for the event
            $rsvp = RSVP::where('user_id', $userId)->where('event_id', $eventId)->first();

            if (!$rsvp) {
                return redirect()->back()->with('error', 'You have not RSVPed for this event.');
            }

            // Delete the RSVP
            $rsvp->delete();

            $event = Event::findOrFail($eventId);

            // Send cancellation email to user
            Mail::to(Auth::user()->email)->send(new UserRSVPCancellation($event));

            // Get the total number of RSVPs for the event
            $rsvpCount = RSVP::where('event_id', $eventId)->count();

            // Send notification email to admin
            Mail::to('admin@example.com')->send(new AdminRSVPCancellation($event, $rsvpCount));

            $notification = [
                'message' => 'RSVP successfully cancelled. A confirmation email has been sent to you.',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);

        } catch (\Exception $e) {
            // Handle the error
            $notification = [
                'message' => 'Error: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            // Redirect back with an error message
            return redirect()->back()->with($notification);
        }
    }
}
