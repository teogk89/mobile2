<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $theme;
    function __construct(){


    	$this->theme = \Helper::theme();
    	define("FULL_VERSION",true);//default false, set it true to change to version with Warranty, Where did you ordered, Do you have Casco?, Do you want we pickup?


    	$shop = \DB::table('settings')->first();
    	$this->data['shop'] = $shop;
    	$this->data['template'] = 'basic';
    	$countries=array('Belgie','Nederland');//countries

    	$this->data['countries'] = $countries;
    	$results_per_page=6; //how many tickets you want on page.default 20


		
		if (FULL_VERSION) {
			$ordered_from_options=array('T-TEL', 'Met Abonnement', 'Particulier', OTHER);//ordered from options
			$casco_options_array=array('Unigarant', 'Driekleur verzekering', 'Onbekend',OTHER);//casco options
			$pickup_days=array(//pickup days 
				array('day'=>'Monday','time'=>'09:00-12:00'), // remove or add 
				//array('day'=>'Tuesday','time'=>'09:00-12:00'), // remove or add 
				//array('day'=>'Wednesday','time'=>'10:00-12:00'), // remove or add 
				array('day'=>'Thursday','time'=>'18:00-20:00'), // remove or add 
				array('day'=>'Friday','time'=>'09:00-12:00'), // remove or add 
				array('day'=>'Saturday','time'=>'17:00-19:00'), // remove or add 
				//array('day'=>'Sunday','time'=>'10:00-12:00'), // remove or add 
			);
			$this->data['ordered_from_options'] = $ordered_from_options;
			$this->data['casco_options_array'] = $casco_options_array;
			$this->data['pickup_days'] = $pickup_days;

		}

		

		$extra_parts_array=array('Batterij','Oplader','Memory card','Usb kabel','Simkaart','Hoesje');//extra parts 
		$repair_status_options=array( 
			'1'=> REPAIR_STATUS_EMPTY,
			'2' => REPAIR_STATUS_WORKAT,
			'3' => REPAIR_STATUS_WAIT_PARTS,
			'4' => REPAIR_STATUS_FINISHED,
			'5' => REPAIR_STATUS_WAIT_POST,
			'6' => REPAIR_STATUS_RETURN_SENT,
			'7' => REPAIR_STATUS_WAIT_PHONE,
			'8' => REPAIR_STATUS_DELAY,
			'9' => REPAIR_STATUS_WAIT_ANSWER,
			'10' => REPAIR_STATUS_WAIT_PAYMENT,
			'11' => REPAIR_STATUS_CUST_REJECT,
		);
		$this->data['extra_parts_array'] = $extra_parts_array; 
		$this->data['repair_status_options'] = $repair_status_options;
    	   //repair statuses
   
    }
}
