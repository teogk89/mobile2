<?php

namespace App\Helpers;


class Khanh{


	static function bob(){

		return '<h4>Hello</h4>';
	}

	static function country(){

		return array('Belgie','Nederland');//countries
	}

	static function get_percentage($total, $number)
	{
	  if ( $total > 0 ) {
	   return round($number / ($total / 100),2);
	  } else {
	    return 0;
	  }
	}
	
	
	static function delButton($model,$id){

		$url = route('admin-model-del');
		$token = csrf_token();
		
		return '<button data-id="'.$id.'" data-model="'.$model.'" data-url="'.$url.'" token="'.$token.'" type="submit" onclick="tableRowDel(event,this)" name="submit" value="delete" class="btn btn-danger btn-cons"><i class="fa fa-trash-o"></i></button>';


	}
	static function get_geocode($geocode,$zip)
	{

	if(empty($geocode)){$newgeocode=self::googlemaps(strtoupper($zip),'',false); }

	if(!empty($geocode)){

							  return $geocode;	
	                          // return'<span style="font-size:14px; margin-bottom:20px; font-weight:bold; color:green;" class="span10">
	                          // User Address by Geocode: '.$geocode.'</span>';}
	                        
							}
	else if(empty($geocode)&&!empty($newgeocode['formated'])){


							  return $newgeocode['formated'];				
	                          // return'<span style="font-size:14px; margin-bottom:20px; font-weight:bold; color:green;" class="span10">
	                          // User Address by Geocode: '.$newgeocode['formated'].'</span>';
	                          }
	else{ return false;}
	}

	static function logoPath(){

		$setting = \App\Model\Setting::find(1);

		return $setting->imageUrl();

	}
	static function theme(){

		return env("APP_THEME");
	}

	static function get_status($status){
    
		switch($status){
		    case '1':
		        $output = '<span style="color:#000000; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '2':
		        $output = '<span style="color:#86C9DB; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '3':
		        $output = '<span style="color:#D99C4C; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '4':
		        $output = '<span style="color:#47B300; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '5':
		         $output = '<span style="color:#D99C4C; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '6':
		        $output = '<span style="color:#6636A8; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '7':
		        $output = '<span style="color:#D99C4C; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '8':
		        $output = '<span style="color:#AC8DD7; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '9':
		         $output = '<span style="color:#D99C4C; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '10':
		        $output = '<span style="color:#BA5A0B; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '11':
		        $output = '<span style="color:#C70404; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		     case '12':
		        $output = '<span style="color:#47B300; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		    
		    case '':
		        $output = '<span style="color:#000000; font-size:18px; text-align:right;"><i class="icon-bell"></i></span>';
		    break;
		}

		return $output;
	
	}
	static function shop(){


		return $shop = \DB::table('settings')->first();
	}	
	static function list_status($list,$status){
		//print_r($list); exit;
		## cauta in array statusul din baza 
		if(in_array($status,$list)){
		## daca il gasim cautam indicele din array (config.php) 
		$res=array_search($status, $list);
		## return_icon case $res (1 , 2 ,3 etc) 
		#return '<a id="pop" href="#" style="margin: 10px;" data-toggle="popover" data-content="'.$status.'">'.get_status($res).'</a>';
		return '<a href="#"  data-toggle="pop" title="'.$status.'">'.self::get_status($res).'</a>';

		#<br/><span style="font-size:5px;">'.$status.'</span>
		}
		else{return '<a href="#" data-toggle="pop" title="No Status">'.self::get_status('').'</a>';}

	}
	static function zimplode ($arr,$glue=', ') {

	foreach ($arr as $key=>$a) {
		if ($a=='') unset($arr[$key]);
	}
	return implode($glue,$arr);
	}
	static function repair_status(){


		return array( 
			'0'=> 'All',
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
			'12'=> 'Today',
			'13'=>'Other'
		);

	}

	static function status_count($type){

		$repair_status = self::repair_status();

		if($type == '0'){

    		//$tickets = \DB::table('tickets')->orderBy('ticket_id', 'desc')->paginate($per);

            $tickets = \App\Model\Ticket::orderBy('ticket_id','desc')->count();


    	}elseif ($type == '12'){

            $tickets = \App\Model\Ticket::where("ticket_date",'>',  \Carbon\Carbon::now()->subDay() )->count();

        }elseif($type == '13'){


            $tickets = \App\Model\Ticket::whereNotIn('repair_status',$repair_status)->count();



        }else{

    		//$tickets = \DB::table('tickets')->where('repair_status',$status)->orderBy('ticket_id', 'desc')->paginate($per);
            $tickets = \App\Model\Ticket::orderBy('ticket_id','desc')->where('repair_status',$repair_status[$type])->count();

    	}

    	return $tickets;


	}
	static function lsparam($list){

		if(is_array($list)){
			$ret = '';
			foreach($list as $key => $value){

				$ret .= "&amp;".$key."=".$value."";
			
			} 

		return $ret;
		}
	}
	static function googlemaps($address,$list=array(),$debug = false){

		$key = config('services.google.api');
		$URL='https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).''.self::lsparam($list).'&sensor=false&key='.$key.'';

		$req=file_get_contents($URL);

		$req=json_decode($req);

		if($debug){print_r($req); exit;}

		if($req->status=="OK"){
			$req=$req->results;
			$req=$req[0];

			$place=$req->address_components[1]->long_name;
			$address=$req->address_components[2]->long_name;
			$area=$req->address_components[3]->long_name;
			$formated=$req->formatted_address;
			$loc=$req->geometry->location;
		//print_r($loc); exit;

			return [
				'place' => $place,
				'zonal' => $address,
				'area' => $area,
				'formated' => $formated,
				'lat'=> $loc->lat,
				'lng' => $loc->lng
			];
		}

		else {
			return false;
		}
	}

	static function googleMapFrame($postcode){

		$key = config('services.google.api');

		return '<iframe width="100%" height="380" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key='.$key.'&q='.$postcode.'&zoom=23&maptype=satellite">
				</iframe>';
	}

}