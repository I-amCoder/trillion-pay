<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->id();
            $table->string('gateway_name')->nullable();
            $table->string('gateway_image')->nullable();
            $table->text('gateway_parameters')->nullable();
            $table->tinyInteger('gateway_type')->comment('0=manual,1=automatic')->nullable();
            $table->text('user_proof_param')->nullable();
            $table->decimal('btc_wallet', $precision = 28, $scale = 8)->default(0);
            $table->decimal('btc_amount', $precision = 28, $scale = 8)->default(0);
            $table->decimal('rate', $precision = 28, $scale = 8)->default(0);
            $table->decimal('charge', $precision = 28, $scale = 8)->default(0);
            $table->tinyInteger('status')->default(1)->comment('0=active,1=deactivate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gateways');
    }
}
