<?php

use App\Http\Controllers\CreateCommentController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/post/{post}', PostController::class)->name('post');
Route::post('/post/{post}', CreateCommentController::class)->name('comment');
Route::get('/profile/{user}', ProfileController::class)->name('profile');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'pages.login')->name('login');
    Route::post('/login', LoginController::class);
    Route::view('/register', 'pages.register')->name('register');
    Route::post('/register', RegisterController::class);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::post('create', CreatePostController::class)->name('create');
});
