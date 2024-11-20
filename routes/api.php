<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Postcontroller;
use App\Http\Controllers\API\Commentcontroller;
use App\Http\Controllers\API\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('posts', PostController::class);
Route::apiResource('posts.comments', CommentController::class);
Route::apiResource('contacts', ContactController::class);
