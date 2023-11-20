<?php

namespace App\Http\Controllers\Gateway\perfectmoney;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Models\Deposit;
use App\Models\Payment;

class ProcessController extends Controller
{
    public function returnSuccess()
    {
        if(session('type') === 'deposit'){
            $depost = Deposit::where('transaction_id', $_POST['PAYMENT_ID'])->first();
        }else{
            $depost = Payment::where('transaction_id', $_POST['PAYMENT_ID'])->first();
        }

        $gateway = $depost->gateway->gateway_parameters;
    
        $passphrase = strtoupper(md5($gateway->passphrase));

        define('ALTERNATE_PHRASE_HASH', $passphrase);
        define('PATH_TO_LOG', '/somewhere/out/of/document_root/');
        $string =
            $_POST['PAYMENT_ID'] . ':' . $_POST['PAYEE_ACCOUNT'] . ':' .
            $_POST['PAYMENT_AMOUNT'] . ':' . $_POST['PAYMENT_UNITS'] . ':' .
            $_POST['PAYMENT_BATCH_NUM'] . ':' .
            $_POST['PAYER_ACCOUNT'] . ':' . ALTERNATE_PHRASE_HASH . ':' .
            $_POST['TIMESTAMPGMT'];

        $hash = strtoupper(md5($string));
        $hash2 = $_POST['V2_HASH'];

        if ($hash == $hash2) {
            $amount = $_POST['PAYMENT_AMOUNT'];
            $unit = $_POST['PAYMENT_UNITS'];
            $transaction = $_POST['PAYMENT_ID'];
            if ($_POST['PAYEE_ACCOUNT'] == $gateway->accountid && $unit == $gateway->gateway_currency && $amount == $depost->final_amount) {
                PaymentController::updateUserData($depost, 0, $transaction);
            }
        }
    }
}
