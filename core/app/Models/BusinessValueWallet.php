<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessValueWallet extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function payments()
    {
        return $this->hasMany(BusinessPackPayment::class, 'wallet_id');
    }
}
