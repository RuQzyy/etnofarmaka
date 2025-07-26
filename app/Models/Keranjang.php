<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ItemKeranjang;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = [
        'id_user',
    ];

    public function user(){
        return $this->belongsTO(User::class, 'id_user');
    }

    public function items()
    {
        return $this->hasMany(ItemKeranjang::class, 'id_keranjang');
    }
}
