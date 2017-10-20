<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sales', function (Blueprint $table) {

            $table->increments('id');
            $table->string('sl_no');
            $table->date('sl_date');
            $table->string('pr_code');
            $table->string('pr_name');
            $table->integer('sl_quantity');
            $table->string('customer')->nullable();
            $table->string('sl_reference')->nullable();
        
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
        Schema::dropIfExists('sales');
    }
}
