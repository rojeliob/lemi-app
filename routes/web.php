<?php

use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Home Route
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         // Uncomment if you want to show the registration option
//         // 'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// })->name('home');

// Dashboard Route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

// Registration Routes
Route::get('/', [CustomRegisteredUserController::class, 'create'])->name('register-custom');

Route::get('/register-custom', [CustomRegisteredUserController::class, 'create'])->name('register-custom');
Route::post('/register-custom/step1', [CustomRegisteredUserController::class, 'storeStep1'])->name('register-custom.step1');
Route::post('/register-custom/step2', [CustomRegisteredUserController::class, 'storeStep2'])->name('register-custom.step2');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');
});

// Include authentication routes
require __DIR__.'/auth.php';
