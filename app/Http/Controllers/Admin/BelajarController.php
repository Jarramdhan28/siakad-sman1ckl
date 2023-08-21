<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BelajarRequest;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::whereHas('pelajaran')->withCount('pelajaran')->get();
        return view('admin.belajar', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::get();
        $pelajaran = Pelajaran::get();
        return view('admin.tambah-belajar', compact('kelas', 'pelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BelajarRequest $request)
    {
        $kelas = Kelas::find($request->kelas_id);
        $kelas->pelajaran()->detach();
        foreach($request->pelajaran as $pelajaran_id){
            $kelas->pelajaran()->attach($pelajaran_id);
        }
        return redirect()->route('belajar.index')->with('success', 'Data belajar berhasil di tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $belajar = $kelas->pelajaran;
        $pelajaran = Pelajaran::get();
        return view('admin.ubah-belajar', compact('kelas', 'belajar', 'pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BelajarRequest $request, Kelas $kelas)
    {
        $kelas->pelajaran()->detach();
        foreach($request->pelajaran as $pelajaran_id){
            $kelas->pelajaran()->attach($pelajaran_id);
        }
        return redirect()->route('belajar.index')->with('success', 'Data belajar berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->pelajaran()->detach();
        return redirect()->route('belajar.index')->with('success', 'Data belajar berhasil di hapus');
    }
}
