<?php

use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/publisher', [PublisherController::class, 'show']);
Route::get('/publisher/{id}', [PublisherController::class,'detail']);
Route::post('/publisher', [PublisherController::class, 'create']);
Route::put('/publisher/{id}', [PublisherController::class,'update']);
Route::delete('/publisher/{id}', [PublisherController::class,'delete']);


Route::get('/book', [BookController::class, 'show']);
Route::get('/book/{id}', [BookController::class, 'detail']);
Route::post('/book', [BookController::class, 'create']);
Route::put('/book/{id}', [BookController::class, 'update']);
Route::delete('/book/{id}',[BookController::class, 'delete']);

Route::get('/category', [CategoryController::class, 'show']);
Route::get('/category/{id}', [CategoryController::class, 'detail']);
Route::post('/category', [CategoryController::class, 'create']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'delete']);


