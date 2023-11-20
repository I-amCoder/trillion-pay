<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefferedCommissionsTable extends Migration
{
   
    public function up()
    {
        Schema::create('reffered_commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('reffered_by');
            $table->unsignedInteger('reffered_to');
            $table->decimal('amount',28,8);
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
        Schema::dropIfExists('reffered_commissions');
    }
}
