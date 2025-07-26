<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil 4 produk terbaru dari tabel obat
        $produkTerbaru = Obat::latest()->take(3)->get();

        // Ambil 4 produk terlaris berdasarkan jumlah total penjualan
        $produkTerlaris = DB::table('item_pesanan')
            ->join('obat', 'item_pesanan.id_obat', '=', 'obat.id')
            ->select('obat.*', DB::raw('SUM(item_pesanan.jumlah) as total_terjual'))
            ->groupBy('obat.id', 'obat.nama_obat', 'obat.harga', 'obat.stok', 'obat.keterangan', 'obat.foto', 'obat.created_at', 'obat.updated_at')
            ->orderByDesc('total_terjual')
            ->limit(4)
            ->get();

        return view('landing', compact('produkTerbaru', 'produkTerlaris'));
    }
}
