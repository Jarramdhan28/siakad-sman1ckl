<?php

namespace App\Http\Controllers\Auth\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthSessionSiswa extends Controller
{
    public function create(): View
    {
        return view('auth.siswa.login');
    }
}
