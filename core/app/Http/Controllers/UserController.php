<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Models\WithdrawGateway;
use App\Models\Payment;
use App\Models\UserInterest;
use App\Models\GeneralSetting;
use App\Models\LoginMessage;
use App\Models\Ranking;
use App\Models\RefferedCommission;
use App\Models\User;
use App\Models\MoneyTransfer;
use App\Models\SponserAmount;
use App\Models\SponserCommision;
use App\Models\UserRanking;
use App\Models\UserSlider;
use App\Models\WalletProfits;
use Illuminate\Http\Request;
use Nette\Utils\Random;
use Purifier;
use Auth;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $general = GeneralSetting::first();
        $this->template = $general->theme == 1 ? 'frontend.' : "theme{$general->theme}.";
    }

    public function dashboard()
    {

        $pageTitle = "Dashboard";
        $totalInvest = Payment::where('user_id', Auth::id())->where('payment_status', 1)->sum('amount');
        $currentInvest = Payment::where('user_id', Auth::id())->where('payment_status', 1)->latest()->first('amount');

        $currentPlan = Payment::with('plan')->where('user_id', Auth::id())->where('payment_status', 1)->latest()->first();

        $allPlan = Payment::with('plan')->where('user_id', Auth::id())->latest()->paginate(10, ['*'], 'plan');
        $withdraw = Withdraw::where('user_id', Auth::id())->where('status', 1)->sum('withdraw_amount');
        $interestLogs = UserInterest::where('user_id', Auth::id())->latest()->paginate(10, ['*'], 'log');

        $commison = RefferedCommission::where('reffered_by', Auth::id())->sum('amount');

        $pendingInvest = Payment::where('user_id', Auth::id())->where('payment_status', 2)->sum('amount');
        $pendingWithdraw = Withdraw::where('user_id', Auth::id())->where('status', 0)->sum('withdraw_amount');
        $totalDeposit = Deposit::where('user_id', Auth::id())->where('payment_status', 1)->sum('final_amount');
        $gateway = Gateway::where('is_created', 1)->latest()->first();
        $settings = WalletProfits::first();
        $loginMessage = LoginMessage::first();
        $sliders = UserSlider::where('status',1)->latest()->get();


        return view($this->template . 'user.dashboard', compact('commison', 'pageTitle', 'interestLogs', 'totalInvest', 'currentInvest', 'currentPlan', 'allPlan', 'withdraw', 'pendingInvest', 'pendingWithdraw', 'totalDeposit', 'gateway', 'settings', 'loginMessage','sliders'));
    }

    public function profile()
    {
        $pageTitle = 'Profile Edit';

        $user = auth()->user();

        return view($this->template . 'user.profile', compact('pageTitle', 'user'));
    }

    public function profileUpdate(Request $request)
    {


        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,username,' . Auth::id(),
            'image' => 'sometimes|image|mimes:jpg,png,jpeg',
            'email' => 'required|unique:users,email,' . Auth::id(),
            'phone' => 'unique:users,id,' . Auth::id(),

        ], [
            'fname.required' => 'First Name is required',
            'lname.required' => 'Last Name is required',

        ]);

        $user = auth()->user();


        if ($request->hasFile('image')) {
            $filename = uploadImage($request->image, filePath('user'), $user->image);
            $user->image = $filename;
        }


        $data = [
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'state' => $request->state,
        ];

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $data;
        $user->save();



        $notify[] = ['success', 'Successfully Updated Profile'];

        return back()->withNotify($notify);
    }


    public function changePassword()
    {
        $pageTitle = 'Change Password';
        return view($this->template . 'user.auth.changepassword', compact('pageTitle'));
    }


    public function updatePassword(Request $request)
    {

        $request->validate([
            'oldpassword' => 'required|min:6',
            'password' => 'min:6|confirmed',

        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Old password do not match');
        } else {
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect()->back()->with('success', 'Password Updated');
        }
    }


    public function transaction()
    {
        $pageTitle = "Transactions";

        $transactions = Transaction::where('user_id', auth()->id())->latest()->with('user')->paginate();

        return view($this->template . 'user.transaction', compact('pageTitle', 'transactions'));
    }

    public function withdraw()
    {
        $pageTitle = 'Withdraw Money';

        $withdraws = WithdrawGateway::where('status', 1)->latest()->get();

        return view($this->template . 'user.withdraw.index', compact('pageTitle', 'withdraws'));
    }

    public function withdrawCompleted(Request $request)
    {



        $general = GeneralSetting::first();

        $withdraw = Withdraw::where('user_id', auth()->id())->whereDate('created_at', now())->count();

        if ($general->withdraw_limit <= $withdraw) {
            return back()->with('error', 'Per day withdrawal limit exceed');
        }



        $request->validate([
            'method' => 'required|integer',
            'amount' => 'required|numeric',
            'final_amo' => 'required|numeric',
            'email' => 'required'
        ]);


        $payment = Deposit::where('user_id', auth()->id())->where('payment_status', 1)->count();

        if ($payment <= 0) {
            $notify[] = ['error', 'You have to deposit  on a plan to withdraw'];

            return back()->withNotify($notify);
        }




        $withdraw = WithdrawGateway::findOrFail($request->method);

        if (auth()->user()->balance < $request->amount) {
            $notify[] = ['error', 'Insuficient Balance'];

            return back()->withNotify($notify);
        }

        if ($request->amount < $withdraw->min_amount || $request->amount > $withdraw->max_amount) {
            $notify[] = ['error', 'Please follow the withdraw limits'];

            return back()->withNotify($notify);
        }

        if ($withdraw->charge_type == 'percent') {

            $tax = $withdraw->charge;
            $requestAmount = $request->amount;
            $taxAmount = $tax * ($requestAmount / 100);
            $total = $request->amount - $taxAmount;
        } else {
            $total = $request->amount - $withdraw->charge;
        }


        if ($total != $request->final_amo) {
            $notify[] = ['error', 'Invalid Amount'];

            return back()->withNotify($notify);
        }


        $reffaral_id = User::select('reffered_by', 'id')->where('id', auth()->user()->id)->first();



        if ($reffaral_id->reffered_by > 0) {

            $reffral_commision = SponserCommision::select('percent')->first();
            $sponser_amount = $reffral_commision->percent * ($taxAmount / 100);

            $admin_final_amount = $taxAmount - $sponser_amount;
            $sponser = User::where('id', $reffaral_id->reffered_by)->first();

            $sponser->balance += $sponser_amount;

            SponserAmount::create([
                'user_id' => $reffaral_id->reffered_by,
                'from_id' => $reffaral_id->id,
                'amounts' => $sponser_amount
            ]);
            $sponser->update();
        } else {
            $admin_final_amount = 0;
        }



        auth()->user()->balance = auth()->user()->balance - $request->amount;
        auth()->user()->save();


        $data = [
            'email' => $request->email,
            'account_information' => Purifier::clean($request->account_information),
            'note' => Purifier::clean($request->note)
        ];


        $mailData = Withdraw::create([
            'user_id' => auth()->id(),
            'withdraw_method_id' => $request->method,
            'transaction_id' => strtoupper(Random::generate(15)),
            'user_withdraw_prof' => $data,
            'withdraw_charge' => $withdraw->charge,
            'withdraw_amount' => $request->amount,
            'status' => 0
        ]);

        $admin = Admin::first();

        $notify[] = ['success', 'Withdraw Successfully done'];

        return back()->withNotify($notify);
    }

    public function withdrawFetch(Request $request)
    {
        $withdraw = WithdrawGateway::findOrFail($request->id);

        return $withdraw;
    }

    public function allWithdraw(Request $request)
    {
        $pageTitle = 'All withdraw';

        $withdrawlogs = Withdraw::when($request->trx, function ($item) use ($request) {
            $item->where('transaction_id', $request->trx);
        })->when($request->date, function ($item) use ($request) {
            $item->whereDate('created_at', $request->date);
        })->where('user_id', auth()->id())->latest()->with('withdrawMethod')->paginate(10);

        return view($this->template . 'user.withdraw.withdraw_log', compact('pageTitle', 'withdrawlogs'));
    }

    public function pendingWithdraw()
    {
        $pageTitle = 'Pending withdraw';

        $withdrawlogs = Withdraw::where('user_id', auth()->id())->where('status', 0)->latest()->with('withdrawMethod')->paginate(10);

        return view($this->template . 'user.withdraw.withdraw_log', compact('pageTitle', 'withdrawlogs'));
    }

    public function completeWithdraw()
    {
        $pageTitle = 'Complete withdraw';

        $withdrawlogs = Withdraw::where('user_id', auth()->id())->where('status', 1)->latest()->with('withdrawMethod')->paginate(10);

        return view($this->template . 'user.withdraw.withdraw_log', compact('pageTitle', 'withdrawlogs'));
    }

    public function team(Request $request)
    {
        $data['pageTitle'] = "Teams";

        $rootUser = Auth::id();
        $user = User::find($rootUser);
        $usersUnderRootUsers = [];
        $user->getAllUsersUnderRootUser($rootUser, $usersUnderRootUsers);
        $total_team_count = 0;
        $total_team_count_paid = 0;
        $directR_paid_user = 0;
        $search_count = 0;
        $inpuEmail = '';


        foreach ($usersUnderRootUsers as $key => $usersUnderRootUser) {
            $paid_user = Transaction::where('user_id', $usersUnderRootUser->id)->where('payment_status', 1)->orderBy('id', 'desc')->first();
            if (!empty($paid_user)) {
                $total_team_count_paid += 1;
            }
            $total_team_count += 1;

            if (!empty($request->type) && $request->type = 1) {
                $inpuEmail = $request->input('email');
                if ($usersUnderRootUser->email == $request->input('email')) {
                    $search_count += 1;
                }
            }
        }

        $direct_refarral_all = User::where('reffered_by', Auth::id())->get();
        $direct_refarral_nonpaid = $direct_refarral_all->count();

        foreach ($direct_refarral_all as $key => $direct_refarral) {
            $direcrRpaid_user = Transaction::where('user_id', $direct_refarral->id)->where('payment_status', 1)->orderBy('id', 'desc')->first();
            if ($direcrRpaid_user) {
                $directR_paid_user += 1;
            }
        }

        $data['inpuEmail'] = $inpuEmail;
        $data['search_count'] = $search_count;
        $data['total_team_count_paid'] = $total_team_count_paid;
        $data['total_team_count'] = $total_team_count;
        $data['direct_refarral_nonpaid'] = $direct_refarral_nonpaid;
        $data['directR_paid_user'] = $directR_paid_user;

        return view($this->template . 'user.team')->with($data);
    }


    public function commision(Request $request)
    {

        $pageTitle = 'Complete withdraw';

        $commison = RefferedCommission::when($request->date, function ($item) use ($request) {
            $item->whereDate('created_at', $request->date);
        })->where('reffered_by', Auth::id())->latest()->paginate(10, ['*'], 'commison');
        $sponsers = SponserAmount::where('user_id',Auth::id())->latest()->paginate(10);
        return view($this->template . 'user.commision_log', compact('pageTitle', 'commison','sponsers'));
    }





    // public function pendingInvest()
    // {
    //     $data['payments'] = Payment::where('user_id', Auth::id())->where('payment_status', 2)->latest()->get();
    //     $data['pageTitle'] = 'Pending Invest';

    //     return view($this->template . 'user.pending_invest')->with($data);
    // }

    public function allInvest()
    {
        $data['payments'] = Payment::where('user_id', Auth::id())->where('payment_status', '!=', 0)->latest()->get();
        $data['pageTitle'] = 'All Invest';

        return view($this->template . 'user.pending_invest')->with($data);
    }

    public function interestLog(Request $request)
    {

        $data['interestLogs'] = UserInterest::when($request->date, function ($item) use ($request) {
            $item->whereDate('created_at', $request->date);
        })->where('user_id', Auth::id())->latest()->get();


        $data['pageTitle'] = 'Return interest Log';

        return view($this->template . 'user.interest_log')->with($data);
    }


    public function transfer()
    {
        $pageTitle = 'Transfer Money';

        return view($this->template . 'user.transfer_money', compact('pageTitle'));
    }

    public function transferMoney(Request $request)
    {
        $general = GeneralSetting::first();

        $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|gt:0'
        ]);


        $range = range($general->min_amount, $general->max_amount);

        if (!in_array($request->amount, $range)) {
            $notify[] = ['error', 'Please follow transfer Limit'];

            return back()->withNotify($notify);
        }



        $transferCount = Transaction::where('user_id', auth()->id())->where('type', 'send')->whereDate('created_at', now())->count();


        if ($transferCount >= $general->trans_limit) {
            $notify[] = ['error', 'Transfer Limit exceeded for today'];

            return back()->withNotify($notify);
        }





        $deposits = Deposit::where('user_id', auth()->id())->where('payment_status', 1)->count();

        if ($deposits <= 0) {
            $notify[] = ['error', 'You have to deposit in website to complete this transfer'];

            return back()->withNotify($notify);
        }



        $receiver = User::where('email', $request->email)->first();

        if (auth()->user()->email == $request->email) {
            $notify[] = ['error', 'You can not send money to your account'];

            return back()->withNotify($notify);
        }

        if (!$receiver) {
            $notify[] = ['error', 'No User Found With this email'];

            return back()->withNotify($notify);
        }


        $commison = $general->trans_type === 'percent' ? ($request->amount * $general->trans_charge) / 100 :  $general->trans_charge;

        $totalSendAmount = $request->amount - $commison;


        if (auth()->user()->balance < $request->amount) {

            $notify[] = ['error', 'Insufficient Balance'];

            return back()->withNotify($notify);
        }




        $user = auth()->user();

        $user->balance = $user->balance - $request->amount;

        $user->save();

        $general = GeneralSetting::first();

        $trx = strtoupper(Str::random());


        MoneyTransfer::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id,
            'transaction_id' => $trx,
            'details' => 'Money Transfer',
            'amount' => $request->amount,
            'charge' => $commison
        ]);


        Transaction::create([
            'trx' => $trx,
            'gateway_id' => 0,
            'amount' => $request->amount,
            'currency' => @$general->site_currency,
            'details' => 'Send Money',
            'charge' => $commison,
            'type' => 'send',
            'gateway_transaction' => $trx,
            'user_id' => auth()->id(),
            'payment_status' => 1
        ]);




        $receiver->balance = $receiver->balance + $totalSendAmount;

        $receiver->save();

        $trx = strtoupper(Str::random());

        Transaction::create([
            'trx' => $trx,
            'gateway_id' => 0,
            'amount' => $request->amount,
            'currency' => @$general->site_currency,
            'details' => 'Receive Money',
            'charge' => 0,
            'type' => 'receive',
            'gateway_transaction' => $trx,
            'user_id' => $receiver->id,
            'payment_status' => 1
        ]);



        $notify[] = ['success', 'Successfully Send Money'];

        return back()->withNotify($notify);
    }

    public function transactionLog(Request $request)
    {
        $pageTitle = 'Transaction Log';

        $transactions = Transaction::when($request->trx, function ($item) use ($request) {
            $item->where('trx', $request->trx);
        })->when($request->date, function ($item) use ($request) {
            $item->whereDate('created_at', $request->date);
        })->where('user_id', auth()->id())->where('payment_status', 1)->latest()->paginate();


        return view($this->template . 'user.transaction', compact('pageTitle', 'transactions'));
    }


    public function kyc()
    {
        if (auth()->user()->kyc == 1) {
            return redirect()->route('user.dashboard')->with('error', 'You already verify KYC');
        }
        $pageTitle = 'Kyc Verification';
        return view($this->template . 'user.kyc', compact('pageTitle'));
    }


    public function kycUpdate(Request $request)
    {
        $general = GeneralSetting::first();

        $user = auth()->user();

        if ($user->kyc == 2) {
            return redirect()->back()->with('error', 'You have already submitted KYC form');
        }


        $validation = [];
        if ($general->kyc != null) {
            foreach ($general->kyc as $params) {
                if ($params['type'] == 'text' || $params['type'] == 'textarea') {

                    $key = strtolower(str_replace(' ', '_', $params['field_name']));

                    $validationRules = $params['validation'] == 'required' ? 'required' : 'sometimes';

                    $validation[$key] = $validationRules;
                } else {

                    $key = strtolower(str_replace(' ', '_', $params['field_name']));

                    $validationRules = ($params['validation'] == 'required' ? 'required' : 'sometimes') . "|image|mimes:jpg,png,jpeg|max:2048";

                    $validation[$key] = $validationRules;
                }
            }
        }

        $data = $request->validate($validation);

        foreach ($data as $key => $upload) {

            if ($request->hasFile($key)) {

                $filename = uploadImage($upload, filePath('user'));

                $data[$key] = ['file' => $filename, 'type' => 'file'];
            }
        }




        $user->kyc_infos = $data;

        $user->kyc = 2;

        $user->save();

        return back()->with('success', 'Successfully send Kyc Information to Admin');
    }

    public function checkLevel()
    {
        $general = GeneralSetting::first();

        $payments = Payment::where('payment_status', 1)->groupBy('user_id')->selectRaw('SUM(amount) as amount, user_id')->get();


        foreach ($payments as $pay) {


            $ranking = Ranking::where('minimum_invest', '<=', $pay->amount)
                ->where('maximum_invest', '>=', $pay->amount)->where('status', 1)->first();




            if ($ranking) {


                $user = $pay->user;

                $hasRanking = $user->badges()->where('ranking_id', $ranking->id)->first();


                if (!$hasRanking) {

                    DB::table('user_rankings')->where('user_id', $user->id)->update(['is_current' => 0]);

                    UserRanking::create([
                        'user_id' => $pay->user_id,
                        'ranking_id' => $ranking->id
                    ]);

                    $user->balance = $user->balance + $ranking->bonus;

                    $user->save();

                    if ($ranking->bonus > 0) {
                        $trx = strtoupper(Str::random());
                        Transaction::create([
                            'trx' => $trx,
                            'gateway_id' => 0,
                            'amount' => $ranking->bonus,
                            'currency' => $general->site_currency,
                            'details' => 'Badge Unlock Bonus',
                            'charge' => 0,
                            'type' => '+',
                            'gateway_transaction' => '',
                            'user_id' => $pay->user_id,
                            'payment_status' => 1,
                        ]);
                    }
                }
            }
        }
    }

    public function returnInterest()
    {
        $general = GeneralSetting::first();
        $invests = Payment::with('plan', 'user')->where('payment_status', 1)->latest()->get();


        foreach ($invests as $invest) {

            //check_user
            $user = $invest->user;

            if ($invest->next_payment_date) {
                //check current time == paymentdate

                if ($user) {


                    if (now()->greaterThanOrEqualTo($invest->next_payment_date)) {
                        //find interest rate


                        $interestRate = $invest->plan->return_interest;
                        $returnAmount = 0;

                        if ($invest->plan->interest_status == 'percentage') {
                            $returnAmount = ($invest->amount * $interestRate) / 100;
                        }
                        if ($invest->plan->interest_status == 'fixed') {
                            $returnAmount = $invest->plan->return_interest;
                        }

                        $user->balance += $returnAmount;
                        $updatePaymentDate = $invest->next_payment_date->addHour($invest->plan->time->time);
                        $interestAmount = $returnAmount;

                        //paymentupdate on next date
                        $updatePayment = Payment::where('plan_id', $invest->plan_id)->where('next_payment_date', $invest->next_payment_date)->first();

                        $count = Payment::where('plan_id', $invest->plan_id)->where('next_payment_date', $invest->next_payment_date)->sum('pay_count');

                        if ($invest->plan->return_for == 1) {

                            if ($count < $invest->plan->how_many_time) {
                                $updatePayment->next_payment_date = $updatePaymentDate;
                                $updatePayment->interest_amount += $interestAmount;
                                $updatePayment->pay_count += 1;

                                UserInterest::create([
                                    'user_id' => $user->id,
                                    'payment_id' => $invest->id,
                                    'interest_amount' => $interestAmount,
                                    'purpouse' => 'Invest Return Commission'
                                ]);

                                sendMail('RETURN_INTEREST', [
                                    'plan' => $invest->plan->plan_name,
                                    'amount' => $returnAmount,
                                    'currency' => @$general->site_currency
                                ], $invest->user);

                                $updatePayment->save();
                                $user->save();

                                refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount);



                                if ($updatePayment->pay_count == $invest->plan->how_many_time) {
                                    $updatePayment->next_payment_date = null;
                                    $updatePayment->save();

                                    return true;
                                }

                                if ($invest->plan->capital_back == 1) {
                                    if ($updatePayment->pay_count == $invest->plan->how_many_time) {
                                        $user->balance += $invest->amount;
                                        $updatePayment->next_payment_date = null;
                                        $updatePayment->pay_count = null;
                                        $updatePayment->save();
                                        $user->save();
                                        refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount);
                                    }
                                }
                            }

                            return true;
                        } else {

                            $updatePayment->next_payment_date = $updatePaymentDate;
                            $updatePayment->interest_amount += $interestAmount;
                            $updatePayment->pay_count += 1;

                            UserInterest::create([
                                'user_id' => $user->id,
                                'payment_id' => $invest->id,
                                'interest_amount' => $interestAmount,
                                'purpouse' => 'Invest Return Commission'
                            ]);

                            sendMail('RETURN_INTEREST', [
                                'plan' => $invest->plan->plan_name,
                                'amount' => $returnAmount,
                                'currency' => @$general->site_currency
                            ], $invest->user);

                            $updatePayment->save();
                            $user->save();
                            refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount);

                            return false;
                        }
                    }
                }
            }
        }
    }
}
