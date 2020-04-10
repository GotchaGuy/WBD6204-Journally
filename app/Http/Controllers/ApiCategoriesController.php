<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ApiCategoriesController extends Controller
{
    public function index()
    {

        return Category::all();

    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => \Auth::user()->id]);
        return Category::create($request->all());
//        event(new PostCreated($post));
//        \Mail::to(\Auth::user()->email)->send(new PostCreated($post));
//        \Mail::to('v.lelicanin@sae.edu')->send(new PostCreated($post));

    }

    public function update(Request $request, $id)
    {

       return Category::where('id', $id)->update([
           'title' => $request->input('title'),
        ]);

    }

    public function delete($id)
    {
      return Category::destroy($id);


    }
}
