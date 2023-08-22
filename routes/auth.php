<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AdminGuru\AuthSessionGuru;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AdminGuru\RegisterGuruController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\Siswa\AuthSessionSiswa;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


// Auth Admin dan Guru
Route::middleware('guest')->group(function () {
    Route::get('guru/register', [RegisterGuruController::class, 'create'])
                ->name('guru/register');

    Route::post('guru/register', [RegisterGuruController::class, 'store']);

    Route::get('guru/login', [AuthSessionGuru::class, 'create'])
                ->name('login/guru');

    Route::post('/guru/login/save', [AuthSessionGuru::class, 'store'])
                ->name('guruLogin');
});

// Auth Session Siswa
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthSessionSiswa::class, 'create'])
        ->name('login');

    Route::post('/', [AuthSessionSiswa::class, 'store'])
        ->name('login.store');
});
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
