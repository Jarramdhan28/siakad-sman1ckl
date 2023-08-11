<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all()->where('role', '0');
        return view('admin.guru', compact('guru'));
    }

    public function create()
    {
        $pelajaran = Pelajaran::all();
        return view('admin.tambah-guru', compact('pelajaran'));
    }

    public function store(Request $request)
    {
        $guru = Guru::create([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'pelajaran_id' => $request->pelajaran_id,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'Data Guru Berhasil Disimpan');

        return redirect()->route('adminGuru');
    }

    public function hapus($id)
    {
        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()->route('adminGuru')->with('success', 'Guru Berhasil Dihapus');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        $pelajaran = Pelajaran::all();
        return view('admin.ubah-guru', compact('guru', 'pelajaran'));
    }

    public function ubah(Request $request, $id)
    {
        $guru = Guru::where('id', $request->id)->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'pelajaran_id' => $request->pelajaran_id,
            'role' => $request->role
        ]);

        return redirect()->route('adminGuru')->with('success', 'Guru Berhasil Diupdate successfully.');
    }
}
