<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {


        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6),
            // simplePaginate(6)
        ]);
    }

    public function show(Post $post)
    {

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }


    // protected function getPosts()
    // {
    // $posts = Post::latest();

    // if (request('search')) {
    //     $posts
    //         ->where('title', 'like', '%' . request('search')  . '%')
    //         ->orWhere('body', 'like', '%' . request('search') . '%');
    // }

    // return $posts->get();
    // }
}
