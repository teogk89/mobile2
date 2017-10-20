<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('settings', function (Blueprint $table) {

            $table->increments('id');
            $table->text('shop_address')->nullable();
            $table->text('receipt_adds');
            $table->string('logo')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('phone_nr');
            $table->text('agreement');
            $table->string('facebook');
            $table->text('facebook_message');
            $table->string('twitter');
            $table->text('twitter_message');
            $table->string('googleplus');
            $table->text('googleplus_message');
            $table->text('allsocials_message');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('settings');
    }
}
