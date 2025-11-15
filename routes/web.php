<?php

use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'pages.home')->name('home');

// Students
Route::view('/students', 'pages.students.index')->name('students.index');

// Cohorts
Route::view('/cohorts', 'pages.cohorts.index')->name('cohorts.index');
Route::view('/cohorts/{slug}', 'pages.cohorts.show')->name('cohorts.show');

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

// Auth
Route::get('/login', function () {
    return redirect('https://edumark.bettermode.io/auth/login');
})->name('login');

Route::get('/cohort-2', function () {
    return view('pages.cohorts.cohort-2');
})->name('cohort-2');
