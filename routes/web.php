<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Static & Community Pages ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/events', [PageController::class, 'events'])->name('community.events');
Route::get('/spotlight', [PageController::class, 'spotlight'])->name('community.spotlight');
Route::get('/connect', [PageController::class, 'connect'])->name('community.connect');
Route::get('/showcase', [PageController::class, 'showcase'])->name('community.showcase');
Route::get('/ask-your-teacher', [PageController::class, 'askTeacher'])->name('academy.ask-teacher');

// --- Resourceful Controllers ---

// Student Directory
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Discussions
Route::get('/discussion', [DiscussionController::class, 'index'])->name('community.discussion');
Route::get('/discussion/{id}', [DiscussionController::class, 'show'])->name('community.discussion.show');

// Cohorts & Assignments
Route::get('/cohorts', [CohortController::class, 'index'])->name('cohorts.index');
Route.get('/cohorts/{slug}', [CohortController::class, 'show'])->name('cohorts.show');
Route.get('/cohorts/{slug}/assignments/{id}', [CohortController::class, 'assignmentShow'])->name('cohorts.assignment.show');

// Careers
Route::get('/careers', [CareerController::class, 'index'])->name('academy.careers.index');
Route::get('/careers/{id}', [CareerController::class, 'show'])->name('academy.careers.show');
