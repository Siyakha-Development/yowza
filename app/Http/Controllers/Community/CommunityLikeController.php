<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommunityLikeController extends Controller
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'likeable_id' => 'required|integer',
    //         'likeable_type' => 'required|string',
    //     ]);

    //     $like = new CommunityLike();
    //     $like->user_id = Auth::id();
    //     $like->likeable_id = $request->likeable_id;
    //     $like->likeable_type = $request->likeable_type;
    //     $like->save();

    //     return redirect()->back();
    // }

    public function store(Request $request)
    {
        $request->validate([
            'likeable_id' => 'required|integer',
            'likeable_type' => 'required|string',
        ]);

        // Prevent duplicate likes
        $like = CommunityLike::where('user_id', Auth::id())
            ->where('likeable_id', $request->likeable_id)
            ->where('likeable_type', $request->likeable_type)
            ->first();

        if (!$like) {
            $like = new CommunityLike();
            $like->user_id = Auth::id();
            $like->likeable_id = $request->likeable_id;
            $like->likeable_type = $request->likeable_type;
            $like->save();
        }

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
