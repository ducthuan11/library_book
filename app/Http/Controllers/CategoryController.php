<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return $categories;
    }
    public function  create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            Category::create(
                [
                    'name' => $request->get('name'),
                ]
            );
        } catch (Exception $e) {
            return Response::json([
                'message' => $e->getMessage(),
            ]);
        };
        return Response::json([
            'message' => 'Successfully created'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' =>   'required|string',
        ]);
        try {
            $category = Category::find($request->route('id'));

            $category->name = $request->get('name');
            $category->save();
        } catch (Exception $e) {
            return Response::json([
                'message' => $e->getMessage(),
            ]);
        };
    }
    public function detail(Request $request)
    {
        $category = Category::find($request->route('id'));
        return $category;
    }
    public function delete(Request $request)
    {
        $category = Category::find($request->route('id'));
        $category->delete();
    }
}
