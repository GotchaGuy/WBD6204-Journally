<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('category-edit');
    }

      public function show($id)
    {

       $category =  Category::find($id);

         return view("category", compact("category"));
    }

//    public function edit($id)
//    {
//
//        $post = Category::find($id);
//
//        return view("post-edit");
//    }

    public function update(Request $request, $id)
    {
        Category::where('id', $id)->update($request->all());

        return redirect('/categories');
    }

    public function delete($id)
    {
        Category::where('id', $id)->destroy();

        return redirect('/categories');

    }
}
