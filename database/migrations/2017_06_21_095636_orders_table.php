<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orders', function (Blueprint $table) {

            $table->increments('id');
            $table->string('or_no');
            $table->date('or_date');
            $table->string('pr_code');
            $table->string('pr_name');
            $table->integer('or_quantity');
            
            $table->string('supplier')->nullable();
            $table->string('or_reference')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
