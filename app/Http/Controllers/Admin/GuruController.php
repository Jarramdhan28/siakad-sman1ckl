<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuruRequest;
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

    public function store(GuruRequest $request)
    {
        Guru::create([
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

        return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil Disimpan');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru Berhasil Dihapus');
    }

    public function edit(Guru $guru)
    {
        $pelajaran = Pelajaran::all();
        return view('admin.ubah-guru', compact('guru', 'pelajaran'));
    }

    public function update(GuruRequest $request, Guru $guru)
    {
        $guru->update([
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

        return redirect()->route('guru.index')->with('success', 'Guru Berhasil Diupdate successfully.');
    }
}
