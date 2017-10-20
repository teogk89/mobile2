<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ticket_users', function (Blueprint $table) {


            $table->increments('ID');
            $table->string('ip');
            $table->string('user');
            $table->string('password');
            $table->string('email');
            $table->string('role');
            $table->string('recover');
            $table->text('clicked');
            $table->rememberToken();
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
        //
        Schema::dropIfExists('ticket_users');
    }
}
