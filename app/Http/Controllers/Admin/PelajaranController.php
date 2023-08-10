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
        $pelajaran = Pelajaran::create([
            'nip' => $request->nip,
            'nama_pelajaran' => $request->nama_pelajaran,
        ]);

        session()->flash('success', 'Data Pelajaran Berhasil Disimpan');

        return redirect()->route('adminPelajaran');
    }

    public function hapus($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);

        $pelajaran->delete();

        return redirect()->route('adminPelajaran')->with('success', 'Pelajaran Berhasil Dihapus');
    }
}
