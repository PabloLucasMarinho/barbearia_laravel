<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});

Route::middleware('auth')->group(function () {
  Route::view('/dashboard', 'dashboard')->name('dashboard');
  Route::view('/clients', 'clients')->name('clients');
});
