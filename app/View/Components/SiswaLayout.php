<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiswaLayout extends Component
{
    public function render(): View|Closure|string
    {
        return view('layouts.siswa');
    }
}
