<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $request->validate([
            'content' => 'required|max:500',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $post = Post::findOrFail($request->post_id);

        if ($request->parent_id) {
            $parentComment = Comment::findOrFail($request->parent_id);

            if ($parentComment->replies) {
                return back()->with('error', 'Komentar ini sudah memiliki balasan.');
            }
        }

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->parent_id = $request->parent_id;
        $comment->save();

        return back()->with('success', __('comment.comment_successfully'));
    }
}
