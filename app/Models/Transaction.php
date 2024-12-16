<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'transaction_date',
    ];

    // Relasi ke tabel user (Transaction dimiliki oleh User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
