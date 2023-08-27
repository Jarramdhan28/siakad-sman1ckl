<?php

namespace App\Http\Controllers;

use App\Http\Requests\NilaiUlanganRequest;
use App\Models\NilaiAkhir;
use App\Models\NilaiUlangan;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NilaiAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allKelas = Pelajaran::find($request->user()->pelajaran_id)->kelas;
        if ($allKelas->isEmpty()) {
            $kelasId = 0;
        } else {
            $kelasId = $request->kelas_id ?? $allKelas[0]->id;
        }
        $siswa = Siswa::with(['nilaiAkhir' => fn (Builder $query) => $query->where('pelajaran_id', $request->user()->pelajaran_id)])
                ->with(['nilaiUlangan' => fn (Builder $query) => $query->where('pelajaran_id', $request->user()->pelajaran_id)])
                ->where('kelas_id', $kelasId)->orderBy('nama_siswa')->get()
                ->map(function($siswa){
                    $siswa->nilaiAkhir->each(fn($nilai) => $siswa['nilai_' . $nilai['tipe']] = round($nilai['nilai'], 2));
                    $siswa['nilai_pengetahuan'] = round($siswa->nilaiUlangan->avg('nilai'), 2);
                    return $siswa;
                });
        return view('guru.nilai-akhir', compact('allKelas', 'kelasId', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Pelajaran::find(auth()->user()->pelajaran_id)->kelas;
        return view('guru.tambah-nilai-akhir', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NilaiUlanganRequest $request)
    {
        $nilaiAkhirModel = new NilaiAkhir();
        $nilaiAkhirModel->insertAllNilai($request, $request->siswa_id);
        return redirect()->route('nilai-akhir.index')->with('success', 'Data Nillai Akhir berhasil di tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $kelas = $siswa->kelas;
        $nilaiAkhir = NilaiAkhir::where('siswa_id', $siswa->id)->where('pelajaran_id', auth()->user()->pelajaran_id)->get()->groupBy('tipe');
        $nilaiPengetahuan = round(NilaiUlangan::where('siswa_id', $siswa->id)->where('pelajaran_id', auth()->user()->pelajaran_id)->get()->avg('nilai'), 2);
        $nilaiAkhir['pengetahuan'][0]['nilai'] = $nilaiPengetahuan;
        return view('guru.ubah-nilai-akhir', compact('siswa', 'kelas', 'nilaiAkhir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $nilaiAkhirModel = new NilaiAkhir();
        $nilaiAkhirModel->insertAllNilai($request, $siswa->id);
        return redirect()->route('nilai-akhir.index')->with('success', 'Data Nilai Akhir berhasil di ubah');
    }

    public function getBySiswa(Siswa $siswa)
    {
        $nilaiAkhir = NilaiAkhir::where('siswa_id', $siswa->id)->where('pelajaran_id', auth()->user()->pelajaran_id)->get()->groupBy('tipe');
        return response()->json($nilaiAkhir);
    }

    public function daftarNilai()
    {
        $siswaId = auth('siswa')->user()->id;
        $kelasId = auth('siswa')->user()->kelas_id;
        $nilaiAkhir = Pelajaran::with(['nilaiAkhir' => fn(Builder $query) => $query->where('siswa_id', $siswaId)])
        ->whereHas('kelas', fn(Builder $query) => $query->where('kelas_id', $kelasId))
        ->get()->map(function($nilai){
            $nilai->nilaiAkhir->each(function($nilaiAkhir) use ($nilai) {
                $nilai[$nilaiAkhir['tipe']] = [
                    'nilai' => $nilaiAkhir['nilai'],
                    'keterangan' => $nilaiAkhir['keterangan'],
                ];
            });
            return $nilai;
        });
        return view('siswa.daftar-nilai-akhir', compact('nilaiAkhir'));
    }
}
