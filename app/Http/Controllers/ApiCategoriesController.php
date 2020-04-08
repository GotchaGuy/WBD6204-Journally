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

    public function update(Request $request, $id)
    {

        $category = Category::where('id', $id)->update($request->all());
        $category->merge(['user_id' => \Auth::user()->id]);
        return $category;

//        return redirect('/categories');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->destroy();

        return $category;

//        return redirect('/categories');

    }
}
