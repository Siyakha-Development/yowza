<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommunityPostRequest;
use App\Models\Community\CommunityPost;
use Illuminate\Support\Facades\Validator;
use App\Services\PointService;
use Illuminate\Support\Facades\Auth;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $pointService;

    public function __construct(PointService $pointService)
    {
        $this->pointService = $pointService;
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $posts = CommunityPost::with('user', 'comments', 'likes')->latest()->get();
        return view('posts.index', compact('posts'));
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
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $post = new CommunityPost();
        $post->user_id = auth()->id(); // Use authenticated user's ID
        $post->content = $request->content;

        if ($request->hasFile('post_image')) {
            $imagePath = $request->file('post_image')->store('post_images', 'public');
            $post->post_image = $imagePath;
        }

        $post->save();
        $user = Auth::user();
        $this->pointService->awardPoints($user, 5, 'Created Post');

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
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
