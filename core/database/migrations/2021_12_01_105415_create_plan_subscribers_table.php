<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_subscribers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('gateway_id')->nullable();
            $table->decimal('price', $precision = 10, $scale = 0);
            $table->integer('duration');
            $table->integer('payment_status')->default(0)->nullable();
            $table->string('payment_trx')->unique();
            $table->string('payment_proof')->nullable();
            $table->tinyInteger('payment_type')->default(1)->nullable();
            $table->timestamp('expired_at');
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
        Schema::dropIfExists('plan_subscribers');
    }
}
