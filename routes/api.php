<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowRecordController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user/list', [UserController::class, 'index']);
Route::post('/user/create', [UserController::class,'store']);
Route::get('/user/show/{id}', [UserController::class,'show']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);


Route::get('/books/list', [BookController::class, 'index']);
Route::post('/books/create', [BookController::class,'store']);
Route::get('/books/update/{id}', [BookController::class,'show']);
Route::put('/books/update/{id}', [BookController::class, 'update']);
Route::delete('/books/delete/{id}', [BookController::class, 'destroy']);


Route::get('/borrow/list', [BorrowRecordController::class, 'index']);
Route::post('/borrow/create', [BorrowRecordController::class,'store']);