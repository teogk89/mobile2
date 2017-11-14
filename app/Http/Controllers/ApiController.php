<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function api(Request $request){

    	if($request->input('type') == 'address'){

    		$zipcode = $request->input('value');
    		$result = \DB::table("postcodes")->where('postcode',$zipcode)->first();

    		return json_encode((array) $result);
    	}

        if($request->input('type') == 'emailsearch'){


            $p = $request->input('world');

            $results = \DB::table('tickets')
                    ->where('name', 'like', '%'.$p.'%')
                    ->orWhere('email_address', 'like', '%'.$p.'%')
                    ->orWhere('ticket_id', 'like', '%'.$p.'%')
                    ->select('ticket_id','name','email_address')
                    ->get();
            $this->data['results'] = $results;        
            return [count($results),view('webarch.api.email-find',$this->data)->render()];  




        }

        if($request->input('type') == 'order-status'){
            $id = $request->input('id');
            $result = $request->input("result");
            $order = \App\Model\Order::find($id);
            $order->order_status = $result;
            $order->save();
        }

           if($request->input('type') == 'sms-status'){
            $id = $request->input('id');
            $result = $request->input("result");
            $order = \App\Model\Order::find($id);
            $order->customer_sms = $result;
            $order->save();
        }

        if($request->input('type') == 'social'){

            $id = $request->input('id');

            $type= $request->input('social');

            $user = \App\User::find($id);
            $result = $user->sendEmailSocial($type);
            dd($result);

        }



    }

    public function modeldel(Request $request){

    	$post = $request->all();
        $model = $post['model'];
        $id = $post['id'];
        //$model::find($id)->delete();

        if($model == 'notice'){

        	\App\Model\Notice::find($id)->delete();
        }
        if($model == 'ticket'){

            $record = \App\Model\Ticket::find($id);
            $record->deleteAll();
            $record->delete();	
        }

        if($model == 'phone-model'){

             $record = \App\Model\PhoneModel::find($id);
             $record->deleteImage();
             $record->delete();

        }

        if($model == 'order'){


            $record = \App\Model\Order::find($id);
            $record->delete();

        }
        if($model == 'subshop'){

            $user = \App\User::find($id);
            $user->clearTicket();
            $user->delete();
        }


        if($model == 'tech'){

            $user = \App\User::find($id);
            $user->clearTech();
            $user->delete();
        }
    	
    }


    public function emailfind(Request $request){


        $word = $request->input('world');

         $results = \DB::table('tickets')
                    ->where('name', 'like', '%'.$p.'%')
                    ->orWhere('email_address', 'like', '%'.$p.'%')
                    ->orWhere('ticket_id', 'like', '%'.$p.'%')
                    ->select('ticket_id','name','email_address')
                    ->get();

        return [count($results),view('search.'.$temp,$this->data)->render()];  
    }
}
