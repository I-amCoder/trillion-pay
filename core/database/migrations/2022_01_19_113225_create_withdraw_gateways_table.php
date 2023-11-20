<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('min_amount',28,8);
            $table->decimal('max_amount',28,8);
            $table->string('charge_type');
            $table->decimal('charge',28,8);
            $table->boolean('status');
            $table->text('withdraw_instruction');
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
        Schema::dropIfExists('withdraw_gateways');
    }
}
