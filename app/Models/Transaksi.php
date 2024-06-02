<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'jenis', 'jumlah'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
