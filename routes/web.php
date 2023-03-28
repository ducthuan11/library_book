<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\Book_Category_GroupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/publishers', [PublisherController::class, 'show']);
Route::get('/publishers', [PublisherController::class, 'create']);

Route::get('/books', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'create']);

Route::get('/categories', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'create']);

Route::get('/book_category_groups', [Book_Category_GroupController::class, 'show']);
Route::get('/book_category_groups', [Book_Category_GroupController::class, 'create']);

