<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailproduk extends Model
{
    use HasFactory;

    protected $table = 'detailproduks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kodeproduk', 'gambar1', 'gambar2', 'gambar3'
    ];
}
