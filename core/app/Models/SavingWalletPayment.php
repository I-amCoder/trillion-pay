<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingWalletPayment extends Model
{
    use HasFactory;
    protected $casts = [
        'next_payment_time' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function wallet(){
        return $this->belongsTo(SavingWallet::class,'wallet_id');
    }
}
