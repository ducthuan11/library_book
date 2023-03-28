<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(){
        $categories = Category::all();
        return $categories;
    }
    public function  create(Request $request){
        Category::create(
            [
                'name' => $request->get('name'),
            ]
        );
    }
}
