<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechController extends Controller
{
    //

	public function __construct(){
		
		parent::__construct();
		$this->theme = 'webarch';

	}

    public function mylist(Request $request){

    	$user = \Auth::user();

    	$tickets = $user->tech;

    	$this->data['tickets'] = $tickets;
    	$theme = $this->theme;
    	return view($theme.'.tech.list',$this->data);


    }

    public function ticketedit(Request $request,$id){

        $this->data['view_only'] = false;
    	$ticket = \App\Model\Ticket::find($id);
    	$this->data['ticket'] = $ticket;
    	$theme = $this->theme;
    	if($ticket->technician_id)
    	return view($theme.'.tech.ticket-edit',$this->data);
    }
}
