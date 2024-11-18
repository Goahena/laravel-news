<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-email', function () {
    Mail::raw('Test Email!', function ($message) {
        $message->to('tvmanhboss021202@gmail.com')
                ->subject('Test Email');
    });
    return 'Test email sent!';
});