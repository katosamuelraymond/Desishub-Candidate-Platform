<?php
// routes/web.php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Candidate Registration Routes
Route::get('/register', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/register', [CandidateController::class, 'store'])->name('candidates.store');
Route::get('/candidates/{candidate}', [CandidateController::class, 'show'])->name('candidates.show');

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/filter/{tier}', [DashboardController::class, 'filterByTier'])->name('dashboard.filter');
