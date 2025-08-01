<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\ItemKeranjang;
use App\Models\Obat; // Pastikan model Obat di-import
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang login

class KeranjangController extends Controller
{
    use AuthorizesRequests;

    /**
     * Menampilkan semua item dalam keranjang milik pengguna yang sedang login.
     */
    // ...
    public function index()
    {
        $user = Auth::user();
        $keranjang = Keranjang::firstOrCreate(['id_user' => $user->id]);
        $items = ItemKeranjang::where('id_keranjang', $keranjang->id)->with('obat')->get();

        // Hitung total harga
        $totalHarga = $items->sum(function($item) {
            return $item->obat->harga * $item->jumlah;
        });

        // Kirim data ke view
        return view('pengguna.keranjang.index', compact('items', 'totalHarga'));
    }
    // ...

    /**
     * Menambahkan obat ke dalam keranjang.
     */
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_obat' => 'required|exists:obat,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $idObat = $request->id_obat;
        $jumlah = $request->jumlah;

        // Cari atau buat keranjang untuk user ini
        $keranjang = Keranjang::firstOrCreate(['id_user' => $user->id]);

        // Cek apakah obat sudah ada di keranjang
        $item = ItemKeranjang::where('id_keranjang', $keranjang->id)
                             ->where('id_obat', $idObat)
                             ->first();

        // Cek apakah jumlah obat yang diminta tidak melebihi stok
        $obat = Obat::findOrFail($idObat);
            if ($jumlah > $obat->stok) {
                return redirect()->back()->with('warning', "Jumlah obat yang diminta tidak tersedia. Stok saat ini $obat->stok");
            }

        if ($item) {
            // Jika sudah ada, tambahkan jumlahnya
            $item->increment('jumlah', $jumlah);
        } else {
            // Jika belum ada, buat item keranjang baru
            ItemKeranjang::create([
                'id_keranjang' => $keranjang->id,
                'id_obat' => $idObat,
                'jumlah' => $jumlah,
            ]);
        }

        return redirect()->route('keranjang.index')->with('success', 'Obat berhasil ditambahkan ke keranjang!');
    }

    /**
     * Memperbarui jumlah item dalam keranjang.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        // Cari item berdasarkan ID-nya
        $item = ItemKeranjang::findOrFail($id);
        
        // Cek apakah jumlah obat yang diminta tidak melebihi stok
        $obat = Obat::findOrFail($item->id_obat);
            if ($request->jumlah > $obat->stok) {
                return redirect()->back()->with('warning', "Jumlah obat yang diminta tidak tersedia. Stok saat ini $obat->stok");
            }

        // Pastikan user yang login adalah pemilik keranjang
        // Ini adalah langkah keamanan penting
        $this->authorize('update', $item->keranjang);

        $item->update(['jumlah' => $request->jumlah]);

        return redirect()->route('keranjang.index')->with('success', 'Jumlah obat berhasil diperbarui.');
    }

    /**
     * Menghapus item dari keranjang.
     */
    public function hapus($id)
    {
        $item = ItemKeranjang::findOrFail($id);
        // Otorisasi untuk memastikan user berhak menghapus
        $this->authorize('delete', $item->keranjang);

        $item->delete();

        // Jika item terakhir dihapus, hapus juga keranjang
        if (is_null($item->keranjang->itemKeranjang)) {
            $item->keranjang->delete();
        }

        return redirect()->route('keranjang.index')->with('success', 'Obat berhasil dihapus dari keranjang.');
    }
}