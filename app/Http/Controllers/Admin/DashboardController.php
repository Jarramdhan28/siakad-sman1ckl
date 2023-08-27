<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Informasi;
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

        $allNamaKelas = Kelas::orderBy('nama_kelas')->get()->pluck('nama_kelas');
        $totalSiswa = Kelas::with('siswa')->orderBy('nama_kelas')->get()->map(function($kelas){
            $totalLakiLaki = $kelas->siswa->where('jenis_kelamin', 'Laki-laki')->count();
            $totalPerempuan = $kelas->siswa->where('jenis_kelamin', 'Perempuan')->count();
            return [$totalLakiLaki, $totalPerempuan];
        });
        return view('admin.dashboard', compact('guru', 'siswa', 'kelas', 'pelajaran', 'allNamaKelas', 'totalSiswa'));
    }

    public function guru()
    {
        // $pelajaranId = auth()->user()->pelajaran_id;
        // $kelas = Pelajaran::find($pelajaranId)->kelas->count();
        // $absensi = 0;
        // Kelas::with('absensi')->whereHas('absensi')->get()->each(function($kelas) use ($absensi, $pelajaranId){
        //     $kelas->absensi->where('pelajaran_id', $pelajaranId)->groupBy('tanggal')->each(function() use ($absensi){
        //         $absensi++;
        //     });
        // });
        $informasi = Informasi::all();
        return view('guru.dashboard', compact('informasi'));
    }

    public function siswa()
    {
        $informasi = Informasi::all();
        return view('siswa.dashboard', compact('informasi'));
    }
}
