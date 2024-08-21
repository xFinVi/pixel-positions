<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

// Route for job index
Route::get('/', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::get('/jobs', [JobController::class, 'jobsOnly']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('auth');
Route::put('jobs/{job}', [JobController::class, 'update'])->name('job.update')->middleware('auth');
Route::delete('jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');



Route::get('/careers', function () {
    $jobs = Job::where('featured', true)->take(4)->get();

    return view('career', compact('jobs'));
})->name('career');





// Route for search
Route::get('/search', SearchController::class);

// Route for tags
Route::get('/tags/{tag:name}', TagController::class);

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
