<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    //
    public function update(Request $request, $lessonId)
    {
        // Validate the request
        $request->validate([
            'completed' => 'required|boolean',
        ]);

        // Find or create the progress record for the current user and lesson
        $progress = Progress::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'lesson_id' => $lessonId,
            ],
            [
                'completed' => $request->completed,
            ]
        );

        // Return the progress data as JSON response
        return response()->json($progress);
    }
}
