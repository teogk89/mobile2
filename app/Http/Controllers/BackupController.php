<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class BackupController extends Controller
{
    //

    protected $theme;

    public function backup (Request $request,$table){

    	$data= \DB::connection('mysql2')->table($table)->get();

    	foreach($data as $k){

    		$data =  json_decode(json_encode($k), True);
    		
    		//$date1 = \DateTime::createFromFormat('d/m/Y',$data['date_order']);
            //$date2 = \DateTime::createFromFormat('d/m/Y',$data['deliver_date']);
            //dd($date2);
          //  var_dump($date2);
            //$data['date_order'] = $date1->format('Y-m-d');
            //$data['deliver_date'] = ($date2 != false ? $date2->format('Y-m-d'):null);

    		var_dump($data).'<br/>';
    		\DB::connection('mysql')->table($table)->insert($data);
    	}


    }

    public function backup2(){

        $data= \DB::connection('mysql2')->table($table)->get();

        foreach($data as $k){

            $data =  json_decode(json_encode($k), True);
            
            $pick = \DateTime::createFromFormat('d/m/Y',$data['date_order']);
            //deliver_date
           // $tick = new Carbon($data['ticket_date']);
            $data['pickup_date'] = ($data['pickup_date'] == '0000-00-00' ? null:$pick->format('Y-m-d'));
            $data['ticket_date'] =  $tick->toDateTimeString(); 
            var_dump($data).'<br/>';
            \DB::connection('mysql')->table($table)->insert($data);
        }

    }
}
