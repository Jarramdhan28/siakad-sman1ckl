<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.tambah-siswa', compact('kelas'));
    }

    public function store(Request $request)
    {
        $guru = Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'kelas_id' => $request->kelas_id,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'Data Siswa Berhasil Disimpan');

        return redirect()->route('adminSiswa');
    }

    public function hapus($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()->route('adminSiswa')->with('success', 'Siswa Berhasil Dihapus');
    }
}
