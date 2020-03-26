<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($id)
    {

       $post =  Post::find($id);

         return view("post", compact("post"));
    }

     public function edit($id)
    {

 $post =  Post::find($id);

         return view("post-edit", compact("post"));
    }

    public function update($id)
    {

    }
}
