<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemKeranjang extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'item_keranjang';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_keranjang',
        'id_obat',
        'jumlah',
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model Obat.
     * Artinya, satu item keranjang merujuk ke satu jenis obat.
     */
    public function obat()
    {
        // Pastikan Anda sudah memiliki model Obat
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Keranjang.
     */
    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_keranjang');
    }
}