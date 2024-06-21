<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfileImage;

class UserProfileImageController extends Controller
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
        $user = Auth::user();

        // Validate the incoming request data
        $validatedData = $request->validate([
            'profile_picture' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/profile_pictures'), $filename);

            // Update or create profile image record
            $user->profileImage()->updateOrCreate(
                ['user_id' => $user->id],
                ['profile_picture' => $filename]
            );

            // Prepare a notification for the user
            $notification = [
                'message' => 'Profile picture updated successfully',
                'alert-type' => 'info'
            ];

            // Redirect back with the notification
            return back()->with($notification);
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
}
