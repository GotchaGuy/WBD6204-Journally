<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ApiCategoriesController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        return $categories;
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => \Auth::user()->id]);
        $category = Category::create($request->all());
//        event(new PostCreated($post));
//        \Mail::to(\Auth::user()->email)->send(new PostCreated($post));
//        \Mail::to('v.lelicanin@sae.edu')->send(new PostCreated($post));
//        , 'category_id' => 1
        return $category;
    }
}
