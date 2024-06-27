<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Services\PointService;

class PostController extends Controller
{

    protected $pointService;

    public function __construct(PointService $pointService)
    {
        $this->pointService = $pointService;
    }
    //displays all published posts
    public function published_posts()
    {
        //Display all published posts,  eager loading related user, categories, and tags,
        $published_posts = Post::with('user', 'categories', 'tags')
            ->where('status', 'published')
            ->paginate(8);
        return view('admin.post.published_posts', compact('published_posts'));
    }
    //displays all pending_review posts
    public function pending_review_posts()
    {
        //Display all published posts,  eager loading related user, categories, and tags,
        $pending_review_posts = Post::with('user', 'categories', 'tags')
            ->where('status', 'pending_review')
            ->paginate(8);
        return view('admin.post.pending_review_posts', compact('pending_review_posts'));
    }


    //displays all ,published,draft,pending_review
    public function allBlogPost()
    {
        $posts = Post::with('user', 'categories', 'tags')->paginate(20);
        return view('admin.post.all_blog_post', compact('posts'));
    }

    //Display Draft
    public function draftPost()
    {
        //Display all posts in draft,  eager loading related user, categories, and tags,
        $draft_posts = Post::with('user', 'categories', 'tags')
            ->where('status', 'draft')
            ->paginate(8);
        return view('admin.post.draft', compact('draft_posts'));
    }

    public function d()
    {
        return 'Hi';
    }


    //Displays Post Form
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        //validate
        $request->validate([
            'title' => 'required',
            'categories' => 'required|array',  // Add validation for categories
            'tags' => 'required|array',  // Add validation for categories
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000', // adjust max file size as needed
        ]);


        $post = new Post;
        $post->title = $request->title;
        $post->post_content = $request->post_content;
        $post->description = $request->description;


        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/post_images/' . $post->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/post_images'), $filename);
            $post['image'] = $filename;
        }

        // Link the authenticated user to the post
        $post->user_id = Auth::id(); // Assuming the authenticated user is an admin

        $post->save();
        $post->categories()->sync($request->input('categories', []));
        $post->tags()->sync($request->tags); // Assuming tags are sent as an array
        $notification = array(
            'message' => 'blog post created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('post.all')->with($notification);
    }

    public function show($prefix, $id)
    {
        $posts = Post::latest()->paginate(3);

        // Retrieve the selected post along with its categories
        $post = Post::with('categories')->findOrFail($id);

        $post->increment('views'); // Increment the views count

        // Filter other posts by the category IDs
        $relatedPosts = Post::whereHas('categories', function ($query) use ($id) {
            $query->whereIn('categories.id', (array) $id);
        })->where('posts.id', '!=', $id)->paginate(5);

        //dd($post->title);
        if (Auth::check()) {
            $this->pointService->awardPoints(Auth::user(), 1, 'viewed_article');
        }

        // if (Auth::check()) {
        //     $user = Auth::user();
        //     if ($user instanceof User) {
        //         $this->pointService->awardPoints($user, 1, 'viewed_blog');
        //     }
        // }

        return view('admin.post.show', ['post' => $post, 'relatedPosts' => $relatedPosts]);
    }

    public function edit($prefix, $id)
    {

        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        $statuses = ['draft', 'pending_review', 'published']; // Define your enum options
        $notification = array(
            'message' => 'blog post created successfully',
            'alert-type' => 'success'
        );
        if (!$post === null) {
            return redirect()->back()->with($notification);
        }

        return view('admin.post.edit', compact('post', 'categories', 'tags', 'statuses'));

    }

    //function to update post
    public function update($prefix, Request $request, $id)
    {
        // Validation rules for updating a post
        $request->validate([
            'title' => 'required',
            'categories' => 'required|array',
            'tags' => 'required|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $post = Post::find($id);
        //dd($post->title);
        // Update the post attributes
        $post->title = $request->input('title');
        $post->post_content = $request->input('post_content');
        $post->description = $request->input('description');
        $post->status = $request->input('status');

        // Handle image upload
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/post_images'), $filename);
            $post->image = $filename;
        }

        // Save the updated post
        $post->save();

        // Sync categories and tags
        $post->categories()->sync($request->input('categories', []));
        $post->tags()->sync($request->input('tags', []));

        // Redirect back with success message
        $notification = [
            'message' => 'Post updated successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.post.all_blog_post',['prefix'=>'admin'])->with($notification);
    }

    public function destroy($prefix, $id)
    {
        // dd($id);
        $post = Post::find($id);

        // Delete the post's image file
        if ($post->image) {
            $imagePath = public_path('upload/post_images/' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the post's categories
        $post->categories()->detach();

        // Delete the post's tags
        $post->tags()->detach();

        // Delete the post
        $post->delete();

        // Redirect to the list of blog posts with a success message
        $notification = array(
            'message' => 'Blog post deleted successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('post.all')->with($notification);
    }

    //Search

}
