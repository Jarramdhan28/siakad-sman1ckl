<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nilaiUlangan()
    {
        return $this->hasMany(NilaiUlangan::class);
    }

    public function nilaiAkhir()
    {
        return $this->hasMany(NilaiAkhir::class);
    }
}
