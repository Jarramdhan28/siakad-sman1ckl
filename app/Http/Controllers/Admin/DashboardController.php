<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
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

    public function guru()
    {
        $pelajaranId = auth()->user()->pelajaran_id;
        $kelas = Pelajaran::find($pelajaranId)->kelas->count();
        $absensi = 0;
        Kelas::with('absensi')->whereHas('absensi')->get()->each(function($kelas) use ($absensi, $pelajaranId){
            $kelas->absensi->where('pelajaran_id', $pelajaranId)->groupBy('tanggal')->each(function() use ($absensi){
                $absensi++;
            });
        });
        return view('guru.dashboard', compact('kelas', 'absensi'));
    }

    public function siswa()
    {
        return view('siswa.dashboard');
    }
}
