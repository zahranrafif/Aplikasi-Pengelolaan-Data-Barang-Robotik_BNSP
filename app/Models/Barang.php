<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'stok', 'harga', 'supplier_id', 'foto'];


    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
