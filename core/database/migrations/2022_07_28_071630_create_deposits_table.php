<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('gateway_id');
            $table->string('transaction_id');
            $table->decimal('amount',28,8);
            $table->decimal('rate',28,8);
            $table->decimal('charge',28,8);
            $table->decimal('final_amount',28,8);
            $table->integer('payment_status');
            $table->boolean('payment_type');
            $table->string('wallet_type');
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
        Schema::dropIfExists('deposits');
    }
}
