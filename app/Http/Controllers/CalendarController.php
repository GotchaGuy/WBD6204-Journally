<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {

//        $posts = Post::with('user', 'category')->orderBy('created_at', 'desc')->get();

        return view('calendar');
    }
}
