<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'keterangan',
        'harga',
        'foto',
        'stok',
    ];
    
}
