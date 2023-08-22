<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruRequest;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileGuruController extends Controller
{
    public function index()
    {
        return view('guru.profile');
    }

    public function update(Request $request, Guru $guru)
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

        return redirect()->route('profile.index')->with('success', 'Guru Berhasil Diupdate');
    }

    public function updatePass(Request $request, Guru $guru)
    {
        if (Hash::check($request->current_password, $guru->password)) {
            $guru->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Kata sandi berhasil diubah.');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Kata sandi lama salah.']);
        }
    }
}
