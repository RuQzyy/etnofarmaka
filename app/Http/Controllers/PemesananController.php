<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\{Keranjang, Pemesanan, ItemPesanan, Obat, Pembayaran};
use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;

class PemesananController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        
        $keranjang = Keranjang::with('items.obat')->where('id_user', $user->id)->first();

        // Cek apakah keranjang ada
        if (!$keranjang || $keranjang->items->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Cek apakah sudah ada pemesanan untuk keranjang ini
        $pemesanan = Pemesanan::where('id_keranjang', $keranjang->id)
            ->where('status', 'menunggu_pembayaran')
            ->first();

        if (!$pemesanan) {
            // Buat pemesanan baru jika belum ada
            $pemesanan = Pemesanan::create([
                'id_user' => $user->id,
                'id_keranjang' => $keranjang->id,
                'total_harga' => $keranjang->items->sum(fn($item) => $item->jumlah * $item->obat->harga),
                'tanggal_pesan' => Carbon::now()->format('Y-m-d'),
                'status' => 'menunggu_pembayaran'
            ]);

            // Pindahkan item dari keranjang ke item_pesanan
            foreach ($keranjang->items as $item) {
                $pemesanan->itemPesanan()->create([
                    'id_obat' => $item->id_obat,
                    'jumlah' => $item->jumlah,
                    'harga_satuan' => $item->obat->harga
                ]);
            }
        }
        return redirect()->route('pembayaran.create', $pemesanan->id);
    }

    public function indexHistori()
    {
        $pemesanan = Pemesanan::where('id_user', Auth::id())
                                ->with('pembayaran')
                                ->latest()
                                ->paginate(10);
        return view('pengguna.pemesanan.index', compact('pemesanan'));
    }

    public function showHistori(Pemesanan $pemesanan)
    {
        abort_if($pemesanan->id_user !== Auth::id(), 403);

        $pemesanan->load('itemPesanan.obat', 'pembayaran');

        return view('pengguna.pemesanan.show', compact('pemesanan'));
    }

    public function historiAdmin(){
        $pemesanan = Pemesanan::with('user')->get();
        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    public function detailHistoriAdmin(Pemesanan $pemesanan){
        $pemesanan->load('itemPesanan.obat', 'pembayaran');
        return view('admin.pemesanan.show', compact('pemesanan'));
    }
}
