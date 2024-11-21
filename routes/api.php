<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\Commentcontroller;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('posts.comments', CommentController::class);
Route::apiResource('contacts', ContactController::class);

Route::group([
    'middlware' => 'api',
    'prefix' => 'auth',
],function($router){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('/send-verification-code', [AuthController::class, 'sendVerificationCode']);
    Route::post('/verify-code', [AuthController::class, 'verifyCode']);
});

Route::group([
    'middlware' => 'api',
    'prefix' => 'user',
],function($router){
    Route::get('/index', [UserController::class, 'index']);
    Route::get('/show/{slug}', [UserController::class, 'show']);
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/update/{slug}', [UserController::class, 'update']);
    Route::delete('/delete/{slug}', [UserController::class, 'delete']);
});
