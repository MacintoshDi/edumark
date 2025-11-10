<?php

use Illuminate\Support\Facades\Route;

// Минимальная главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard (если нужен)
Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth routes временно отключены
// require __DIR__ . '/auth.php';
