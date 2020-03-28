<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Mail\PostPublished;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiPostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'category')->orderBy('created_at', 'desc')->get();
//        foreach($posts as $key => $post) {
//            $posts[$key]->body = \Str::limit($post->body, '120') . "..";
//        }

        return $posts;
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => \Auth::user()->id, 'category_id' => 1]);
        $post = Post::create($request->all());
        event(new PostCreated($post));
//        \Mail::to(\Auth::user()->email)->send(new PostCreated($post));
//        \Mail::to('v.lelicanin@sae.edu')->send(new PostCreated($post));
        return $post;
    }



}
