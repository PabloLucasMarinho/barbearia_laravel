<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/clients', [ClientController::class, 'index'])->name('clients.clients');
  Route::get('/new-client', [ClientController::class, 'create'])->name('clients.new-client');
  Route::post('/store-client', [ClientController::class, 'store'])->name('clients.store-client');
});
