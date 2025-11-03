<?php

/**
 * WEB ROUTES FOR EDUMARK PLATFORM
 * 
 * Организация:
 * 1. Public Routes (главная, search)
 * 2. Authentication Routes (Breeze)
 * 3. Authenticated Routes (основные страницы)
 * 4. Teacher Routes (управление курсами)
 * 5. API Routes (уведомления, ajax)
 */

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StudentDirectoryController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MentorshipController;
use App\Http\Controllers\SpotlightController;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (без аутентификации)
|--------------------------------------------------------------------------
*/

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Публичный поиск (если нужен)
// Route::get('/search', [SearchController::class, 'public'])->name('search.public');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Authenticated Routes (требуют auth + verified)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // ========================================
    // DASHBOARD
    // ========================================
    
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    
    // ========================================
    // SEARCH
    // ========================================
    
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    
    // ========================================
    // COHORTS
    // ========================================
    
    Route::get('/cohorts', [CohortController::class, 'index'])->name('cohorts.index');
    Route::get('/cohorts/{cohort:slug}', [CohortController::class, 'show'])->name('cohorts.show');
    Route::post('/cohorts/{cohort}/enroll', [CohortController::class, 'enroll'])->name('cohorts.enroll');
    Route::delete('/cohorts/{cohort}/leave', [CohortController::class, 'leave'])->name('cohorts.leave');
    
    // ========================================
    // STUDENT DIRECTORY
    // ========================================
    
    Route::get('/student-directory', [StudentDirectoryController::class, 'index'])->name('student-directory');
    Route::get('/student-directory/{user}', [StudentDirectoryController::class, 'show'])->name('student-directory.show');
    Route::post('/users/{user}/follow', [StudentDirectoryController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{user}/unfollow', [StudentDirectoryController::class, 'unfollow'])->name('users.unfollow');
    
    // ========================================
    // DISCUSSIONS (Ask Your Teacher + General)
    // ========================================
    
    Route::get('/ask-your-teacher', [DiscussionController::class, 'askTeacher'])->name('ask-your-teacher');
    Route::get('/discussion', [DiscussionController::class, 'index'])->name('discussions.index');
    Route::get('/discussion/create', [DiscussionController::class, 'create'])->name('discussions.create');
    Route::post('/discussion', [DiscussionController::class, 'store'])->name('discussions.store');
    Route::get('/discussion/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show');
    Route::get('/discussion/{discussion}/edit', [DiscussionController::class, 'edit'])->name('discussions.edit');
    Route::put('/discussion/{discussion}', [DiscussionController::class, 'update'])->name('discussions.update');
    Route::delete('/discussion/{discussion}', [DiscussionController::class, 'destroy'])->name('discussions.destroy');
    Route::post('/discussion/{discussion}/like', [DiscussionController::class, 'like'])->name('discussions.like');
    
    // ========================================
    // REPLIES
    // ========================================
    
    Route::post('/discussion/{discussion}/replies', [ReplyController::class, 'store'])->name('replies.store');
    Route::put('/replies/{reply}', [ReplyController::class, 'update'])->name('replies.update');
    Route::delete('/replies/{reply}', [ReplyController::class, 'destroy'])->name('replies.destroy');
    Route::post('/replies/{reply}/like', [ReplyController::class, 'like'])->name('replies.like');
    Route::post('/replies/{reply}/mark-solution', [ReplyController::class, 'markSolution'])->name('replies.mark-solution');
    
    // ========================================
    // EVENTS
    // ========================================
    
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');
    Route::delete('/events/{event}/cancel', [EventController::class, 'cancel'])->name('events.cancel');
    
    // ========================================
    // JOBS
    // ========================================
    
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');
    
    // ========================================
    // RESOURCES
    // ========================================
    
    Route::get('/cohorts/{cohort}/resources', [ResourceController::class, 'index'])->name('resources.index');
    Route::post('/cohorts/{cohort}/resources', [ResourceController::class, 'store'])->name('resources.store');
    Route::get('/resources/{resource}/download', [ResourceController::class, 'download'])->name('resources.download');
    Route::delete('/resources/{resource}', [ResourceController::class, 'destroy'])->name('resources.destroy');
    
    // ========================================
    // ASSIGNMENTS
    // ========================================
    
    Route::get('/cohorts/{cohort}/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/assignments/{assignment}', [AssignmentController::class, 'show'])->name('assignments.show');
    
    // ========================================
    // SUBMISSIONS
    // ========================================
    
    Route::post('/assignments/{assignment}/submit', [SubmissionController::class, 'store'])->name('submissions.store');
    Route::get('/submissions/{submission}', [SubmissionController::class, 'show'])->name('submissions.show');
    Route::post('/submissions/{submission}/grade', [SubmissionController::class, 'grade'])->name('submissions.grade');
    
    // ========================================
    // MESSAGES (Connect)
    // ========================================
    
    Route::get('/connect', [MessageController::class, 'index'])->name('connect');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{user}', [MessageController::class, 'conversation'])->name('messages.conversation');
    Route::post('/messages/{user}', [MessageController::class, 'send'])->name('messages.send');
    Route::post('/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
    
    // ========================================
    // MENTORSHIP
    // ========================================
    
    Route::get('/mentorship', [MentorshipController::class, 'index'])->name('mentorship.index');
    Route::post('/mentorship/request/{user}', [MentorshipController::class, 'request'])->name('mentorship.request');
    Route::post('/mentorship/{mentorship}/accept', [MentorshipController::class, 'accept'])->name('mentorship.accept');
    Route::post('/mentorship/{mentorship}/decline', [MentorshipController::class, 'decline'])->name('mentorship.decline');
    Route::post('/mentorship/{mentorship}/complete', [MentorshipController::class, 'complete'])->name('mentorship.complete');
    
    // ========================================
    // SPOTLIGHT
    // ========================================
    
    Route::get('/spotlight', [SpotlightController::class, 'index'])->name('spotlight');
    Route::get('/spotlight/{spotlight}', [SpotlightController::class, 'show'])->name('spotlight.show');
    
    // ========================================
    // SHOWCASE
    // ========================================
    
    Route::get('/showcase', [ShowcaseController::class, 'index'])->name('showcase.index');
    Route::get('/showcase/create', [ShowcaseController::class, 'create'])->name('showcase.create');
    Route::post('/showcase', [ShowcaseController::class, 'store'])->name('showcase.store');
    Route::get('/showcase/{showcase}', [ShowcaseController::class, 'show'])->name('showcase.show');
    Route::get('/showcase/{showcase}/edit', [ShowcaseController::class, 'edit'])->name('showcase.edit');
    Route::put('/showcase/{showcase}', [ShowcaseController::class, 'update'])->name('showcase.update');
    Route::delete('/showcase/{showcase}', [ShowcaseController::class, 'destroy'])->name('showcase.destroy');
    
    // ========================================
    // PROFILE
    // ========================================
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/badges', [ProfileController::class, 'badges'])->name('profile.badges');
    Route::get('/profile/activity', [ProfileController::class, 'activity'])->name('profile.activity');
    
    // ========================================
    // ADMIN UTILITIES (для очистки кэша меню)
    // ========================================
    
    Route::post('/menu/clear-cache/{slug?}', [HomeController::class, 'clearMenuCache'])
        ->name('menu.clear-cache');
});

/*
|--------------------------------------------------------------------------
| Teacher Routes (префикс /teacher)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('teacher')->name('teacher.')->group(function () {
    
    // Dashboard для учителей
    Route::get('/dashboard', function () {
        return view('teacher.dashboard');
    })->name('dashboard');
    
    // Управление контентом курсов
    Route::post('/cohorts/{cohort}/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
    Route::put('/assignments/{assignment}', [AssignmentController::class, 'update'])->name('assignments.update');
    Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');
    
    // Оценка работ
    Route::get('/submissions', [SubmissionController::class, 'index'])->name('submissions.index');
});

/*
|--------------------------------------------------------------------------
| API Routes (для AJAX/Livewire)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('api')->name('api.')->group(function () {
    
    // Получить непрочитанные уведомления
    Route::get('/notifications', function () {
        return auth()->user()->unreadNotifications;
    })->name('notifications');
    
    // Отметить уведомление как прочитанное
    Route::post('/notifications/{id}/read', function ($id) {
        auth()->user()->notifications()->find($id)?->markAsRead();
        return response()->json(['success' => true]);
    })->name('notifications.read');
    
    // Отметить все уведомления как прочитанные
    Route::post('/notifications/read-all', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    })->name('notifications.read-all');
});