<?php

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

// Admin Controller
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');

// Admin Controller Guru
Route::get('/admin/guru', [GuruController::class, 'index'])->name('adminGuru');
Route::get('/admin/guru/tambah', [GuruController::class, 'create'])->name('formGuru');
Route::post('/admin/guru/tambah/aksi', [GuruController::class, 'store'])->name('tambahGuru');
Route::delete('/admin/guru/hapus{id}', [GuruController::class, 'hapus'])->name('hapusGuru');
Route::get('/admin/guru/edit/{id}', [GuruController::class, 'show'])->name('formUbahGuru');
Route::patch('/admin/guru/edit/{id}/aksi', [GuruController::class, 'ubah'])->name('ubahGuru');

// Admin Controller Siswa
Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('adminSiswa');
Route::get('/admin/siswa/tambah', [SiswaController::class, 'create'])->name('formSiswa');
Route::post('/admin/siswa/tambah/aksi', [SiswaController::class, 'store'])->name('tambahSiswa');
Route::delete('/admin/siswa/hapus{id}', [SiswaController::class, 'hapus'])->name('hapusSiswa');

// Admin Controller Kelas
Route::get('/admin/kelas', [KelasController::class, 'index'])->name('adminKelas');
Route::get('/admin/kelas/tambah', [KelasController::class, 'create'])->name('formKelas');
Route::post('/admin/kelas/tambah/aksi', [KelasController::class, 'store'])->name('tambahKelas');
Route::delete('/admin/kelas/hapus{id}', [KelasController::class, 'hapus'])->name('hapusKelas');

// Admin Controller Pelajaran
Route::get('/admin/pelajaran', [PelajaranController::class, 'index'])->name('adminPelajaran');
Route::get('/admin/pelajaran/tambah', [PelajaranController::class, 'create'])->name('formPelajaran');
Route::post('/admin/pelajaran/tambah/aksi', [PelajaranController::class, 'store'])->name('tambahPelajaran');
Route::delete('/admin/pelajaran/hapus{id}', [PelajaranController::class, 'hapus'])->name('hapusPelajaran');

require __DIR__.'/auth.php';


