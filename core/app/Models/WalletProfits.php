<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletProfits extends Model
{
    use HasFactory;

    protected $appends = ['last_sharing_update', 'business_pack_plans', 'business_value_plans'];

    public function getLastSharingUpdateAttribute()
    {
        $hours = Carbon::parse($this->sharing_profit_updated_at)->diffInHours(now());
        return $hours;
    }

    public function getBusinessPackPlansAttribute()
    {
        return Plan::where('plan_wallet', (new BusinessPackWallet)->getTable())->latest()->get();
    }
    public function getBusinessValuePlansAttribute()
    {
        return Plan::where('plan_wallet', (new BusinessValueWallet)->getTable())->latest()->get();
    }
}
