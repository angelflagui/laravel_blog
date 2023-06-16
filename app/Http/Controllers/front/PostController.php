<?php

namespace App\Http\Controllers\front;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display all posts with their comments.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Get all posts with related users and comments, ordered by the latest date
        $posts = Post::with('user', 'comments')->latest()->get();

        // Return the 'front.posts.index' view, passing the posts as a variable
        return view('front.posts.index', compact('posts'));
    }

    /**
     * Display a specific post with its comments.
     *
     * @param  Post  $post The post to display
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        // Get all comments for the post with related users, ordered by the latest date
        $comments = Comment::where('post_id', $post->id)->with('user')
            ->latest()
            ->get();

        // Return the 'front.posts.post' view, passing the post and comments as variables
        return view('front.posts.post', compact('post', 'comments'));
    }
}
