<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('members', App\Http\Controllers\MemberController::class);
    Route::resource('folds', App\Http\Controllers\FoldController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Service routes
    Route::get('/attendance/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('attendance.services');
    Route::get('/attendance/services/{service}', [\App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.mark');
    
    // Attendance CRUD routes
    Route::get('attendance/{service}', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('attendance/{service}/create', [App\Http\Controllers\AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('attendance/{service}', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('attendance/{service}/show/{attendance}', [App\Http\Controllers\AttendanceController::class, 'show'])->name('attendance.show');
    Route::get('attendance/{service}/edit/{attendance}', [App\Http\Controllers\AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::put('attendance/{service}/update/{attendance}', [App\Http\Controllers\AttendanceController::class, 'update'])->name('attendance.update');
    Route::delete('attendance/{service}/destroy/{attendance}', [App\Http\Controllers\AttendanceController::class, 'destroy'])->name('attendance.destroy');
    
    // Attendance marking routes
    Route::post('attendance/{service}/present/{member}', [App\Http\Controllers\AttendanceController::class, 'present'])->name('attendance.present');
    Route::post('attendance/{service}/absent/{member}', [App\Http\Controllers\AttendanceController::class, 'absent'])->name('attendance.absent');
    Route::post('attendance/{service}/finalize', [App\Http\Controllers\AttendanceController::class, 'finalize'])->name('attendance.finalize');
    
    // Bulk operations and utilities
    Route::post('attendance/{service}/bulk-update', [App\Http\Controllers\AttendanceController::class, 'bulkUpdate'])->name('attendance.bulk-update');
    Route::get('attendance/{service}/statistics', [App\Http\Controllers\AttendanceController::class, 'statistics'])->name('attendance.statistics');
    Route::get('attendance/{service}/export', [App\Http\Controllers\AttendanceController::class, 'export'])->name('attendance.export');
});

require __DIR__.'/auth.php';
