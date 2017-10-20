<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tickets', function (Blueprint $table) {

            $table->increments('ticket_id');
            $table->string('repair_status')->nullable();
            $table->string('technician')->nullable();
            $table->string('user_ip_address')->nullable();
            $table->bigInteger('customer_id');
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('warranty')->nullable();
            $table->string('warranty_date_order')->nullable();
            $table->string('warranty_until')->nullable();
            $table->string('repair_cost')->nullable();
            $table->string('only_research')->nullable();
            $table->string('inform_price')->nullable();
            $table->string('ordered_from')->nullable();
            $table->string('ordered_from_other')->nullable();
            $table->string('casco');
            $table->string('casco_options')->nullable();
            $table->string('casco_other')->nullable();
            $table->date('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();
            $table->string('repair_date')->nullable();
            $table->string('phone_model')->nullable();
            $table->string('phone_type')->nullable();
            $table->string('imei_number')->nullable();
            $table->text('reason')->nullable();
            $table->text('extra_parts')->nullable();
            $table->string('extra_parts_other')->nullable();
            $table->dateTime('ticket_date')->nullable();
            $table->integer('submit_code')->nullable();
            $table->string('user_code');
            $table->text('icloud_code');
            $table->string('street_nr');



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
        Schema::dropIfExists('tickets');
    }
}
