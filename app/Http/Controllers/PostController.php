<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $search =  $request->query('search');
        $posts = Post::where('is_published', 1)
                ->whereAny([
                    'title',
                    'content',
                ], 'LIKE', "%$search%")
                ->orderBy('view_count', 'DESC')
                ->paginate(9);
        return response()->json([
            'status' => 'success',
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::where('is_published', 1)->find($id);
        return response()->json([
            'status' => 'success',
            'post' => $post,
        ]);
    }

    function popularPosts() {

        $posts = Post::where('is_published', 1)->orderBy('view_count', 'DESC')->limit(6)->get();
        return response()->json([
            'status' => 'success',
            'posts' => $posts,
        ]);
    }

    function recentPosts() {

        $posts = Post::where('is_published', 1)->orderBy('created_at', 'DESC')->limit(4)->get();
        return response()->json([
            'status' => 'success',
            'posts' => $posts,
        ]);
    }
}
