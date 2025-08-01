<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $fillable = [
        'id_pemesanan',
        'snap_token',
        'jumlah_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_bayar',
    ];

    // Relasi: Pembayaran ini milik satu pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}