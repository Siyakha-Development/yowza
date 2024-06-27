<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;


class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function show(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return view('notifications.show', compact('notification'));
    }
}
