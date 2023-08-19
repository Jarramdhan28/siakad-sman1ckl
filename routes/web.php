<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Admin\BelajarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PelajaranController;
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

Route::middleware('auth')->group(function(){

    Route::middleware('can:admin')->group(function(){
        // Admin Controller
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');
        
        // Admin Controller Guru
        Route::resource('guru', GuruController::class)->except('show');
        
        // Admin Controller Siswa
        Route::resource('siswa', SiswaController::class)->except('show');
        
        // Admin Controller Kelas
        Route::resource('kelas', KelasController::class)->parameters([
            'kelas' => 'kelas'
        ])->except('show');
        
        // Admin Controller Pelajaran
        Route::resource('pelajaran', PelajaranController::class)->except('show');
    
        // Controller Belajar
        Route::controller(BelajarController::class)->group(function(){
            Route::get('/belajar', 'index')->name('belajar.index');
            Route::get('/belajar/create', 'create')->name('belajar.create');
            Route::post('/belajar', 'store')->name('belajar.store');
            Route::get('/belajar/{kelas}/edit', 'edit')->name('belajar.edit');
            Route::put('/belajar/{kelas}', 'update')->name('belajar.update');
            Route::delete('/belajar/{kelas}', 'destroy')->name('belajar.destroy');
        });
    });

    Route::controller(AbsensiController::class)->group(function(){
        Route::get('/absensi', 'index')->name('absensi.index');
        Route::post('/absensi', 'store')->name('absensi.store');
        Route::get('/absensi/{kelas}/{tanggal}', 'show')->name('absensi.show');
        Route::put('/absensi/{absensi}', 'updateKeterangan')->name('absensi.update');
        Route::delete('/absensi/{kelas}/{tanggal}', 'destroy')->name('absensi.destroy');
    });
});

require __DIR__.'/auth.php';
