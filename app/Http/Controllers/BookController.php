<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    public function show()
    {
        $books = Book::all();

        return $books;
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'publisher_id' => 'required',
            'pagenumber' => 'required|integer',
            'author' => 'required',

        ]);
        try {
            Book::create(
                [
                    'name' => $request->get('name'),
                    'publisher_id' => $request->get('publisher_id'),
                    'pagenumber' => $request->get('pagenumber'),
                    'author' => $request->get('author'),
                ]
            );
        } catch (Exception $e) {
            return Response::json([
                'message' => $e->getMessage(),
            ]);
        }

        return Response::json([
            'message' => 'Successfully created'
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' =>   'required',
            'publisher_id' => 'required',
            'pagenumber' => 'required|integer|integer',
            'author' => 'required|string',
        ]);
        try {
            $book = Book::find($request->route('id'));

            $book->name = $request->get('name');
            $book->publisher_id = $request->get('publisher_id');
            $book->pagenumber = $request->get('pagenumber');
            $book->author = $request->get('author');
            $book->save();
        }catch(Exception $e){
            return Response::json([
               'message' => $e->getMessage(),
            ]);
        }
    }

    public function detail(Request $request)
    {
        $book = Book::find($request->route('id'));

        return $book;
    }

    public function delete(Request $request)
    {
        $book = Book::find($request->route('id'));
        $book->delete();
    }
}
