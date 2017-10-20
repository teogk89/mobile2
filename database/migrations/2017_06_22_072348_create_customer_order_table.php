<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('custom_orders', function (Blueprint $table) {

                $table->increments('id');
                $table->string('customer');
                $table->string('phone');
                $table->date('date_order');
                $table->date('deliver_date');
                $table->string('item_name');
                $table->string('item_price');
                $table->string('customer_sms');
                $table->string('order_status');



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
        Schema::dropIfExists('custom_orders');
    }
}
