<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Guru extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'nip', 'nama_guru', 'alamat', 'pelajaran_id', 'no_hp', 'email', 'password', 'role'
    // ];
}
