<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('ticket_users')->insert([
            'ip' => '127.0.0.1',
            'user' => 'admin',
            'password' => bcrypt('k1h2anh'),
            'email' => 'duykhanhonline@gmail.com',
            'role' => 'admin',
            'recover' =>'',
            'clicked' => ''
        ]);



        DB::table('settings2')->insert([

        	'name' => 'repairpolicy',
        	'myvalue' => "1. dat mijn product gerepareerd wordt zonder prijsopgave tot een maximaal bedrag van 17,50Euro- ( incl. BTW), exclusief transportkosten of kosten voor een additionele reparatie service;(als niet anders vermeld op reparatie bon)<br/> 2. dat bij een hoger reparatie bedrag ik eerst een prijsopgave ontvang waarop ik binnen de (op de prijsopgave)
aangegeven termijn zal reageren; en/of na dat mijn product reparatie klaar is binnen 8 weken ophalen<br/>
3. dat indien mijn product niet gerepareerd kan worden vanwege vochtschade,
BER constatering of geen klacht constatering, ik mijn product retour ontvang tegen betaling van
minimaal 17,50Euro - (incl. BTW) voor onderzoekskosten, exclusief transport- en/of handelingskosten voor
buiten garantie reparaties. <br/>"
        ]);
        

    }
}
