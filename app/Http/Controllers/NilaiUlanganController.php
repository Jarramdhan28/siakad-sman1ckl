<?php

namespace App\Http\Controllers;

use App\Http\Requests\NilaiUlanganRequest;
use App\Models\NilaiUlangan;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NilaiUlanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allKelas = Pelajaran::find($request->user()->pelajaran_id)->kelas;
        if($allKelas->isEmpty()){
            $kelasId = 0;
        }else{
            $kelasId = $request->kelas_id ?? $allKelas[0]->id;
        }
        $siswa = Siswa::with(['nilaiUlangan' => fn(Builder $query) => $query->where('pelajaran_id', $request->user()->pelajaran_id)])->where('kelas_id', $kelasId)->orderBy('nama_siswa')->get()->map(function($siswa){
            $nilaiUlangan = $siswa->nilaiUlangan->groupBy('jenis_nilai')->map(fn($nilaiUlangan) => round($nilaiUlangan->avg('nilai'), 2));
            $siswa->nilaiTotal = $nilaiUlangan;
            return $siswa;
        });
        return view('guru.nilai-ulangan', compact('siswa', 'kelasId', 'allKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Pelajaran::find(auth()->user()->pelajaran_id)->kelas;
        return view('guru.tambah-nilai-ulangan', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NilaiUlanganRequest $request)
    {
        $nilaiUlanganModel = new NilaiUlangan();
        $nilaiUlanganModel->insertAllUlangan($request, $request->siswa_id);
        return redirect()->route('nilai-ulangan.index')->with('success', 'Data Nilai ulangan berhasil di tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $kelas = $siswa->kelas;
        $nilaiUlangan = NilaiUlangan::where('siswa_id', $siswa->id)->where('pelajaran_id', auth()->user()->pelajaran_id)->get()->groupBy('jenis_nilai');
        return view('guru.ubah-nilai-ulangan', compact('siswa', 'kelas', 'nilaiUlangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $nilaiUlanganModel = new NilaiUlangan();
        $nilaiUlanganModel->insertAllUlangan($request, $siswa->id);
        return redirect()->route('nilai-ulangan.index')->with('success', 'Data Nilai ulangan berhasil di ubah');
    }

    public function getBySiswa(Siswa $siswa)
    {
        $nilaiUlangan = NilaiUlangan::where('siswa_id', $siswa->id)->where('pelajaran_id', auth()->user()->pelajaran_id)->get()->groupBy('jenis_nilai');
        return response()->json($nilaiUlangan);
    }

    public function daftarNilai()
    {
        $siswaId = auth('siswa')->user()->id;
        $kelasId = auth('siswa')->user()->kelas_id;
        $nilaiUlangan = Pelajaran::with(['nilaiUlangan' => fn(Builder $query) => $query->where('siswa_id', $siswaId)])
        ->whereHas('kelas', fn(Builder $query) => $query->where('kelas_id', $kelasId))
        ->get()->map(function($nilai){
            $nilai->nilaiUlangan->groupBy('jenis_nilai')->each(fn($ulangan, $jenisNilai) => $nilai[$jenisNilai] = $ulangan->avg('nilai'));
            return $nilai;
        });
        return view('siswa.daftar-nilai-ulangan', compact('nilaiUlangan'));
    }
}
