<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('gateway_id');
            $table->string('transaction_id')->unique();
            $table->string('payment_gateway_trx')->nullable();
            $table->decimal('amount',28,8);
            $table->decimal('rate',28,8)->default(0);
            $table->decimal('charge',28,8)->default(0);
            $table->decimal('final_amount',28,8);
            $table->string('btc_wallet')->nullable();
            $table->decimal('btc_amount',28,8)->nullable();
            $table->string('btc_trx')->nullable();
            $table->integer('payment_status');
            $table->integer('payment_type')->default(1);
            $table->text('payment_proof')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
