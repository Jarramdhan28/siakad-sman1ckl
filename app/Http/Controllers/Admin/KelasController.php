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
        $kelas = Kelas::create([
            'nip' => $request->nip,
            'nama_kelas' => $request->nama_kelas,
        ]);

        session()->flash('success', 'Data Kelas Berhasil Disimpan');

        return redirect()->route('adminKelas');
    }

    public function hapus($id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()->route('adminKelas')->with('success', 'Kelas Berhasil Dihapus');
    }
}
