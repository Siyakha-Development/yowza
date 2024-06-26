<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityStories;
use Illuminate\Http\Request;
use App\Models\Community\CommunityPost;

class CommunityPageController extends Controller
{
    //
    public function index()
    {
        // $posts = CommunityPost::with('user')->latest()->get();
        $posts = CommunityPost::with(['user.profileImage', 'comments.user.profileImage'])->latest()->get();

        foreach ($posts as $post) {
            \Log::info('Post ID: ' . $post->id);
            \Log::info('User: ' . $post->user ? $post->user->name : 'No User');
            \Log::info('Profile Image: ' . $post->user && $post->user->profileImage ? $post->user->profileImage->profile_picture : 'No Profile Image');
        }
        $stories = CommunityStories::latest()->get();
        return view("community.index", compact('posts', 'stories'));
    }
}
