<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Mydnic\Subscribers\Models\Subscriber;
use App\Models\Subscriber;
use App\Notifications\SubscriptionConfirmation;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
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
    public function subscribe(Request $request)
    {
        $user = Auth::user();

        // Check if the user is already subscribed
        $existingSubscriber = Subscriber::where('email', $user->email)->first();

        if ($existingSubscriber) {
            return redirect()->back()->with('message', 'You are already subscribed to the newsletter.');
        }

        // Create a new subscriber
        Subscriber::create([
            'email' => $user->email,
            'name' => $user->name,
        ]);

        // Send email notification
        $user->notify(new SubscriptionConfirmation());

        return redirect()->back()->with('message', 'You have successfully subscribed to the newsletter. Check your email for confirmation.');
    }

    // public function subscribe(Request $request)
    // {
    //     $user = Auth::user();

    //     // Check if the user is already subscribed
    //     $existingSubscriber = Subscriber::where('email', $user->email)->first();

    //     if ($existingSubscriber) {
    //         return redirect()->back()->with('message', 'You are already subscribed to the newsletter.');
    //     }

    //     // Create a new subscriber
    //     Subscriber::create([
    //         'email' => $user->email,
    //         'name' => $user->name,
    //     ]);

    //     return redirect()->back()->with('message', 'You have successfully subscribed to the newsletter.');
    // }
}
