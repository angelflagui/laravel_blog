<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

/**
 * Class PostController
 *
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user_id = Auth::id();

        $posts = Post::where('user_id', $user_id)
                     ->latest()
                     ->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $avataName = '/uploads/' . time() . '.' . $request->image->getClientOriginalExtension();
        Image::make($request->image)->save(public_path() . $avataName, 60);

        $user_id = Auth::user()->id;

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user_id,
            'image' => $avataName
        ]);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request)
    {
        $post = Post::findOrFail($request->id);

        $avataName = '/uploads/' . time() . '.' . $request->image->getClientOriginalExtension();
        Image::make($request->image)->save(public_path() . $avataName, 60);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $avataName
        ]);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Post $post)
    {
        $post = Post::find($post->id);
        $post->delete();
        File::delete(public_path($post->image));

        return redirect()->route('admin.posts.index');
    }
}
