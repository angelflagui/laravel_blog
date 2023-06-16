<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

/**
 * Class CommentController
 *
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param CommentRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, $id)
    {
        Comment::create([
            'id' => $request->id,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'post_id' => $id
        ]);

        return back();
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified comment in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment = Comment::findOrFail($request->id);

        $comment->update([
            'content' => $request->content
        ]);

        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
