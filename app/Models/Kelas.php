<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function pelajaran()
    {
        return $this->belongsToMany(Pelajaran::class, 'belajar');
    }

    public function absensi()
    {
        return $this->hasManyThrough(Absensi::class, Siswa::class);
    }
}
