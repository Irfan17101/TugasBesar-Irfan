<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'telepon',
        'alamat',
        'paket',
        'berat',
        'tgl_ambil',
    ];
}
