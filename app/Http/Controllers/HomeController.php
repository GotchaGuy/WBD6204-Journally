<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('user', 'category')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();
         foreach ($posts as $key => $post) {
            $posts[$key]->body = \Str::limit($post->body, 160);
            $posts[$key]->timestamp = \Carbon\Carbon::parse($post->updated_at)->format('M d Y');
        }
        return view('home', compact('posts', 'categories'));
    }
}
