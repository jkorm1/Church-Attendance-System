<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FoldController;
use App\Http\Controllers\DashboardController;
use App\Models\Cell;

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

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('members', MemberController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('folds', FoldController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Service routes
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
    Route::post('attendance/{service}/mark/{member}', [AttendanceController::class, 'mark'])->name('attendance.mark');
    Route::post('attendance/{service}/finalize', [AttendanceController::class, 'finalize'])->name('attendance.finalize');
    
    // Bulk operations and utilities
    Route::post('attendance/{service}/bulk-update', [AttendanceController::class, 'bulkUpdate'])->name('attendance.bulk-update');
    Route::get('attendance/{service}/statistics', [App\Http\Controllers\AttendanceController::class, 'statistics'])->name('attendance.statistics');
    Route::get('attendance/{service}/export', [App\Http\Controllers\AttendanceController::class, 'export'])->name('attendance.export');

    Route::get('/attendance/service/{service_id}', [AttendanceController::class, 'showServiceAttendance'])->name('attendance.service');
});

Route::middleware('auth')->get('/api/cells/{cell}/folds', function (Cell $cell) {
    return $cell->folds()->orderBy('name')->get();
});

require __DIR__.'/auth.php';
