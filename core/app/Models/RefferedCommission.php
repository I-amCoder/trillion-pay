<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RefferedCommission extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function parent(){
        return $this->belongsTo(User::class,'reffered_by');
    }

    public function child(){
        return $this->belongsTo(User::class,'reffered_to');
    }

    public function commissionFrom()
    {
        return $this->belongsTo(User::class,'commission_from');
    }
}
