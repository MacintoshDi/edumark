<?php

use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'pages.home')->name('home');

// Students
Route::view('/students', 'pages.students.index')->name('students.index');

// Student Directory
Route::get('/student-directory', function () {
    return view('pages.student-directory');
})->name('student-directory');

// Cohorts - список всех когорт
Route::get('/cohorts', function () {
    return view('pages.cohorts');
})->name('cohorts.index');

// Конкретные когорты
Route::get('/cohorts/growth-marketing', function () {
    return view('pages.cohorts.growth-marketing');
})->name('cohorts.growth-marketing');

Route::get('/cohorts/advanced-seo', function () {
    return view('pages.cohorts.advanced-seo');
})->name('cohorts.advanced-seo');

Route::get('/cohorts/video-marketing', function () {
    return view('pages.cohorts.video-marketing');
})->name('cohorts.video-marketing');

Route::get('/cohorts/content-marketing', function () {
    return view('pages.cohorts.content-marketing');
})->name('cohorts.content-marketing');

// Academy
Route::get('/ask-your-teacher', function () {
    return view('pages.ask-your-teacher');
})->name('ask-your-teacher');

// Community
Route::get('/discussion', function () {
    return view('pages.discussion');
})->name('discussion');

// Auth

Route::get('/events', function () {
    return view('pages.events');
})->name('events');

Route::get('/spotlight', function () {
    return view('pages.spotlight');
})->name('spotlight');

Route::get('/connect', function () {
    return view('pages.connect');
})->name('connect');

Route::get('/showcase', function () {
    return view('pages.showcase');
})->name('showcase');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    // Имитация логина - просто редирект на главную
    return redirect()->route('home')->with('success', 'Welcome back!');
})->name('login.post');
