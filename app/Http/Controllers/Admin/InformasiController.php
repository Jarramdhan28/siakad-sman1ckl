<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        return view('admin.informasi', compact('informasi'));
    }

    public function create()
    {
        return view('admin.tambah-informasi');
    }

    public function store(Request $request)
    {
        Informasi::create($request->only(['judul', 'tanggal', 'isi']));
        return redirect()->route('informasi.index')->with('success', 'Data Informasi Berhasil Disimpan');
    }

    public function destroy(Informasi $informasi)
    {
        $informasi->delete();
        return redirect()->route('informasi.index')->with('success', 'Informasi Berhasil Dihapus');
    }

    public function edit(Informasi $informasi)
    {
        return view('admin.ubah-informasi', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $informasi->update($request->only(['judul', 'tanggal', 'isi']));
        return redirect()->route('informasi.index')->with('success', 'Informasi Berhasil Diupdate');
    }

    public function show(Informasi $informasi)
    {
        return view('admin.lihat-informasi', compact('informasi'));
    }
}
