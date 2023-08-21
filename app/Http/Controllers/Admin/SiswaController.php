<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaRequest;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('admin.siswa', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.tambah-siswa', compact('kelas'));
    }

    public function store(SiswaRequest $request)
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

        return redirect()->route('siswa.index');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Dihapus');
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('admin.ubah-siswa', compact('siswa', 'kelas'));
    }

    public function update(SiswaRequest $request, Siswa $siswa)
    {
        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Diupdate successfully.');
    }

    public function getByKelas(Kelas $kelas)
    {
        return response()->json(Siswa::where('kelas_id', $kelas->id)->orderBy('nama_siswa')->get());
    }
}
