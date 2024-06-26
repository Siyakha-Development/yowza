<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityStories;
use Illuminate\Http\Request;


class CommunityStoryController extends Controller
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/community_stories'), $imageName);

        $story = new CommunityStories();
        $story->user_id = auth()->id();
        $story->image = $imageName;
        $story->caption = $request->caption;
        $story->save();

        return redirect()->back()->with('message', 'Story uploaded successfully.');
    }

    public function userStories($prefix, $userId)
    {
        $stories = CommunityStories::where('user_id', $userId)->latest()->get();
        return response()->json($stories);
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
