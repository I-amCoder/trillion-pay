<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trx')->unique();
            $table->string('gateway_transaction')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('gateway_id');
            $table->decimal('amount');
            $table->string('currency');
            $table->decimal('charge');
            $table->string('details');
            $table->string('type');
            $table->tinyInteger('payment_status')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}
