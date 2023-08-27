<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
class Pelajaran extends Model
{
    use HasFactory;
    protected $table = 'pelajaran';
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'belajar');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
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
