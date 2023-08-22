<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsensiRequest;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $pelajaranId = auth()->user()->pelajaran->id;
        $absensi = collect();
        Kelas::with('absensi')->whereHas('absensi')->get()->each(function($kelas) use ($absensi, $pelajaranId){
            $namaKelas = $kelas->nama_kelas;
            $kelasId = $kelas->id;
            $kelas->absensi->where('pelajaran_id', $pelajaranId)->groupBy('tanggal')->each(function($dataAbsen, $tanggal) use ($absensi, $namaKelas, $kelasId){
                $jumlahHadir = $dataAbsen->where('keterangan', 'H')->count();
                $absensi->push(collect([
                    'kelas_id' => $kelasId,
                    'nama_kelas' => $namaKelas,
                    'tanggal' => $tanggal,
                    'jumlah_hadir' => $jumlahHadir
                ]));

            });
        });
        $kelas = Pelajaran::find(auth()->user()->pelajaran_id)->kelas;
        return view('guru.absensi', compact('absensi', 'kelas', 'absensi'));
    }

    public function store(AbsensiRequest $request)
    {
        $pelajaranId = auth()->user()->pelajaran->id;
        $absen = Kelas::with(['absensi' => function (Builder $query) use ($request, $pelajaranId) {
            $query->where('tanggal', $request->tanggal)->where('pelajaran_id', $pelajaranId);
        }])->find($request->kelas_id)->absensi;
        if($absen->isEmpty()){
            Siswa::where('kelas_id', $request->kelas_id)->get()->each(function($siswa) use($request, $pelajaranId) {
                Absensi::create([
                    'siswa_id' => $siswa->id,
                    'pelajaran_id' => $pelajaranId,
                    'tanggal' => $request->tanggal,
                    'keterangan' => 'A'
                ]);
            });
        }
        return redirect()->route('absensi.show', [$request->kelas_id, $request->tanggal]);
    }

    public function show(Kelas $kelas, string $tanggal)
    {
        $pelajaranId = auth()->user()->pelajaran_id;
        $absensi = Kelas::with(['absensi' => fn(Builder $query) => $query->with('siswa')->where('tanggal', $tanggal)->where('pelajaran_id', $pelajaranId)->orderBy('siswa.nama_siswa', 'ASC')])->find($kelas->id)->absensi;
        $tanggal = Carbon::parse($tanggal)->isoFormat('D MMMM Y');
        return view('guru.detail-absen', compact('absensi', 'tanggal', 'kelas'));
    }

    public function updateKeterangan(Request $request, Absensi $absensi)
    {
        $absensi->update(['keterangan' => $request->keterangan]);
        return response($absensi->toJson());
    }

    public function destroy(Kelas $kelas, string $tanggal)
    {
        $pelajaranId = auth()->user()->pelajaran_id;
        $siswaId = $kelas->siswa->pluck('id');
        Absensi::where('pelajaran_id', $pelajaranId)->where('tanggal', $tanggal)->whereIn('siswa_id', $siswaId)->delete();

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil di hapus');
    }

    public function daftarAbsensi()
    {
        $siswaId = auth('siswa')->user()->id;
        $kelasId = auth('siswa')->user()->kelas_id;
        $absensi = Pelajaran::with(['absensi' => fn(Builder $query) => $query->where('siswa_id', $siswaId)])
                    ->whereHas('kelas', fn(Builder $query) => $query->where('kelas_id', $kelasId))
                    ->get()->map(function($pelajaran){
                        $pelajaran->absensi->each(fn($absen) => $pelajaran[$absen->keterangan] ? $pelajaran[$absen->keterangan] += 1 : $pelajaran[$absen->keterangan] = 1);
                        return $pelajaran;
                    });
        return view('siswa.daftar-absensi', compact('absensi'));
    }
}
