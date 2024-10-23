<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment_text' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            'post_id' => $postId,
            'user_id' => $request->user()->id,
            'comment_text' => $request->input('comment_text')
        ]);

        return redirect()->route('posts.show', $postId)->with('success', 'Комментарий успешно добавлен!');
    }




    public function destroy($commentId, $postId)
    {
        Comment::destroy($commentId);
        return redirect()->route('posts.show', $postId)->with('success', 'Комментарий удален');
    }
}
