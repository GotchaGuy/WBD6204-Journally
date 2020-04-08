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

        foreach ($posts as $key => $post) {
            $posts[$key]->body = \Str::limit($post->body, 160);
            $posts[$key]->timestamp = \Carbon\Carbon::parse($post->updated_at)->format('M d Y');
        }

        return $posts;
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => \Auth::user()->id]);
        $post = Post::create($request->all());
        event(new PostCreated($post));
//        \Mail::to(\Auth::user()->email)->send(new PostCreated($post));
//        \Mail::to('v.lelicanin@sae.edu')->send(new PostCreated($post));
        return $post;
    }


}
