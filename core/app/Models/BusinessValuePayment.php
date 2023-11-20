<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessValuePayment extends Model
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
        return $this->belongsTo(BusinessValueWallet::class, 'wallet_id');
    }

    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id');
    }

    public function deposit(){
        return $this->belongsTo(Deposit::class,'deposit_id');
    }
}
