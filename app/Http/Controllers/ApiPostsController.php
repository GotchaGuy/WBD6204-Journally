<?php

namespace App\Http\Controllers;

use App\Mail\PostCreated;
use App\Mail\PostPublished;
use App\Post;
use Illuminate\Http\Request;

class ApiPostsController extends Controller
{
    public function index()
    {
        return Post::with('user', 'category')->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => \Auth::user()->id, 'category_id' => 1]);
        $post = Post::create($request->all());
//        \Mail::to(\Auth::user()->email)->send(new PostCreated($post));
        \Mail::to('v.lelicanin@sae.edu')->send(new PostCreated($post));
        return $post;
    }

    public function show($id)
    {
        return Post::find($id);
    }

}
