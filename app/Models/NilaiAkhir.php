<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    use HasFactory;
    protected $table = 'nilai_akhir';
    protected $guarded = ['id'];

    public function insertAllNilai($request, $siswaId)
    {
        $this->where('siswa_id', $siswaId)->where('pelajaran_id', $request->user()->pelajaran_id)->delete();
        $this->create([
            'siswa_id' => $siswaId,
            'pelajaran_id' => $request->user()->pelajaran_id,
            'tipe' => 'pengetahuan',
            'nilai' => $request->nilai_pengetahuan ?? 0,
            'keterangan' => $request->keterangan_pengetahuan
        ]);
        
        $this->create([
            'siswa_id' => $siswaId,
            'pelajaran_id' => $request->user()->pelajaran_id,
            'tipe' => 'keterampilan',
            'nilai' => $request->nilai_keterampilan ?? 0,
            'keterangan' => $request->keterangan_keterampilan
        ]);
    }
}
