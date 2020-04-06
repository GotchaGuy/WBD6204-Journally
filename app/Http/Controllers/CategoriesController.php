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
}
