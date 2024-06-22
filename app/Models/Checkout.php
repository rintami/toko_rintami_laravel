<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kodeproduk', 'kodepelanggan', 'jumlah', 'totalharga', 'tanggal', 'metodebayar', 'status', 'buktif'
    ];
}
