<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhonerepairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phonerepair', function (Blueprint $table) {

            $table->increments('id');
            $table->text('repair_question');
            $table->string('question_price');
            $table->string('model');
            $table->string('brand');
            $table->string('com');
            $table->string('other_id');
            $table->string('question_image');

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
        Schema::dropIfExists('phonerepair');
    }
}
