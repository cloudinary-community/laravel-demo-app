<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/home', 'pages.home')->name('home');
Route::view('/profile', 'pages.profile')->name('profile');
Route::view('/post', 'pages.post')->name('post');
