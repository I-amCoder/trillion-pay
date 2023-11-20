<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BusinessPackWallet;
use App\Models\BusinessValueWallet;
use App\Models\CurrentWallet;
use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\GeneralSetting;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\SavingWallet;
use App\Models\SharingWallet;
use App\Models\Transaction;
use App\Notifications\DepositNotification;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;

class PaymentController extends Controller
{
    public function __construct()
    {
        $general = GeneralSetting::first();
        $this->template = $general->theme == 1 ? 'frontend.' : "theme{$general->theme}.";
    }


    public function gateways(Request $request, $id)
    {

        $plan = Plan::findOrFail($id);

        $general = GeneralSetting::first();


        $gateways = Gateway::where('status', 1)->latest()->get();

        $pageTitle = "Payment Methods";

        return view($this->template . "user.gateway.gateways", compact('gateways', 'pageTitle', 'plan'));
    }

    public function paynow(Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:0',
            'wallet_type' => 'required',
        ]);

        $gateway = Gateway::where('status', 1)->findOrFail($request->id);
        $trx = strtoupper(Str::random());
        $final_amount = ($request->amount * $gateway->rate) + $gateway->charge;

        $plan_id = null;
        $wallet_type = null;
        $redirect = null;
        switch ($request->wallet_type) {
            case 'current_wallet':
                $wallet_type = (new CurrentWallet)->getTable();
                break;
            case 'saving_wallet':
                $wallet_type = (new SavingWallet)->getTable();
                break;

            case 'sharing_wallet':
                $wallet_type = (new SharingWallet)->getTable();
                break;
            case 'business_pack_wallets':
                $wallet_type = (new BusinessPackWallet)->getTable();
                $plan_id = $request->plan_id;
                $redirect = $this->validatePlan($plan_id, $request);
                break;
            case 'business_value_wallets':
                $wallet_type = (new BusinessValueWallet)->getTable();
                $plan_id = $request->plan_id;
                $redirect = $this->validatePlan($plan_id, $request);
                break;
        }

        if ($redirect) {
            return $redirect;
        }

        if (isset($request->type) && $request->type == 'deposit' && $wallet_type) {

            $deposit = Deposit::create([
                'gateway_id' => $gateway->id,
                'user_id' => auth()->id(),
                'transaction_id' => $trx,
                'amount' => $request->amount,
                'rate' => $gateway->rate,
                'charge' => $gateway->charge,
                'final_amount' => $final_amount,
                'payment_status' => 0,
                'payment_type' => 1,
                'wallet_type' => $wallet_type,
                'plan_id' => $plan_id,
            ]);

            session()->put('trx', $trx);
            session()->put('type', 'deposit');
            session()->put('wallet', $wallet_type);



            return redirect()->route('user.gateway.details', $gateway->id);
        }

        return redirect()->back()->withError('Cannont Purchase Directly');



        $next_payment_date = Carbon::now()->addHours($plan_id->time->time);

        $payment = Payment::create([
            'plan_id' => $plan_id->id,
            'gateway_id' => $gateway->id,
            'user_id' => auth()->id(),
            'transaction_id' => $trx,
            'amount' => $request->amount,
            'rate' => $gateway->rate,
            'charge' => $gateway->charge,
            'final_amount' => $final_amount,
            'payment_status' => 0,
            'next_payment_date' => $next_payment_date,

        ]);




        session()->put('trx', $trx);
        session()->forget('type');

        return redirect()->route('user.gateway.details', $gateway->id);
    }


    public function createPayment()
    {
    }

    public function validatePlan($plan_id, $request)
    {
        $plan_id = Plan::with('time')->findOrFail($request->plan_id);

        if ($plan_id->amount_type == 0) {
            if ($plan_id->maximum_amount) {
                if ($request->amount > $plan_id->maximum_amount) {
                    return redirect()->back()->with('error', 'Maximum Invest Limit ' . number_format($plan_id->maximum_amount, 2));
                }
            }

            if ($plan_id->minimum_amount) {
                if ($request->amount < $plan_id->minimum_amount) {
                    return redirect()->back()->with('error', 'Minimum Invest Limit ' . number_format($plan_id->minimum_amount, 2));
                }
            }
        }

        if ($plan_id->amount_type == 1) {

            if ($plan_id->amount) {
                if ($request->amount != $plan_id->amount) {
                    return redirect()->back()->with('error', 'Fixed Invest Limit ' . number_format($plan_id->amount, 2));
                }
            }
        }
    }

    public function gatewaysDetails($id)
    {


        $gateway = Gateway::where('status', 1)->findOrFail($id);

        $general = GeneralSetting::first();


        if (session('type') == 'deposit') {
            $deposit = Deposit::where('transaction_id', session('trx'))->firstOrFail();
        } else {

            $deposit = Payment::where('transaction_id', session('trx'))->firstOrFail();
        }

        $pageTitle = $gateway->gateway_name . ' Payment Details';


        if ($gateway->gateway_name == 'vouguepay') {

            $vouguePayParams["marchant_id"] = $gateway->gateway_parameters->vouguepay_merchant_id;
            $vouguePayParams["redirect_url"] = route("user.vouguepay.redirect");
            $vouguePayParams["currency"] = $gateway->gateway_parameters->gateway_currency;
            $vouguePayParams["merchant_ref"] = $deposit->transaction_id;
            $vouguePayParams["memo"] = "Payment";
            $vouguePayParams["store_id"] = $deposit->user_id;
            $vouguePayParams["loadText"] = $deposit->transaction_id;
            $vouguePayParams["amount"] = $deposit->final_amount;
            $vouguePayParams = json_decode(json_encode($vouguePayParams));

            return view($this->template . "user.gateway.{$gateway->gateway_name}", compact('gateway', 'pageTitle', 'deposit', 'vouguePayParams'));
        }

        if ($gateway->is_created) {

            return view($this->template . "user.gateway.gateway_manual", compact('gateway', 'pageTitle', 'deposit'));
        }


        if (strstr($gateway->gateway_name, 'gourl')) {
            return view($this->template . "user.gateway.gourl", compact('gateway', 'pageTitle', 'deposit'));
        }

        return view($this->template . "user.gateway.{$gateway->gateway_name}", compact('gateway', 'pageTitle', 'deposit'));
    }

    public function gatewayRedirect(Request $request, $id)
    {
        $gateway = Gateway::where('status', 1)->findOrFail($id);


        if (session('type') == 'deposit') {
            $deposit = Deposit::where('transaction_id', session('trx'))->firstOrFail();
        } else {

            $deposit = Payment::where('transaction_id', session('trx'))->firstOrFail();
        }

        if ($deposit->wallet_type == "business_value_wallets") {
            $request->validate([
                'sponser_profit' => 'required'
            ]);
            if ($request->sponser_profit > $deposit->plan->return_interest) {
                return redirect()->back()->withErrors([
                    'sponser_profit' => 'Sponser profit should be less than total profit'
                ]);
            }
        }

        if ($gateway->is_created) {

            $new = __NAMESPACE__ . '\\Gateway\\' . 'manual\ProcessController';
        } else {

            if (strstr($gateway->gateway_name, 'gourl')) {
                $new = __NAMESPACE__ . '\\Gateway\\' . 'gourl' . '\ProcessController';
            } else {
                $new = __NAMESPACE__ . '\\Gateway\\' . $gateway->gateway_name . '\ProcessController';
            }
        }

        $data = $new::process($request, $gateway, $deposit->final_amount, $deposit);

        if ($gateway->gateway_name == 'mercadopago') {
            return redirect()->to($data['redirect_url']);
        }

        if (strstr($gateway->gateway_name, 'gourl')) {
            return redirect()->to($data);
        }

        if ($gateway->gateway_name == 'nowpayments') {

            return redirect()->to($data->invoice_url);
        }

        if ($gateway->gateway_name == 'mollie') {

            return redirect()->to($data['redirect_url']);
        }

        if ($gateway->gateway_name == 'paghiper') {

            if (isset($data['status']) && $data['status'] == false) {
                return redirect()->route('user.investmentplan')->with('error', 'Something Went Wrong');
            }

            return redirect()->to($data);
        }

        if ($gateway->gateway_name == 'coinpayments') {

            if (isset($data['result']['checkout_url'])) {

                return redirect()->to($data['result']['checkout_url']);
            }
        }

        if ($gateway->gateway_name == 'paypal') {

            $data = json_decode($data);

            return redirect()->to($data->links[1]->href);
        }
        if ($gateway->gateway_name == 'paytm') {

            return view($this->template . 'user.gateway.auto', compact('data'));
        }

        $notify[] = ['success', 'Your Payment is Successfully Recieved'];
        return redirect()->route('user.dashboard')->with(['notify' => $notify,'deposit'=>$deposit]);
    }

    public static function updateUserData($deposit, $fee_amount, $transaction)
    {

        $general = GeneralSetting::first();

        $admin = Admin::first();

        $user = auth()->user();

        if (session('type') == 'deposit') {
            $user->balance = $user->balance + $deposit->amount;

            $user->save();

            $admin->notify(new DepositNotification($user, $deposit));
        }

        $deposit->payment_status = 1;

        $deposit->save();

        if (!(session('type') == 'deposit')) {

            refferMoney(auth()->id(), $deposit->user->refferedBy, 'invest', $deposit->amount);
        }

        session()->forget('type');

        Transaction::create([
            'trx' => $deposit->transaction_id,
            'gateway_id' => $deposit->gateway_id,
            'amount' => $deposit->amount,
            'currency' => @$general->site_currency,
            'details' => 'Payment Successfull',
            'charge' => $fee_amount,
            'type' => '-',
            'gateway_transaction' => $transaction,
            'user_id' => auth()->id(),
            'payment_status' => 1,
        ]);

        sendMail('PAYMENT_SUCCESSFULL', [
            'plan' => $deposit->plan->plan_name ?? 'Deposit',
            'trx' => $transaction,
            'amount' => $deposit->amount,
            'currency' => $general->site_currency,
        ], $deposit->user);
    }

    public function downloadInvoice()
    {
        $data =  [
            'Trx' => '9FFPHQLDHZ1G6IUY',
            'User' => 'Junaid Ali',
            'Gateway' => 'USDT',
            'Amount' => '200.00000000',
            'Currency' => 'usd',
            'Charge' => '0.00000000',
            'PaymentDate' => '2023-11-17',
        ];
        $html = view($this->template.'invoice', compact('data'))->render();
        return $html;
        // $path = public_path('invoice.png');

        // Browsershot::html($html)
        //     ->format('png')
        //     ->save($path);

        // return response()->download($path)->deleteFileAfterSend(true);
    }
}
