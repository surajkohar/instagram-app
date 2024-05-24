<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $post = Post::find($request->post_id);
        if (!$post) {
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }

        $like = $post->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            // If already liked, unlike it
            $like->delete();
        } else {
            // Otherwise, like it
            $post->likes()->create([
                'user_id' => auth()->id()
            ]);
        }

        return response()->json(['success' => true]);
    }
}
