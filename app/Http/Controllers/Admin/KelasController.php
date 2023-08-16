<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas', compact('kelas'));
    }

    public function create()
    {
        return view('admin.tambah-kelas');
    }

    public function store(Request $request)
    {
        Kelas::create($request->only('nama_kelas'));
        return redirect()->route('kelas.index')->with('success', 'Data Kelas Berhasil Disimpan');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas Berhasil Dihapus');
    }

    public function edit(Kelas $kelas)
    {
        return view('admin.ubah-kelas', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $kelas->update($request->only('nama_kelas'));
        return redirect()->route('kelas.index')->with('success', 'Kelas Berhasil Diupdate successfully.');
    }
}
