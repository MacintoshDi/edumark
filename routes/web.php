<?php

use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'pages.home')->name('home');

// Students
Route::view('/students', 'pages.students.index')->name('students.index');

// Cohorts - список всех когорт
Route::view('/cohorts', 'pages.cohorts.index')->name('cohorts.index');

// Конкретные когорты (убрали старый динамический роут)
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

// Community
Route::view('/discussion', 'pages.community.discussion')->name('community.discussion');
Route::view('/events', 'pages.community.events')->name('community.events');
Route::view('/spotlight', 'pages.community.spotlight')->name('community.spotlight');
Route::view('/connect', 'pages.community.connect')->name('community.connect');
Route::view('/showcase', 'pages.community.showcase')->name('community.showcase');

// Academy
Route::view('/ask-your-teacher', 'pages.academy.ask-teacher')->name('academy.ask-teacher');
Route::view('/careers', 'pages.academy.careers')->name('academy.careers');
Route::view('/careers/{id}', 'pages.academy.career-detail')->name('academy.career.detail');

// Student Directory
Route::view('/student-directory', 'pages.student-directory')->name('student-directory');

// Auth
Route::get('/login', function () {
    return redirect('https://edumark.bettermode.io/auth/login');
})->name('login');
