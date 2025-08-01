<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $obat_count = Obat::count();
        $pemesanan_count = Pemesanan::count();
        return view('admin.dashboard', compact('obat_count', 'pemesanan_count'));
    }
}
