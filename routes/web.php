<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PelajaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\InformasiSiswaController;
use App\Models\Informasi;
use App\Models\Kelas;
use App\Models\Siswa;
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
    // Admin Controller
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');

    // Admin Controller Guru
    Route::resource('guru', GuruController::class)->except('show');

    // Admin Controller Siswa
    Route::resource('siswa', SiswaController::class)->except('show');

    // Admin Controller Kelas
    Route::resource('kelas', KelasController::class)->parameters([
        'kelas' => 'kelas'
    ]);

    // Admin Controller Pelajaran
    Route::resource('pelajaran', PelajaranController::class)->except('show');

    // Admin Controller Informasi
    Route::resource('informasi', InformasiController::class);

});

Route::get('/siswa/informasi', [InformasiSiswaController::class, 'index'])->name('siswaInformasi');

require __DIR__.'/auth.php';


