<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    protected $template;

    public function __construct()
    {
        $general = GeneralSetting::first();
        $this->template = $general->theme == 1 ? 'frontend.' : "theme{$general->theme}.";
    }

    public function deposit()
    {
        $gateways = Gateway::where('status', 1)->latest()->get();

        $pageTitle = "Payment Methods";

        $type = 'deposit';

        return view($this->template . "user.gateway.gateways", compact('gateways', 'pageTitle', 'type'));
    }

    public function depositLog(Request $request)
    {
        $query = Deposit::query();
        $pageTitle = "Transactions";
        switch ($request->wallet) {
            case 'current_wallet':
                $query->where('wallet_type','current_wallets');
                break;
            case 'saving_wallet':
                $query->where('wallet_type','saving_wallets');
                break;
            case 'sharing_wallet':
                $query->where('wallet_type','sharing_wallets');
                break;
            case 'business_pack_wallet':
                $query->where('wallet_type','business_pack_wallets');
                break;
            case 'business_value_wallet':
                $query->where('wallet_type','business_value_wallets');
                break;

            default:
                return redirect()->route('user.dashboard');
                break;
        }

        $transactions = $query->when($request->trx, function ($item) use ($request) {
            $item->where('transaction_id', $request->trx);
        })->when($request->date, function ($item) use ($request) {
            $item->whereDate('created_at', $request->date);
        })->where('user_id', auth()->id())->latest()->with('user')->where('payment_status', 1)->paginate();

        return view($this->template . 'user.deposit_log', compact('pageTitle', 'transactions'));
    }
}
