<?php

namespace App\Http\Controllers;

use App\Models\BusinessPackPayment;
use App\Models\BusinessPackWallet;
use App\Models\BusinessValuePayment;
use App\Models\BusinessValueWallet;
use App\Models\CurrentWallet;
use App\Models\CurrentWalletPayment;
use App\Models\GeneralSetting;
use App\Models\Payment;
use App\Models\RefferedCommission;
use App\Models\SavingWallet;
use App\Models\SavingWalletPayment;
use App\Models\SharingWallet;
use App\Models\SharingWalletPayment;
use App\Models\UserInterest;
use App\Models\WalletProfits;
use App\Models\WalletTransfer;
use Carbon\Carbon;

class InterestController extends Controller
{
    public $profits;

    public function __construct()
    {
        $this->profits = WalletProfits::first();
    }


    public function index()
    {
        $this->currentWalletInterest();
        $this->savingWalletInterest();
        $this->sharingWalletInterest();
        $this->businessPackInterest();
        $this->businessValueInterest();
        $this->walletWithdrawReturn();
    }

    public function currentWalletInterest()
    {
        $general = GeneralSetting::first();
        $invests = CurrentWalletPayment::with('user', 'wallet')->latest()->get();

        foreach ($invests as $invest) {

            //check user and wallet
            $user = $invest->user;
            $wallet = $invest->wallet;

            if ($invest->next_payment_time && $wallet->status == 1) {
                //check current time == paymentdate
                if ($user) {
                    if (now()->greaterThanOrEqualTo($invest->next_payment_time)) {

                        //find interest rate
                        $returnAmount = 0;
                        $returnAmount = ($wallet->amount * $this->profits->current_wallet_profit) / 100;

                        $user->profit_balance += $returnAmount;

                        $nextInvest = CurrentWalletPayment::where('id', $invest->id)->first();

                        if ($nextInvest) {
                            // Update next profit time
                            $updatePaymentDate = $invest->next_payment_time->addHour(24);

                            $nextInvest->next_payment_time = $updatePaymentDate;
                            $nextInvest->interest_amount += $returnAmount;


                            $user->save();
                            $nextInvest->save();

                            $type = (new CurrentWallet())->getTable();

                            UserInterest::create([
                                'user_id' => $user->id,
                                'payment_id' => $invest->id,
                                'type' => $type,
                                'interest_amount' => $returnAmount,
                                'purpouse' => 'Invest Return Commission'
                            ]);
                            refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount, $type);
                        }

                        // return true;
                    }
                }
            }
            // return false;;
        }
    }

    public function savingWalletInterest()
    {
        $invests = SavingWalletPayment::with('user', 'wallet')->latest()->get();

        foreach ($invests as $invest) {

            //check user and wallet
            $user = $invest->user;
            $wallet = $invest->wallet;

            if ($invest->next_payment_time && $wallet->status == 1) {
                //check current time == paymentdate
                if ($user) {
                    if (now()->greaterThanOrEqualTo($invest->next_payment_time)) {

                        //find interest rate
                        $returnAmount = 0;
                        $returnAmount = ($wallet->amount * $this->profits->saving_wallet_profit) / 100;

                        $user->profit_balance += $returnAmount;

                        $nextInvest = SavingWalletPayment::where('id', $invest->id)->first();

                        if ($nextInvest) {
                            // Update next profit time
                            $updatePaymentDate = $invest->next_payment_time->addHour(24);

                            $nextInvest->next_payment_time = $updatePaymentDate;
                            $nextInvest->interest_amount += $returnAmount;
                            $nextInvest->save();
                            $user->save();
                            $type = (new SavingWallet())->getTable();

                            UserInterest::create([
                                'user_id' => $user->id,
                                'payment_id' => $invest->id,
                                'type' => $type,
                                'interest_amount' => $returnAmount,
                                'purpouse' => 'Invest Return Commission'
                            ]);

                            refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount, $type);
                        }

                        // return true;
                    }
                }
            }
        }
    }

    public function sharingWalletInterest()
    {
        $invests = SharingWalletPayment::with('user', 'wallet')->latest()->get();

        foreach ($invests as $invest) {

            //check user and wallet
            $user = $invest->user;
            $wallet = $invest->wallet;

            if ($invest->next_payment_time && $wallet->status == 1) {
                if ($user && $wallet) {
                    if (now()->greaterThanOrEqualTo($invest->next_payment_time)) {

                        //find interest rate
                        $returnAmount = 0;
                        $percentage =  $this->profits->sharing_default_profit;

                        if ($this->profits->last_sharing_update < 24) {
                            $percentage = $this->profits->sharing_wallet_profit;
                        }


                        // Check if trade has loss percentage
                        if ($percentage < 0) {

                            // Deduct the loss from profit balance or from the wallet
                            $loss = ($wallet->amount * abs($percentage)) / 100;
                            if ($user->profit_balance > $loss) {
                                $user->profit_balance -= $loss;
                            } else {
                                $wallet->amout -= $loss;
                            }
                        } else {

                            $profit = ($wallet->amount * $percentage) / 100;
                            $user->profit_balance = $profit + $user->profit_balance;
                        }
                        $user->save();


                        $nextInvest = SharingWalletPayment::where('id', $invest->id)->first();
                        if ($nextInvest) {
                            // Update next profit time
                            $updatePaymentDate = $invest->next_payment_time->addHour(24);

                            $nextInvest->next_payment_time = $updatePaymentDate;
                            $nextInvest->interest_amount += $returnAmount;
                            $nextInvest->save();
                            $user->save();
                            $wallet->save();
                            $type = (new SharingWallet())->getTable();

                            UserInterest::create([
                                'user_id' => $user->id,
                                'payment_id' => $invest->id,
                                'type' => $type,
                                'interest_amount' => $returnAmount,
                                'purpouse' => 'Invest Return Commission'
                            ]);

                            refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount, $type);
                        }

                        // return true;
                    }
                }
            }
        }
    }

    public function businessPackInterest()
    {
        $general = GeneralSetting::first();
        $invests = BusinessPackPayment::with('wallet', 'user')->latest()->get();


        foreach ($invests as $invest) {

            //check_user
            $user = $invest->user;
            $wallet = $invest->wallet;
            if ($invest->next_payment_time) {
                //check current time == paymentdate
                $plan = $invest->plan;
                if ($user && $wallet && $plan) {


                    if (now()->greaterThanOrEqualTo($invest->next_payment_time)) {

                        //find interest rate

                        $interestRate = $plan->return_interest;
                        $returnAmount = 0;
                        if ($plan->interest_status == 'percentage') {
                            $returnAmount = ($invest->amount * $interestRate) / 100;
                        }
                        if ($plan->interest_status == 'fixed') {
                            $returnAmount = $plan->return_interest;
                        }

                        $user->profit_balance += $returnAmount;
                        $updatePaymentDate = $invest->next_payment_time->addHour($plan->time->time);
                        $interestAmount = $returnAmount;


                        //paymentupdate on next date
                        $updatePayment = BusinessPackPayment::where('id', $invest->id)->first();
                        $updatePayment->interest_amount += $interestAmount;

                        $count = BusinessPackPayment::where('id', $invest->id)->sum('pay_count');

                        if ($plan->return_for == 1) {

                            if ($count < $plan->how_many_time) {
                                $updatePayment->next_payment_time = $updatePaymentDate;
                                $updatePayment->pay_count += 1;

                                $type = (new BusinessPackWallet)->getTable();

                                UserInterest::create([
                                    'user_id' => $user->id,
                                    'payment_id' => $invest->id,
                                    'type' => $type,
                                    'interest_amount' => $interestAmount,
                                    'purpouse' => 'Invest Return Commission'
                                ]);

                                sendMail('RETURN_INTEREST', [
                                    'plan' => $plan->plan_name,
                                    'amount' => $returnAmount,
                                    'currency' => @$general->site_currency
                                ], $invest->user);

                                $updatePayment->save();
                                $user->save();

                                refferMoney($user->id, $user->refferedBy, 'plan_interest', $returnAmount, $type);



                                if ($updatePayment->pay_count == $plan->how_many_time) {
                                    $updatePayment->next_payment_time = null;
                                    $updatePayment->save();

                                    // return true;
                                }

                                // if ($invest->plan->capital_back == 1) {
                                //     if ($updatePayment->pay_count == $plan->how_many_time) {
                                //         $user->profit_balance += $invest->amount;
                                //         $updatePayment->next_payment_time = null;
                                //         $updatePayment->pay_count = null;
                                //         $updatePayment->save();
                                //         $user->save();
                                //         refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount);
                                //     }
                                // }
                            }

                            // return true;
                        } else {

                            $updatePayment->next_payment_time = $updatePaymentDate;
                            $updatePayment->interest_amount += $interestAmount;
                            $updatePayment->pay_count += 1;

                            $type = (new BusinessPackWallet)->getTable();

                            UserInterest::create([
                                'user_id' => $user->id,
                                'payment_id' => $invest->id,
                                'type' => $type,
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
                            refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount, $type);

                            // return false;;
                        }
                    }
                }
            }
        }
    }



    public function businessValueInterest()
    {
        $general = GeneralSetting::first();
        $invests = BusinessValuePayment::with('wallet', 'user')->latest()->get();


        foreach ($invests as $invest) {
            //check_user
            $user = $invest->user;
            $wallet = $invest->wallet;
            if ($invest->next_payment_time) {

                //check current time == paymentdate

                if ($user && $wallet) {


                    if (now()->greaterThanOrEqualTo($invest->next_payment_time)) {



                        //find interest rate
                        $plan = $invest->plan;

                        $interestRate = $invest->return_interest;
                        $returnAmount = 0;
                        $sponser_profit = 0;
                        $self_profit = 0;

                        if ($plan->interest_status == 'percentage') {
                            $self_profit =  ($invest->amount * $invest->self_profit) / 100;
                            $sponser_profit = ($invest->amount * $invest->sponser_profit) / 100;
                            $returnAmount = $self_profit;
                        }

                        if ($plan->interest_status == 'fixed') {
                            $returnAmount = $invest->return_interest;
                        }




                        // Give Profits To Sponser and Self
                        $user->profit_balance += $self_profit;
                        $refer = $user->refferedBy;

                        if ($refer) {

                            $refer->profit_balance += $sponser_profit;
                            $refer->save();
                            RefferedCommission::create([
                                'reffered_by' => $refer->id,
                                'reffered_to' => $user->id,
                                'commission_from' => $user->id,
                                'amount' => $sponser_profit,
                                'purpouse' =>  'Sponser Profit '

                            ]);

                            sendMail('Commission', [
                                'refer_user' => $refer->username,
                                'amount' => $sponser_profit,
                                'currency' => $general->site_currency,
                            ], $refer);
                        }



                        $updatePaymentDate = $invest->next_payment_time->addHour($plan->time->time);
                        $interestAmount = $self_profit;



                        //paymentupdate on next date
                        $updatePayment = BusinessValuePayment::where('id', $invest->id)->first();

                        $updatePayment->interest_amount += $interestAmount;

                        $count = BusinessValuePayment::where('id', $invest->id)->sum('pay_count');

                        if ($plan->return_for == 1) {

                            if ($count < $invest->how_many_time) {
                                $updatePayment->next_payment_time = $updatePaymentDate;
                                $updatePayment->pay_count += 1;

                                $type = (new BusinessValueWallet)->getTable();

                                UserInterest::create([
                                    'user_id' => $user->id,
                                    'payment_id' => $invest->id,
                                    'type' => $type,
                                    'interest_amount' => $interestAmount,
                                    'purpouse' => 'Invest Return Commission'
                                ]);

                                sendMail('RETURN_INTEREST', [
                                    'plan' => $plan->plan_name,
                                    'amount' => $returnAmount,
                                    'currency' => @$general->site_currency
                                ], $invest->user);


                                $updatePayment->save();
                                $user->save();


                                refferMoney($user->id, $user->refferedBy, 'plan_interest', $returnAmount, $type);



                                if ($updatePayment->pay_count >= $invest->how_many_time) {
                                    $updatePayment->next_payment_time = null;
                                    $updatePayment->save();

                                    // // return true;
                                }

                                // if ($invest->plan->capital_back == 1) {
                                //     if ($updatePayment->pay_count >= $invest->how_many_time) {
                                //         $user->profit_balance += $invest->amount;
                                //         $updatePayment->next_payment_time = null;
                                //         $updatePayment->pay_count = null;
                                //         $updatePayment->save();
                                //         $user->save();
                                //         refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount);
                                //     }
                                // }
                            }

                            // // return true;
                        } else {

                            $updatePayment->next_payment_time = $updatePaymentDate;
                            $updatePayment->interest_amount += $interestAmount;
                            $updatePayment->pay_count += 1;

                            $type = (new BusinessValueWallet())->getTable();

                            UserInterest::create([
                                'user_id' => $user->id,
                                'payment_id' => $invest->id,
                                'type' => $type,
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
                            refferMoney($user->id, $user->refferedBy, 'interest', $returnAmount, $type);

                            // return false;;
                        }
                    }
                }
            }
        }
    }

    public function walletWithdrawReturn()
    {
        $transfers = WalletTransfer::where('status', 0)->latest()->get();
        foreach ($transfers as $transfer) {
            if (now()->greaterThanOrEqualTo($transfer->time)) {
                $user  = $transfer->user;
                $user->balance += $transfer->amount;
                $transfer->status = 1;
                $transfer->save();
                $user->save();
            }
        }
    }
}
