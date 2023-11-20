<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table="referrals";
    
    protected $casts = [
        'level' => 'array',
        'commision' => 'array'        
    ];

}
