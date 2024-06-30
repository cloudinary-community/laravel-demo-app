<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/profile', 'pages.profile')->name('profile');
Route::view('/post', 'pages.post')->name('post');
