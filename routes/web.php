<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruContoller;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::controller(DashboardController::class)->group(function () {
    // });

// Guru Admin Route
// Route::middleware('authGuru')->group(function(){
// });

// Admin Controller
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');

// Admin Controller Guru
Route::get('/admin/guru', [GuruContoller::class, 'index'])->name('adminGuru');

require __DIR__.'/auth.php';


