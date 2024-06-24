<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kodetoko', 'kodekategori', 'namaproduk', 'stok', 'harga', 'daerah', 'deskripsi', 'gambar1', 'gambar2', 'gambar3'
    ];
}
