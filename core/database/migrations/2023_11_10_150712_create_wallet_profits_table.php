<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_profits', function (Blueprint $table) {
            $table->id();
            $table->decimal('current_wallet_profit')->default(0);
            $table->decimal('saving_wallet_profit')->default(0);
            $table->decimal('sharing_wallet_profit')->default(0);
            $table->decimal('sharing_default_profit')->default(0);
            $table->date('sharing_profit_updated_at')->nullable();

            // Withdraw Transfer Taxes
            $table->decimal('current_wallet_tax')->default(0);
            $table->decimal('saving_wallet_tax')->default(0);
            $table->decimal('sharing_wallet_tax')->default(0);
            $table->decimal('business_pack_tax')->default(0);
            $table->decimal('business_value_tax')->default(0);


            // Withdrawal times
            $table->integer('current_wallet_time')->default(0);
            $table->integer('saving_wallet_time')->default(0);
            $table->integer('sharing_wallet_time')->default(0);
            $table->integer('business_pack_time')->default(0);
            $table->integer('business_value_time')->default(0);

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
        Schema::dropIfExists('wallet_profits');
    }
}
