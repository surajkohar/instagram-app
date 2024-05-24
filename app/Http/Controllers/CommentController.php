<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $post = Post::find($request->post_id);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment
        ]);

        return response()->json(['success' => true]);
    }
}
