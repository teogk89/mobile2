<?php

namespace App\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //

    /**
		     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name','gender','repair_date','repair_cost','user_code','icloud_code','address','postal_code','city','country','phone_number','email_address','warranty','warranty_date_order','warranty_until','only_research','inform_price','ordered_from','ordered_from_other','casco','casco_options','casco_other','phone_model','phone_type','imei_number','ticket_date','user_ip_address','street_nr','pickup','extra_parts_other','reason'
    ];

    /**
     *
     *		* Select table
     *
     */
    protected $table = "tickets";

   

    protected $primaryKey = 'ticket_id';
    public $timestamps = false;



    public function notices(){


        return $this->hasMany('App\Model\Notice','tickets_id','ticket_id');
    }

    static function getToday($per){


        return $ticket_today = \App\Model\Ticket::where("ticket_date",'>',  \Carbon\Carbon::now()->subDay() )->paginate($per);
    }

    public function invoices(){


        return $this->hasMany('App\Model\Invoice','ticket_id','ticket_id');
    }

    public function details(){

        return $this->hasMany('App\Model\TicketDetail','ticket_id','ticket_id');
    }


    public function fromPost($post){

        if(isset($post['warranty_start'])){


            $this->warranty_date_order = $post['warranty_start'];
        }

        if(isset($post['warranty_end'])){

            $this->warranty_until = $post['warranty_end'];
        }

        if(isset($post['order_other'])){

            $this->ordered_from_other = $post['order_other'];
        }

        if(isset($post['extra_parts']) ){


            if(is_array($post['extra_parts'])){

                $this->extra_parts = implode(',',$post['extra_parts']);
            }

            else{

                $this->extra_parts = '';
            }

        }
        if(isset($post['casco_other'])){

            $this->casco_other = $post['casco_other'];
        }

        if(isset($post['pickup_date'])){

            $date = \DateTime::createFromFormat('D, M d, Y', $post['pickup_date']);


            $this->pickup_date = ($date ? $date:null);


        }

        if(isset($post['pickup_time']) && $post['pickup_time'] != ""){

            $this->pickup_time = $post['pickup_time'];
        }

        if(isset($post['residence'])){


            $this->address = $post['residence'];
        }

        if(isset($post['phone'])){

            $this->phone_number = $post['phone'];
        }

        if(isset($post['email'])){

            $this->email_address = $post['email'];
        }

        if(isset($post['phone_modelex'])){

            $this->phone_type = $post['phone_modelex'];
        }


        if(isset($post['ticket_tech'])){

            $this->technician_id = $post['ticket_tech'];
        }

                
        $this->ticket_date = \Carbon\Carbon::now();

    }
    public function teach(){


        return  $this->belongsTo('App\User', 'technician_id','id');
    }
    public function extraPartToArray(){

        if($this->extra_parts == null){

            return [];


        }else{

            return explode(',',$this->extra_parts); 
        }
        
    }

    public function getGeoCode(){

        return \Helper::googlemaps(strtoupper($this->postal_code),array($this->country,''),false);
    }

    public function getGeoCode2(){

        $geocode = $this->getGeoCode();

        $geo = \Helper::get_geocode($geocode['formated'],$this->postal_code);

        return $geo;
    }


    public function getDatePicker(){

        $date = new Carbon($this->pickup_date);
        //D,dd M yyyy
        return $date->format('D,d M Y');

    }

    public function getReason($to = 0){

        $sub = substr($this->reason,0,$to);

        if(strlen($this->reason) > strlen($sub)){

            return $sub.' ...';
        }else{

            return $this->reason;
        }

    }

    public function deleteAll(){


        foreach($this->notices as $n){

            $n->delete();
        }


        foreach($this->invoices as $m){
            $m->deleteImage();
            $m->delete();
        }

        foreach($this->details as $k){

            $k->deleteImage();
            $k->delete();
        }




    }
}
