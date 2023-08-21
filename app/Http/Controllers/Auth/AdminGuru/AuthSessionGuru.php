<?php

namespace App\Http\Controllers\Auth\AdminGuru;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSessionGuru extends Controller
{
    public function create(): View
    {
        return view('auth.adminGuru.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if($request->user()->role === '1'){
                return redirect()->route('adminDashboard');
            }else if($request->user()->role === '0'){
                return redirect()->route('guruDashboard');
            }
        } else {
            return back()->withErrors(['nip' => 'NIP atau password salah.']);
        }
    }
}
