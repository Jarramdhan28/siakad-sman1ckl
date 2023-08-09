<?php

namespace App\Http\Controllers\Auth\AdminGuru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterGuruController extends Controller
{
    public function create(): View
    {
        return view('auth.adminGuru.register');
    }

    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'nip' => ['required', 'string', 'max:255'],
        //     'nama_guru' => ['required', 'string', 'max:255'],
        //     'alamat' => ['required', 'text', 'max:255'],
        //     'pelajaran_id' => ['required', 'string', 'max:255'],
        //     'no_hp' => ['required', 'string', 'max:15'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Guru::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'role' => ['required', 'string', 'max:15'],
        // ]);

        $guru = Guru::create([
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


        return redirect(RouteServiceProvider::HOME);
    }
}
