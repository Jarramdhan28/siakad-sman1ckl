<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index()
    {
        $pelajaran = Pelajaran::all();
        return view('admin.pelajaran', compact('pelajaran'));
    }

    public function create()
    {
        return view('admin.tambah-pelajaran');
    }

    public function store(Request $request)
    {
        Pelajaran::create($request->only('nama_pelajaran'));
        return redirect()->route('pelajaran.index')->with('success', 'Data pelajaran berhasil di simpan!');
    }

    public function destroy(Pelajaran $pelajaran)
    {
        $pelajaran->delete();
        return redirect()->route('pelajaran.index')->with('success', 'Pelajaran Berhasil Dihapus');
    }

    public function edit(Pelajaran $pelajaran)
    {
        return view('admin.ubah-pelajaran', compact('pelajaran'));
    }

    public function update(Request $request, Pelajaran $pelajaran)
    {
        $pelajaran->update($request->only('nama_pelajaran'));
        return redirect()->route('pelajaran.index')->with('success', 'Pelajaran Berhasil Diupdate successfully.');
    }
}
