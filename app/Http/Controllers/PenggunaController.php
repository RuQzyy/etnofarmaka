<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.dashboard'); // Buat file resources/views/pengguna/dashboard.blade.php
    }
}

