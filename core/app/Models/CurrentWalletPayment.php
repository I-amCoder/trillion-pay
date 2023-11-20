<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentWalletPayment extends Model
{
    use HasFactory;
    protected $casts = [
        'next_payment_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wallet()
    {
        return $this->belongsTo(CurrentWallet::class, 'wallet_id');
    }
}
