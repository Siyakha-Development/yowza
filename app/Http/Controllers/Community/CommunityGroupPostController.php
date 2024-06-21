<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityGroupPost;
use App\Models\Community\CommunityPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommunityGroupPostController extends Controller
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
    public function store(Request $request, $groupId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = new CommunityGroupPost();
        $post->user_id = Auth::id();
        $post->community_group_id = $groupId;
        $post->content = $request->content;
        $post->save();

        return redirect()->back();
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
