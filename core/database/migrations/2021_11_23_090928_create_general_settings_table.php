<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('sitename')->nullable();
            $table->string('site_currency',10)->nullable();
            $table->string('site_email')->nullable();
            $table->string('copyright')->nullable();
            $table->string('email_method')->default('php')->nullable();
            $table->text('email_config')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('login_image')->nullable();
            $table->boolean('user_reg')->default(1);
            $table->integer('is_email_verification_on')->nullable();
            $table->integer('is_sms_verification_on')->nullable();
            $table->string('preloader_image')->nullable();
            $table->boolean('preloader_status')->nullable();
            $table->boolean('analytics_status')->nullable();
            $table->string('analytics_key')->nullable();
            $table->tinyInteger('allow_modal')->nullable();
            $table->string('button_text')->nullable();
            $table->text('cookie_text')->nullable();
            $table->tinyInteger('allow_recaptcha')->nullable();
            $table->string('recaptcha_key')->nullable();
            $table->string('recaptcha_secret')->nullable();
            $table->tinyInteger('twak_allow')->nullable();
            $table->string('twak_key')->nullable();
            $table->text('seo_description')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
