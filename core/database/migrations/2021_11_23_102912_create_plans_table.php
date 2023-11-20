<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name')->unique();
            $table->TinyInteger('amount_type')->nullable();
            $table->decimal('minimum_amount')->nullable();
            $table->decimal('maximum_amount')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('return_interest')->nullable();
            $table->string('interest_status')->nullable();
            $table->TinyInteger('return_for')->nullable();
            $table->Integer('how_many_time')->nullable();
            $table->TinyInteger('capital_back')->nullable();
            $table->string('every_time')->nullable();
            $table->boolean('status')->default(1);
            $table->TinyInteger('featured')->nullable();
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
        Schema::dropIfExists('plans');
    }
}
