<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;


    protected $casts = [
        'email_config' => 'object',
        'kyc' => 'array'
    ];


    protected $guarded = [];
}
