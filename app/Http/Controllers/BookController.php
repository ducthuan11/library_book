<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show() {
        $books = Book::all();
        
        return $books;
    }
    public function create(Request $request) {
        Book::create(
            [
                'name' => $request->get('name'),
                'publisher_id' => $request->get('publisher_id'),
                'pagenumber' => $request->get('pagenumber'),
                'author' => $request->get('author'),
            ]
        );

    }
}
