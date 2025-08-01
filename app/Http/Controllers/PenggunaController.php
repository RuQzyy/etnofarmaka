<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    // Ganti isi fungsi index() Anda dengan ini:
    public function index()
    {
        // Ambil 4 produk terbaru
        $produkTerbaru = Obat::latest()->take(4)->get();

        // Ambil 4 produk terlaris berdasarkan jumlah dibeli
        $produkTerlaris = Obat::where('stok', '>', 0) // Hanya tampilkan yang ada stok
            ->orderBy('jumlah_dibeli', 'desc')
            ->take(4)
            ->get();

        // Ambil SEMUA produk dengan paginasi 10 per halaman
        $semuaProduk = Obat::latest()->paginate(10);

        return view('pengguna.dashboard', compact('produkTerbaru', 'produkTerlaris', 'semuaProduk'));
    }
}
