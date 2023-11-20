<?php

namespace Database\Seeders;

use App\Models\Gateway;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gatewayParameters = [
            'gateway_currency' => 'USD',
            'paypal_client_id' => 'AQtCVGlS22wqYBGWPHW1a6aAVuUcFwSOWzUGoRvsbth2vUNNxrekowLwrYRwIYLMAetedRPu3hKMO57C',
            'paypal_client_secret' => 'EMksMmpKq5xfnJP3So7fVTyjghVV4mtUa70qsXbNAiw3nBF3ir6ENXZasxT-3cPDZ8ZXJX0DaggQFptv',
            'mode' => 'sandbox',
        ];

        $gateway = new Gateway();
        $gateway->gateway_name = "paypal";
        $gateway->gateway_image = "";
        $gateway->gateway_parameters = $gatewayParameters;
        $gateway->gateway_type = "1";
        $gateway->user_proof_param = "";
        $gateway->rate = "1.00000000";
        $gateway->charge = "0.00000000";
        $gateway->status = "0";
        $gateway->save();

        $gatewayParameters1 = [
            'gateway_currency' => 'USD',
            'stripe_client_id' => 'pk_test_51JPpg8Ep0youpBChKWG5eyrUnj7weSPl3FlIaU8unUrqOfoA0aAFGJq6biVmcZBjKdD7Jf7HXmH6DKaxjtJsWn9200QGc9BTns',
            'paypal_client_secret' => 'sk_test_51JPpg8Ep0youpBChPXaj1T1fXk5zhCTg8A8hCCF5sfrFm7C0n7pIYfGoMptc1xqoFb5Mnro56LB3jn21JsTvnGtP00ZTxKIaJ8',
        ];


        $gateway1 = new Gateway();
        $gateway1->gateway_name = "stripe";
        $gateway1->gateway_parameters = $gatewayParameters1;
        $gateway1->gateway_type = "1";
        $gateway1->user_proof_param = "";
        $gateway1->rate = "1.00000000";
        $gateway1->charge = "5.00000000";
        $gateway1->status = "1";
        $gateway1->save();

        $gatewayParameters2 = [
            'name' => 'AJ International Bank Ltd.',
            'account_number' => '124568',
            'routing_number' => '1234568',
            'branch_name' => 'NV Road, NYC',
            'gateway_currency' => 'USD',
        ];

        $user_proof_param_index = [
            'field_name' => 'NId',
            'type' => 'file',
            'validation' => 'required',
        ];

        $user_proof_param_index = [
            "4" => $user_proof_param_index,
        ];

        $gateway2 = new Gateway();
        $gateway2->gateway_name = "bank";
        $gateway2->gateway_parameters = $gatewayParameters2;
        $gateway2->gateway_type = "1";
        $gateway2->user_proof_param = $user_proof_param_index;
        $gateway2->rate = "1.00000000";
        $gateway2->charge = "2.00000000";
        $gateway2->status = "1";
        $gateway2->save();

        $gatewayParameters3 = [
            'gateway_currency'=> 'USD',
            'public_key'=> 'b21aa27fd107f676e9f39d3e815b17964e36a87027587e3349c4922bc37095ef',
            'private_key'=> '00768014045E5b3a2ac2afA842c2c492534F4a6BD76051038e3B2BD53815fc08',
            'merchant_id'=> '35f09ca0721beeda7f1644ed4104178a',
        ];

        $gateway3 = new Gateway();
        $gateway3->gateway_name = "coin";
        $gateway3->gateway_parameters = $gatewayParameters3;
        $gateway3->gateway_type = "1";
        $gateway3->user_proof_param = "";
        $gateway3->rate = "1.00000000";
        $gateway3->charge = "0.00000000";
        $gateway3->status = "0";
        $gateway3->save();

    }
}
