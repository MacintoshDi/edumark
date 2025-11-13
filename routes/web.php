<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Using PageController for mostly static pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/discussion', [PageController::class, 'discussion'])->name('community.discussion');
Route::get('/events', [PageController::class, 'events'])->name('community.events');
Route::get('/spotlight', [PageController::class, 'spotlight'])->name('community.spotlight');
Route::get('/connect', [PageController::class, 'connect'])->name('community.connect');
Route::get('/showcase', [PageController::class, 'showcase'])->name('community.showcase');
Route::get('/ask-your-teacher', [PageController::class, 'askTeacher'])->name('academy.ask-teacher');

// Using dedicated controllers for resources
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/cohorts', [CohortController::class, 'index'])->name('cohorts.index');
Route::get('/cohorts/{slug}', [CohortController::class, 'show'])->name('cohorts.show');

Route::get('/careers', [CareerController::class, 'index'])->name('academy.careers.index');
Route::get('/careers/{id}', [CareerController::class, 'show'])->name('academy.career.show');
