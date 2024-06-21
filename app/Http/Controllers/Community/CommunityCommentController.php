<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityComment;
use App\Models\Community\CommunityPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CommunityCommentController extends Controller
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
    public function store($prefix, Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Find the community post by $postId to validate existence
        $post = CommunityPost::findOrFail($postId);

        // Create a new comment
        $comment = new CommunityComment();
        $comment->user_id = Auth::id();
        $comment->community_post_id = $postId; // Assign the correct post ID here
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
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
