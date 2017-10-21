<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CurrentTicketStatus extends Model
{
    //

	protected $primaryKey = 'ticket_id';

    protected $table = "current_ticket_status";



    public function status(){

    	return $this->hasOne('App\Model\TicketStatus','id','ticket_id_status');
    	
    }
}
