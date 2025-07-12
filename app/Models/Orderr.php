<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderr extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'service_name',
        'weight',
        'total_price',
        'pickup_date',
        'notes',
        'status',
        'payment_status',
    ];

    /**
     * Mendefinisikan relasi: satu Order dimiliki oleh satu User (Pelanggan).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
