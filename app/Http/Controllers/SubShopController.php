<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubShopController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('subshop');
        parent::__construct();
        $this->theme = 'webarch';

       
    }


    public function index(Request $request){


    	$theme = $this->theme;

    	$user = \Auth::user();
    	$this->data['tickets'] = $user->tickets;
    	$this->data['shop'] = \Helper::shop();
    	$this->data['template'] = $theme;
  
    	return view($theme.'.subshop.index',$this->data);
    }

    public function profile(Request $request){


        $user = \Auth::user();

        if($user->address == null){

            $address = new \App\Model\UserAddress();
            $address->user_id = $user->id;
            $address->postcode = '';
            $address->save();
        }
        $this->data['user'] = \Auth::user();

        $theme = $this->theme;
        return view($theme.'.subshop.profile',$this->data);
    }

    public function profilesave(Request $request){

        $user = \Auth::user();

        $type = $request->input('type');

        $post = $request->all();
        if($type == 'profile'){

            $address = $user->address;
            $address->fill($post);
            $address->save();
            $user->name = $post['name'];
            $user->save();

            return redirect()->back()->with('success','Profile has been update !');


        }

        if($type == 'password'){

            if($post['password'] != $post['confirm']){

                return redirect()->back()->with('danger','Password and confirm must be the same !');
            }
            $user->password = \Hash::make($post['password']);

            $user->save();
            return redirect()->back()->with('success','Password has been change !');


        }
       
    }
    public function postNewTicket(Request $request){

        $user = \Auth::user();

        $post = $request->all();

      //  $post['extra_parts'] = ($request->has('extra_parts') && is_array($request->input('extra_parts'))  ? implode(',', $request->input('extra_parts')):null);
        $ticket = new \App\Model\Ticket();
        $ticket->user_ip_address = \Request::ip();
        $ticket->fill($post);
        $ticket->fromPost($post);
        $ticket->customer_id = $user->id;
        $ticket->user_id = $user->id;
    
        $ticket->save();

        return redirect()->route('shop-ticket')->with('success','Ticket is aangemaakt !');

    }
    public function ticket(Request $request){

        $user = \Auth::user();
        $this->data['view_only'] = false;
        if($request->has("id")){

            $this->data['view_only'] = true;
            $id = $request->input("id");

            $ticket = \App\Model\Ticket::find($id);
            if($ticket == null){

                abort(404);
            }
            if($ticket->user_id != $user->id){

                 abort(404);

            }
            $this->data['ticket'] = \App\Model\Ticket::find($id);

        }
       
        else{

            $this->data['ticket'] = new \App\Model\Ticket();
        }

    	$theme = $this->theme;

    	$user = \Auth::user();
    	
    	$this->data['address'] = $user->address;
    	$this->data['edit'] = false;
    	$this->data['user'] = $user;
    	/*$this->data['shop'] = \Helper::shop();
    	$this->data['template'] = $theme;
    	
    	$this->data['countries'] = \Helper::country();*/

    	return view($theme.'.subshop.ticket',$this->data);
    }
    //[ib]


}
