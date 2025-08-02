<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    use HasFactory;

    protected $table = 'item_pesanan';
    protected $fillable = [
        'id_pemesanan',
        'id_obat',
        'jumlah',
        'harga_satuan',
    ];

    // Relasi: Item ini milik satu pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    // Relasi: Item ini merujuk ke satu obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat'); // Pastikan Anda punya model Obat
    }
}