<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.home.index')->name('home');
//Route::get('/', fn() => 'hello');