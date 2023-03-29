<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PublisherController extends Controller
{
    public function show()
    {
        $publishers = Publisher::all();
        return $publishers;
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            Publisher::create(
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
            'name' => 'required|string',
        ]);
        try {
            $publisher = Publisher::find($request->route('id'));
            $publisher->name = $request->get('name');
            $publisher->save();
        } catch (Exception $e) {
            return Response::json([
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function detail(Request $request)
    {
        $publisher = Publisher::find($request->route('id'));
        return $publisher;
    }
    public function delete(Request $request)
    {
        
            $publisher = Publisher::find($request->route('id'));
            $publisher->delete();
    }
}
