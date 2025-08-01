<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $fillable = [
        'id_user',
        'id_keranjang',
        'snap_token',
        'tanggal_pesan',
        'total_harga',
        'status',
    ];

    // Konversi kolom tanggal_pesan menjadi objek DateTime
    protected $cast = [
        'tanggal_pesan' => 'datetime',
    ];

    // Relasi: Satu pemesanan dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi: Satu pemesanan memiliki banyak item pesanan
    public function itemPesanan()
    {
        return $this->hasMany(ItemPesanan::class, 'id_pemesanan');
    }

    // Relasi: Satu pemesanan memiliki satu pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan');
    }

    public function keranjang(){
        return $this->hasOne(Keranjang::class);
    }

    // Fungsi untuk memperbarui jumlah_dibeli pada tabel obat
    public function updateObatJumlahDibeliAndStok()
    {
        $this->load('itemPesanan.obat');

        foreach ($this->itemPesanan as $item) {
            $item->obat?->increment('jumlah_dibeli', $item->jumlah);
            $item->obat->decrement('stok', $item->jumlah);           
        }
    }
}