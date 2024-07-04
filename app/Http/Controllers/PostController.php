<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'status' => 'success',
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json([
            'status' => 'success',
            'post' => $post,
        ]);
    }
}
