<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meaning = [
            'username' => "Email Receiver Name",
            'code' => "Email Verification Code",
            'sent_from' => "Email Sent from",
        ];
        $email = new EmailTemplate();
        $email->name = 'PASSWORD_RESET';
        $email->subject = 'Password Reset Code';
        $email->template = "<p><b>Hi {username},
                            </b></p>

                            <p>
                            Here is your password reset code : {code}</p>

                            <p>
                            Thanks,
                            </p>

                            <p>
                            {sent_from}</p>";
        $email->meaning = $meaning;
        $email->save();

        $meaning1 = [
            'username' => "Email Receiver Name",
            'trx' => "Transaction Number",
            'amount' => "Payment Amount",
            'plan' => "Plan Name",
            'currency' => "Currency for Payment",
            'sent_from' => "Email Sent from",
        ];
        $email1 = new EmailTemplate();
        $email1->name = 'PAYMENT_SUCCESSFULL';
        $email1->subject = 'PAYMENT SUCCESSFULL';
        $email1->template = "<p><b>Hi {username},</b></p><p><b>Your Payment for {plan} has been successfully paid.</b></p><p><b>Transaction Number : {trx}</b></p><p><b>Total Amount : {amount} {currency}</b></p><p><b><br></b></p><p><b>
</b></p><p>

</p><p>
Thanks,
</p><p>
{sent_from}</p>";
        $email1->meaning = $meaning1;
        $email1->save();

        $meaning2 = [
            "username" => "Email Receiver Name",
            "trx" => "Transaction Number",
            "amount" => "Payment Amount",           
            "currency" => "Currency for Payment",
            "sent_from" => "Email Sent from"
        ];
        $email2 = new EmailTemplate();
        $email2->name = 'PAYMENT_RECEIVED';
        $email2->subject = 'PAYMENT RECEIVED';
        $email2->template = "<p><b>Hi {username},</b></p><p><b>You Received Payment for {service} has been successfully paid.</b></p><p><b>Transaction Number : {trx}</b></p><p><b>Total Amount : {amount} {currency}</b></p><p><b><br></b></p><p><b>
</b></p><p>

</p><p>
Thanks,
</p><p>
{sent_from}</p>";
        $email2->meaning = $meaning2;
        $email2->save();

        $meaning3 = [
            "username" => "Email Receiver Name",
            "code" => "Email Verification Code",
            "sent_from" => "Email Sent from"
        ];
        $email3 = new EmailTemplate();
        $email3->name = 'VERIFY_EMAIL';
        $email3->subject = 'Verify Your Email';
        $email3->template = "<p><b>Hi {username},</b></p><p><b>Your verification code is {code}</b></p><p><b><br></b></p><p><b>
</b></p><p>

</p><p>
Thanks,
</p><p>
{sent_from}</p>";
        $email3->meaning = $meaning3;
        $email3->save();

        $meaning4 = [
            "username" => "Email Receiver Name",
            "amount" => "Payment Amount",
            "charge" => "Payment Charge",
            "plan" => "plan Name",
            "trx" => "Transaction ID",
            "currency" => "Payment Currency",
            "sent_from" => "Email Sent from"
        ];

        $email4 = new EmailTemplate();
        $email4->name = 'PAYMENT_CONFIRMED';
        $email4->subject = 'payment confirmed';
        $email4->template = "<p><b>Hi {username},</b></p><p><b>Your Payment for {plan} is accepted</b></p><p><b>Amount : {amount} {currency}</b></p><p><b>Charge : {charge} {currency}</b></p><p><b>Booking Id : {trx}</b></p><p><b>&nbsp;</b></p><p><b><br></b></p><p><b>
</b></p><p>

</p><p>
Thanks,
</p><p>
{sent_from}</p>";
        $email4->meaning = $meaning4;
        $email4->save();

        $meaning5 = [
            "username" => "Email Receiver Name",
            "amount" => "Payment Amount",
            "charge" => "Payment Charge",
            "plan" => "plan Name",
            "trx" => "Transaction ID",
            "currency" => "Payment Currency",
            "sent_from" => "Email Sent from"
        ];
        $email5 = new EmailTemplate();
        $email5->name = 'PAYMENT_REJECTED';
        $email5->subject = 'payment rejected';
        $email5->template = "<p><b>Hi {username},</b></p><p><b>Your payement is rejected&nbsp;</b></p><p><b>Pay for {plan}</b></p><p><b>charge : {charge}</b></p><p><b>amount : {amount}</b></p><p><b>Booking Id : {trx}</b></p><p><b>&nbsp;</b></p><p><b><br></b></p><p><b>
</b></p><p>

</p><p>
Thanks,
</p><p>
{sent_from}</p>";
        $email5->meaning = $meaning5;
        $email5->save();
    }
}
