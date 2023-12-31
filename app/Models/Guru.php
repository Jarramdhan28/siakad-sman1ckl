<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Models\Pelajaran;

class Guru extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = ['id'];

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }
}
