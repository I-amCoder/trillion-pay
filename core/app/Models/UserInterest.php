<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "user_interests";

    public function business_pack_payment()
    {
        return $this->belongsTo(BusinessPackPayment::class, 'payment_id');
    }
    public function business_value_payment()
    {
        return $this->belongsTo(BusinessValuePayment::class, 'payment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
