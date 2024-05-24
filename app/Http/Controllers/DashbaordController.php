<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function index()
    {
     
        $posts = Post::with(['user', 'likes', 'comments'])->get();
        return view('admin.index', compact('posts'));
    }
}
