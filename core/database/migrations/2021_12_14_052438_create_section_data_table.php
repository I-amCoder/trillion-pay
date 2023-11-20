<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_data', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->text('data')->nullable();
            $table->bigInteger('category')->unsigned()->nullable();
            $table->foreign('category')->references('id')
                ->on('blog_categories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('section_data');
    }
}
