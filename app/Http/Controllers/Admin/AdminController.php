<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuruRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all()->where('role', '1');
        return view('admin.admin', compact('admin'));
    }

    public function create(Admin $admin)
    {
        return view('admin.tambah-admin', compact('admin'));
    }

    public function store(GuruRequest $request)
    {
        Admin::create([
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

        return redirect()->route('admin.index')->with('success', 'Data Admin Berhasil Disimpan');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'admin Berhasil Dihapus');
    }

    public function edit(Admin $admin)
    {
        return view('admin.ubah-admin', compact('admin'));
    }

    public function update(GuruRequest $request, Admin $admin)
    {
        $admin->update([
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

        return redirect()->route('admin.index')->with('success', 'Admin Berhasil Diubah.');
    }
}
