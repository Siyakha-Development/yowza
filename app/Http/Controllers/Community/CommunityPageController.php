<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community\CommunityPost;

class CommunityPageController extends Controller
{
    //
    public function index()
    {
        $posts = CommunityPost::with('user')->latest()->get();
        return view("community.index", compact('posts'));
    }
}
