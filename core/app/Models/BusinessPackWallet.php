<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPackWallet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function payments(){
        return $this->hasMany(BusinessPackPayment::class,'wallet_id');
    }
}
