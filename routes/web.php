<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TodoController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [TodoController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [TodoController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard.edit/{todo}/edit', [TodoController::class, 'edit'])->name('dashboard.edit');
    Route::get('/dashboard.show/{todo}', [TodoController::class, 'show'])->name('dashboard.show');
    Route::delete('/dashboard/{todo}', [TodoController::class, 'destroy'])->name('dashboard.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  
});


require __DIR__.'/auth.php';    