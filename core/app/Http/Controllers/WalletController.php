<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\WalletProfits;
use App\Models\WalletTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    protected $template;
    public function __construct()
    {
        $general = GeneralSetting::first();
        $this->template = $general->theme == 1 ? 'frontend.' : "theme{$general->theme}.";
    }

    public function index()
    {
        $settings = WalletProfits::first();
        return view('backend.wallet.index', compact('settings'));
    }

    public function update(Request $request, $wallet)
    {
        $rules = $this->getRules($wallet);
        $request->validate($rules[0], $rules[1], $rules[2]);
        $settings = WalletProfits::firstOrCreate();

        // Withdraw Periods
        $settings->business_value_time = $request->business_value_time ?? $settings->business_value_time;
        $settings->business_pack_time = $request->business_pack_time ?? $settings->business_pack_time;
        $settings->sharing_wallet_time = $request->sharing_time ?? $settings->sharing_wallet_time;
        $settings->saving_wallet_time = $request->saving_time ?? $settings->saving_wallet_time;
        $settings->current_wallet_time = $request->current_time ?? $settings->current_wallet_time;

        // Withdraw Taxes
        $settings->business_value_tax = $request->business_value_withdraw ?? $settings->business_value_tax;
        $settings->business_pack_tax = $request->business_pack_withdraw ?? $settings->business_pack_tax;
        $settings->saving_wallet_tax = $request->saving_withdraw ?? $settings->saving_wallet_tax;
        $settings->current_wallet_tax = $request->current_withdraw ?? $settings->current_wallet_tax;
        $settings->sharing_wallet_tax = $request->sharing_withdraw ?? $settings->sharing_wallet_tax;


        // Handle Profits
        if ($request->has('sharing_profit')) {
            // dd('hi');
            if ($request->sharing_profit != $settings->sharing_wallet_profit) {
                $settings->sharing_profit_updated_at = now();
            }
        }


        $settings->current_wallet_profit = $request->current_profit ?? $settings->current_wallet_profit;
        $settings->saving_wallet_profit = $request->saving_profit ?? $settings->saving_wallet_profit;
        $settings->sharing_wallet_profit = $request->sharing_profit ?? $settings->sharing_wallet_profit;
        $settings->sharing_default_profit = $request->sharing_default_profit ?? $settings->sharing_default_profit;

        $settings->save();

        return redirect()->back()->withSuccess("Profit Settings Updated Successfully");
    }








    public function getRules($type)
    {
        switch ($type) {
            case 'current_wallets':
                $rules = [[
                    'current_profit' => 'required|numeric',
                    'current_withdraw' => 'required|numeric',
                    'current_time' => 'required|numeric',
                ], [], [
                    'current_profit' => 'Current Wallet Profit',
                    'current_withdraw' => 'Current Wallet Withdraw Tax',
                    'current_time' => 'Current Wallet Withdraw Time',
                ]];
                break;
            case 'saving_wallets':
                $rules = [[
                    'saving_profit' => 'required|numeric',
                    'saving_withdraw' => 'required|numeric',
                    'saving_time' => 'required|numeric',
                ], [], [
                    'saving_profit' => 'Saving Wallet Profit',
                    'saving_withdraw' => 'Saving Wallet Withdraw Tax',
                    'saving_time' => 'Saving Wallet Withdraw Time',
                ]];
                break;
            case 'sharing_wallets':
                $rules = [[
                    'sharing_profit' => 'required|numeric',
                    'sharing_default_profit' => 'required|numeric',
                    'sharing_withdraw' => 'required|numeric',
                    'sharing_time' => 'required|numeric',
                ], [], [
                    'sharing_profit' => 'Sharing Wallet Profit',
                    'sharing_default_profit' => 'Sharing Wallet Default Profit',
                    'sharing_withdraw' => 'Sharing Wallet Withdraw Tax',
                    'sharing_time' => 'Sharing Wallet Withdraw Time',
                ]];
                break;
            case 'business_pack_wallets':
                $rules = [[
                    'business_pack_withdraw' => 'required|numeric',
                    'business_pack_time' => 'required|numeric',
                ], [], [

                    'business_pack_withdraw' => 'Business Pack Wallet Withdraw Tax',
                    'business_pack_time' => 'Business Pack Wallet Withdraw Time',
                ]];
                break;
            case 'business_value_wallets':
                $rules = [[
                    'business_value_withdraw' => 'required|numeric',
                    'business_value_time' => 'required|numeric',
                ], [], [
                    'business_value_withdraw' => 'Business Value Withdraw Tax',
                    'business_value_time' => 'Business Value Withdraw Time',
                ]];
                break;
            default:
                $rules = [['valid' => 'required'], ['valid' => 'Update Valid Profit']];
        }
        return $rules;
    }

    public function depositAmount()
    {
    }

    public function withdrawAmount(Request $request, $type)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);
        $settings = WalletProfits::first();

        $user = auth()->user();
        switch ($type) {
            case 'current_wallet':
                $wallet = $user->current_wallet;
                break;
            case 'saving_wallet':
                $wallet = $user->saving_wallet;
                break;
            case 'sharing_wallet':
                $wallet = $user->sharing_wallet;
                break;
            default:
                return redirect()->route('user.dashboard');
                break;
        }

        $tax_rate = $settings[$type . "_tax"];
        $tax = ($request->amount * $tax_rate) / 100;
        $amount  = $request->amount;
        $final =  $amount - $tax;

        if ($amount > $wallet->amount) {
            return back()->withError("Insufficient Balance in wallet");
        }

        $hours = $settings[$type . "_time"];

        $transfer = new WalletTransfer();
        $transfer->amount = $final;
        $transfer->user_id = $user->id;
        $transfer->wallet_id = $wallet->id;
        $transfer->wallet_type = $type;
        $transfer->time = $hours == 0 ? now()->subHours(1) : now()->addHours($hours);

        $wallet->amount -= $final;

        $transfer->save();
        $wallet->save();

        // Trigger transfer Instantly
        if ($hours == 0) {
            $trigger = new InterestController();
            $trigger->walletWithdrawReturn();
        }
        return back()->withSuccess("Requested Successfully");
    }

    /**
     * transferBalance
     *
     * @param  mixed $request
     * @return void
     */
    public function transferBalance(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);
        $settings = GeneralSetting::first();
        $user = Auth::user();
        $amount = $request->amount;
        $tax_rate = $settings->profit_transfer_charge;
        $tax = ($amount * $tax_rate) / 100;
        $final  = $amount - $tax;

        // Check if amount is insufficient
        if ($amount > $user->profit_balance) {
            return back()->withError('Insufficient profit balance');
        }

        $user->balance += $final;
        $user->profit_balance -= $amount;
        $user->save();
        return back()->withSuccess("Transferred Successfully");
    }

    /**
     * transferLog
     *
     * @param  mixed $request
     * @return void
     */
    public function transferLog(Request $request)
    {
        $pageTitle = strtoupper(str_replace('_', ' ', $request->wallet));
        $query  = WalletTransfer::query();
        switch ($request->wallet) {
            case 'current_wallet':
                $query->where('wallet_type', 'current_wallet');
                break;
            case 'saving_wallet':
                $query->where('wallet_type', 'saving_wallet');
                break;
            case 'sharing_wallet':
                $query->where('wallet_type', 'sharing_wallet');
                break;

            default:
                return redirect()->route('user.dashboard');
                break;
        }

        $transfers = $query->paginate();
        return view($this->template . 'user.wallet_transfer_log', compact('pageTitle', 'transfers'));
    }
}
