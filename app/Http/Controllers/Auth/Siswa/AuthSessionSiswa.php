<?php

namespace App\Http\Controllers\Auth\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthSessionSiswa extends Controller
{
    public function create(): View
    {
        return view('auth.siswa.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required'
        ]);
        if(Auth::guard('siswa')->attempt($request->only('nis', 'password'))){
            $request->session()->regenerate();
            return redirect()->route('siswaDashboard');
        } else if (Auth::attempt([
            'nip' => $request->nis,
            'password' => $request->password
        ])){
            if ($request->user()->role === '1') {
                return redirect()->route('adminDashboard');
            } else if ($request->user()->role === '0') {
                return redirect()->route('guruDashboard');
            }
        }else{
            throw ValidationException::withMessages([
                'password' => 'NIS / NIP / NUPTK  dan Password yang dimasukan tidak sesuai',
            ]);
        }
    }
}
