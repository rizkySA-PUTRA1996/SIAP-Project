<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(): View
    {
        return view('apotik.dashboard');
    }
    public function admin(): View
    {
        return view('admin.dashboard');
    }

    public function petugas():View
    {
        return view('petugas.dashboard');
    }
}
