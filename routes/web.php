<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaExamController;

Route::get('/', function () {
    return view('welcome');
});

// Route khusus admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [ExamsController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
    
    Route::get('/admin/dashboard/buat_ujian', [ExamsController::class, 'create'])->name('exam.create');
    Route::post('/admin/dashboard', [ExamsController::class, 'store'])->name('admin.dashboard');
    // routes/web.php
    Route::delete('/admin/dashboard/{id}', [ExamsController::class, 'destroy'])->name('admin.dashboard.delete');
});

    // Route khusus siswa
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    // Route::get('/dashboard', [ExamsController::class, 'history'])->middleware('auth')->name('dashboard');
    
    Route::get('/siswa/ujian', [SiswaExamController::class, 'index'])->name('siswa.exams');
    Route::get('/exam/token', [SiswaExamController::class, 'tokenForm'])->name('exam.token.form');
    Route::post('/exam/token', [SiswaExamController::class, 'checkToken'])->name('exam.token.check');
    Route::get('/exam/{id}', [SiswaExamController::class, 'show'])->name('siswa.exam.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
