<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'payment_proof' => 'array',
        'next_payment_date' => 'datetime'
    ];



    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function gateway()
    {
        return $this->belongsTo(Gateway::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
