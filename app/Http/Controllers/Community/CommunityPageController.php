<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityStories;
use Illuminate\Http\Request;
use App\Models\Community\CommunityPost;
use Illuminate\Support\Facades\Auth;

class CommunityPageController extends Controller
{
    //
    public function index()
    {
        // $posts = CommunityPost::with('user')->latest()->get();
        $user = Auth::user();
        $posts = CommunityPost::with(['user.profileImage', 'comments.user.profileImage'])->latest()->get();

        foreach ($posts as $post) {
            \Log::info('Post ID: ' . $post->id);
            \Log::info('User: ' . $post->user ? $post->user->name : 'No User');
            \Log::info('Profile Image: ' . $post->user && $post->user->profileImage ? $post->user->profileImage->profile_picture : 'No Profile Image');
        }
        $stories = CommunityStories::where('user_id', $user->id)->latest()->get();
        return view("community.index", compact('posts', 'stories'));
    }

    public function userStories($prefix, $userId)
    {
        $stories = CommunityStories::where('user_id', $userId)->latest()->get();
        return response()->json($stories);
    }
}
