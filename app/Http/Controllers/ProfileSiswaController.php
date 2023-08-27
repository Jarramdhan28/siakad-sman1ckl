<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileSiswaController extends Controller
{
    public function index()
    {
        return view('siswa.profile');
    }

    public function update(Request $request, Siswa $siswa)
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

        return redirect()->route('profileSiswa.index')->with('success', 'Data Berhasil Diubah');
    }

    public function updatePass(Request $request, Siswa $siswa)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        if (Hash::check($request->current_password, $siswa->password)) {
            $siswa->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Kata sandi berhasil diubah.');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Kata sandi lama salah.']);
        }
    }
}
