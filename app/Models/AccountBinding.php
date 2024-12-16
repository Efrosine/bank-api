<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountBinding extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ecommerce_user_id',
        'linked_at',
        'status',
    ];

    // Relasi ke tabel user (AccountBinding dimiliki oleh User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
