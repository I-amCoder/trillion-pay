<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessValuePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_value_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('wallet_id');
            $table->date('next_payment_date');
            $table->decimal('amount')->nullable();
            $table->decimal('return_interest');
            $table->TinyInteger('return_for');
            $table->decimal('interest_amount');
            $table->Integer('how_many_time')->nullable();
            $table->string('every_time')->nullable();
            $table->integer('pay_count')->nullable();
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
        Schema::dropIfExists('business_value_payments');
    }
}
