<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable.
     * Menggunakan $guarded adalah alternatif dari $fillable.
     * Dengan ['id'], semua kolom lain bisa diisi secara massal,
     * termasuk 'pickup_time' dan kolom lain yang kita butuhkan.
     * Ini adalah cara yang lebih fleksibel dan aman.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     * Ini memastikan tipe data yang benar saat mengakses atribut.
     *
     * @var array
     */
    protected $casts = [
        'pickup_date' => 'date',
        'total_price' => 'integer',
        'weight' => 'decimal:2',
    ];

    /**
     * Mendefinisikan relasi: satu Order dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
