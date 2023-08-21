<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUlangan extends Model
{
    use HasFactory;
    protected $table = 'nilai_ulangan';
    protected $guarded = ['id'];

    public function insertAllUlangan($request, $siswaId)
    {
        $pelajaranId = $request->user()->pelajaran_id;
        $this->where('pelajaran_id', $pelajaranId)->where('siswa_id', $siswaId)->delete();
        foreach($request->nama_tugas as $index => $tugas){
            if($tugas){
                $this->create([
                    'siswa_id' => $siswaId,
                    'pelajaran_id' => $pelajaranId,
                    'jenis_nilai' => 'tugas',
                    'nama_nilai' => $tugas,
                    'nilai' => $request->nilai_tugas[$index]
                ]);
            }
        }        
        foreach($request->nama_ulangan as $index => $ulangan){
            if($ulangan){
                $this->create([
                    'siswa_id' => $siswaId,
                    'pelajaran_id' => $pelajaranId,
                    'jenis_nilai' => 'ulangan',
                    'nama_nilai' => $ulangan,
                    'nilai' => $request->nilai_ulangan[$index]
                ]);
            }
        }

        $this->create([
            'siswa_id' => $siswaId,
            'pelajaran_id' => $pelajaranId,
            'jenis_nilai' => 'uts',
            'nilai' => $request->nilai_uts
        ]);

        $this->create([
            'siswa_id' => $siswaId,
            'pelajaran_id' => $pelajaranId,
            'jenis_nilai' => 'uas',
            'nilai' => $request->nilai_uas
        ]);
    }
}
