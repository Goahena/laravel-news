<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\Commentcontroller;
<<<<<<< HEAD
use App\Http\Controllers\API\ContactController;

Route::get('/', function () {
    return view('welcome');
});
=======
use App\Http\Controllers\API\CategoryController;

>>>>>>> origin/APIbaiviet

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('posts.comments', CommentController::class);
<<<<<<< HEAD
Route::apiResource('contacts', ContactController::class);
=======

>>>>>>> origin/APIbaiviet
