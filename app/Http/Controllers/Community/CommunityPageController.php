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
        $posts = CommunityPost::with(['user.profileImage'])->latest()->get();
        $stories = CommunityStories::latest()->get();
        return view("community.index", compact('posts', 'stories'));
    }
}
