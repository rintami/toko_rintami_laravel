<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailco extends Model
{
    use HasFactory;

    protected $table = 'detailcos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kodeco', 'kodeproduk', 'harga'
    ];
}
