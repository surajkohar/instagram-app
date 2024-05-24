<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments'])->get();
        return view('home', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return response()->json(['success' => true]);
    }
}
