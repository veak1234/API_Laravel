<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
Route::post('/user/create', [UserController::class, 'store']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

Route::get('/post/list', [PostsController::class, 'index']);
Route::post('/post/create', [PostsController::class, 'store']);
Route::put('/post/update', [PostsController::class, 'update']);
Route::delete('/post/delete', [PostsController::class, 'destroy']);

Route::get('/comment/list',[CommentController::class, 'index']);
Route::post('/comment/create',[CommentController::class, 'store']);

Route::get('/like/list',[LikeController::class, 'index']);
Route::post('/like/create',[LikeController::class, 'store']);