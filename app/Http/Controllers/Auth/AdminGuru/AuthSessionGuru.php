<?php

namespace App\Http\Controllers\Auth\AdminGuru;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginGuruRequest;
use App\Models\Guru;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSessionGuru extends Controller
{
    public function create() : View
    {
        return view('auth.adminguru.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('nip', 'password');

        if (Auth::guard('guru')->attempt($credentials))
        {
            return redirect('/admin/dashboard');
        }

        else
        {
            return back()->withErrors(['nip' => 'NIP atau password salah.']);
        }
    }
}
