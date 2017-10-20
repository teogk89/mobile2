<?php

namespace App\Model;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //

    public $timestamps = false;

    protected $table = 'notices';

    protected $fillable = ['notice_name','notice_content'];


    public function ticket(){


    	return $this->belongsTo('App\Model\Ticket','tickets_id',"ticket_id");
    }

    public function setNoticeDate(){
        $date = new Carbon;
        $this->notice_date = $date->toDateString();

    }
    public function modDate(){

    	$date = new Carbon();

    	$this->mods_date = $date->toDateString(); 


    }
}
