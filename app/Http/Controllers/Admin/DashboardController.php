<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::where('role', '0')->count();
        $siswa = Siswa::all()->count();
        $kelas = Kelas::all()->count();
        $pelajaran = Pelajaran::all()->count();

        return view('admin.dashboard', compact('guru', 'siswa', 'kelas', 'pelajaran'));
    }
}
