<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tickets_details', function (Blueprint $table) {

            $table->increments('ticket_detail_id');
            $table->integer('ticket_id')->unsigned();
            $table->text('ticket_status')->nullable();
            $table->string('ticket_file')->nullable();
            $table->dateTime('date_added');    
            $table->foreign('ticket_id')
                  ->references('ticket_id')->on('tickets')
                  ->onDelete('cascade');


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
         Schema::dropIfExists('tickets_details');
    }
}
