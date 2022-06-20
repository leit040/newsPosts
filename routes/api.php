<?php

use Illuminate\Http\Request;
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
Route::get('/posts',[\App\Http\Controllers\API\PostController::class,'index']);
Route::get('/posts/{post}',[\App\Http\Controllers\API\PostController::class,'show'])->name('showPost');
Route::post('/posts',[\App\Http\Controllers\API\PostController::class,'store']);
Route::put('/posts/{post}',[\App\Http\Controllers\API\PostController::class,'update']);
Route::delete('/posts/{post}',[\App\Http\Controllers\API\PostController::class,'destroy']);
Route::post('/posts/{post}/user/{user}/upvote',[\App\Http\Controllers\API\PostController::class,'upvote']);


Route::get('/comments',[\App\Http\Controllers\API\CommentController::class,'index']);
Route::get('/comments/{comment}',[\App\Http\Controllers\API\CommentController::class,'show']);
Route::post('/comments',[\App\Http\Controllers\API\CommentController::class,'store']);
Route::put('/comments/{comment}',[\App\Http\Controllers\API\CommentController::class,'update']);
Route::delete('/comments/{comment}',[\App\Http\Controllers\API\CommentController::class,'destroy']);
