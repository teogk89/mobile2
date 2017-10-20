<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('postcodes', function (Blueprint $table) {

            $table->increments('id');
            $table->string('provincie');
            $table->string('plaats');
            $table->string('postcode');
            $table->string('straatnaam');
            $table->string('laag')->nullable();
            $table->string('hoog')->nullable();
            $table->enum('even_oneven', ['ja', 'nee']);
            $table->string('breedte')->nullable();
            $table->string('lengte')->nullable();

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
        Schema::dropIfExists('postcodes');
    }
}
