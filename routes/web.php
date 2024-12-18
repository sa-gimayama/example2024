<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('example.')->prefix('example')->group(function () {
    Route::name('ateOyatsu.')->prefix('ateOyatsu')->group(function () {
        Route::name('blade.')->prefix('blade')->group(function () {
            Route::get('/', \App\Http\Controllers\Example\AteOyatsu\blade\IndexController::class)->name('index');
            Route::post('/', \App\Http\Controllers\Example\AteOyatsu\blade\UpdateController::class)->name('update');
        });
        Route::name('bladeAjax.')->prefix('bladeAjax')->group(function () {
            Route::get('/', \App\Http\Controllers\Example\AteOyatsu\bladeAjax\IndexController::class)->name('index');
            Route::post('/', \App\Http\Controllers\Example\AteOyatsu\bladeAjax\UpdateController::class)->name('update');
        });
        Route::name('inertia.')->prefix('inertia')->group(function () {
            Route::get('/', \App\Http\Controllers\Example\AteOyatsu\Inertia\IndexController::class)->name('index');
            Route::post('/', \App\Http\Controllers\Example\AteOyatsu\Inertia\UpdateController::class)->name('update');
        });
    });
});

require __DIR__.'/auth.php';
