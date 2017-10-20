<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mailgun\Mailgun;
use Ifsnop\Mysqldump as IMysqldump;

class MainController extends Controller
{
    //
    public function __construct(){

        parent::__construct();
        $this->theme = 'webarch';

    }



    public function viewticket(Request $request,$id = null,$post = null){

        if($request->isMethod('post')){

            $id = $request->input('id');
            $post = $request->input('post');
        }
        $ticket = \App\Model\Ticket::where('ticket_id',$id)->where('postal_code',$post)->first();

        if($request->isMethod('get') && $ticket == null){

            abort(404,'No ticket found');
        }

        if($request->isMethod('post') && $ticket == null){

           return redirect()->back()->with('danger','Geen ticket gevonden !');
        }
        $this->data['ticket'] = $ticket;

        $this->data['view_only'] = true;
        $theme = $this->theme;
        return view($theme.'.main.view-ticket',$this->data);



    }

    public function guestprint(Request $request,$id,$post){

        $ticket = \App\Model\Ticket::where('ticket_id',$id)->where('postal_code',$post)->first();
        if($ticket == null){

            abort(404,'No ticket found');
        }
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();

        $this->data['barcode'] =  base64_encode($generator->getBarcode($ticket->ticket_id,$generator::TYPE_CODE_128,3,50));
        $this->data['barcode_imei'] = base64_encode($generator->getBarcode($ticket->imei_number,$generator::TYPE_CODE_128,3,25));
        $this->data['ticket'] = $ticket;


        return view('print.guest-ticket',$this->data);
    }
    public function check(Request $request){

         $ticket = \DB::table("tickets")
                            ->select(\DB::raw('count(*) as phone_count,phone_type'))
                            ->groupBy('phone_type')->get();


         foreach($ticket as $t){

            echo ($t->phone_type).' '.$t->phone_count.'<br/>';
         } 
           
       //dd($phone->questions);
        
    }
    public function myforward(Request $request){


        $url = $request->input('url');

        return redirect($url);
    }
    public function index(Request $request){

       
       // $theme = 'basic';
        $theme = $this->theme;

        return view($theme.'.main.index',$this->data);

    }
    public function offline(Request $request){

    	$this->data['home'] = 'aadsfsa';

    	$this->data['purchase'] = ['a','b'];
    	$this->data['insurance'] = ['a','b'];

    	$query = \DB::table('settings2')->where('name', 'repairpolicy')->first();

        $ticket = new \App\Model\Ticket();
        $this->data['ticket'] = $ticket;
        $theme = $this->theme;
        $this->data['view_only'] = false;
    	$this->data['policy'] = $query->myvalue;
    	return view($theme.'.main.offline',$this->data);
    }


    public function search(Request $request){

        $table = $request->input('table');
        $col = $request->input('col');
        $temp = $request->input("temp");
        $p = $request->input('p');
        if($p == ""){

            return '';
        }
        $this->data['type'] =  $request->input('type');
        $type = $request->input("type");
        if($type == 'guest'){

            $this->data['route'] = "guest-price-model";
        }

        if($type == 'admin'){

            $this->data['route'] = "admin-mod-price";
        }

        $results = \DB::table($table)
                    ->where($col, 'like', '%'.$p.'%')
                    ->get();
        $data = [];            
        
        foreach($results as $m=>$n){


            $data[] = [
            'id'=>$n->id,
            'name'=>$n->mdname
            

            ] ;   
            


           
        }
       // dd($data);

        $this->data['result'] = $data;
        
        return [count($results),view('search.'.$temp,$this->data)->render()];            
        //echo 



    }

    public function capcha(Request $request){



    }


    public function captcha(Request $request){

        //session_start();
      
        define('ABSPATH',dirname(__FILE__).'/');//do not modify this

        $number1 = mt_rand(10, 40);
        $number2 = mt_rand(1, 10);
        $sign = mt_rand(1, 2);
        if ($sign == 1)
        {
            $rep = $number1 + $number2;
            $string = "$number1 + $number2 = ";
        }
        else
        {
            $rep = $number1 - $number2;
            $string = "$number1 - $number2 = ";
        }
        
        $request->session()->put('myxxcaptchagen', $rep);

        $im = imagecreate(130, 30);

        $randx=mt_rand('10','250');
        $rand=mt_rand('100','225');
        $randz=mt_rand('50','250');

        $bg = imagecolorallocate($im, $randx, $rand, $randz);
        $textcolor = imagecolorallocate($im, 0, 0, 0);
     //   $font = env("APP_URL").'/basic/template/fonts/Candice.ttf';
        $font = base_path('public/basic/template/fonts/Candice.ttf');
       // echo $font;
        imagettftext($im, 20, 0, 10, 20, $textcolor, $font, $string);
        //imagestring($im, 5, 15, 5, $string, $textcolor);

        for ($c = 0; $c < 200; $c++)
        { 
           $x = rand(0, 100 - 1); 
           $y = rand(0, 30 - 1); 
           imagesetpixel($im, $x, $y, $textcolor); 
        }

        header('Content-type: image/png');

        imagepng($im);
        imagedestroy($im);


    }
    public function getOffline_ticket(Request $request){

        $theme = env("APP_THEME");
        $this->data['view_only'] = false;   
        $this->data['edit'] = FALSE;
        return view($theme.'.main.offline',$this->data);
    }

    public function queryprice(Request $request){

        $theme = $this->theme;
        

        $this->data['brands'] = \App\Model\PhoneBrand::paginate(10);
        


        return view($theme.'.main.query-price',$this->data);
    }

    public function checkticket (Request $request){

        $theme = $this->theme;
        return view ($theme.'.main.check-ticket');
    }

    public function pricemodel(Request $request,$id){

        $model = \App\Model\PhoneModel::find($id);

        $this->data['model'] = $model;

        $theme = $this->theme;
        return view($theme.'.main.price-model',$this->data);

    }
    public function querypricemodel(Request $request,$id){
       
        $theme = $this->theme;
        $this->data['models'] = \App\Model\PhoneModel::where('brand',$id)->paginate(10);
     
        return view($theme.'.main.query-price-model',$this->data);

    }
    public function postUpdateticket(Request $request){

        $post = $request->all();
        $ticket = new \App\Model\Ticket();

        $ticket->user_ip_address = \Request::ip();
        $ticket->fill($post);
        $ticket->fromPost($post);
       
        $user = \App\User::where('email',$post['email'])->first();
        $new_user = false;

        if($user == null){

            $new_user = true;
            $user = new \App\User();
            $user->name = $post['name'];
            $user->email = $post['email'];
            
            $user->role = 'subshop';
            $user->createPassword();
           
            $user->save();    
            $user->sendEmail();
            $userAddress = new \App\Model\UserAddress();

            $userAddress->dataFromRequest($post);
            $userAddress->user_id = $user->id;
            $userAddress->save();
        }
        $ticket->user_ip_address = \Request::ip();

        $ticket->customer_id = $user->id;
        $ticket->user_id = $user->id;
        $ticket->save();

        $this->data['ticket'] = $ticket;
        
        

        $this->data['email'] = $user->email;
        $this->data['new_user'] = $new_user;
        $this->data['view_only'] = false;
        $this->data['rawPassword'] = $user->getRawPassword();
         $theme = $this->theme;
        return view($theme.'.main.updateticket',$this->data);


    }
    public function postUpdateticketaaa(Request $request){

        $captcha = $request->session()->get('myxxcaptchagen');


        $validator = $this->validator($request->all(),$captcha);

        $request->session()->forget('myxxcaptchagen');

        if($validator->fails()){


            return redirect()->back()->withInput()->withErrors($validator);
        }

        $post = $request->all();
     
        $post['extra_parts'] = ($request->has('extra_parts') && is_array($request->input('extra_parts'))  ? implode(',', $request->input('extra_parts')):null);


        $ticket = new \App\Model\Ticket();

        $user = \App\User::where('email',$post['email'])->first();
        $new_user = false;

        if($user == null){

            $new_user = true;
            $user = new \App\User();
            $user->name = $post['name'];
            $user->email = $post['email'];
            
            $user->role = 'subshop';
            $user->createPassword();
            
            $user->save();    


            $userAddress = new \App\Model\UserAddress();
            $userAddress->city = $post['city'];
            $userAddress->address = $post['residence'];
            $userAddress->str_nr = $post['street_nr'];
            $userAddress->postcode = $post['postal_code'];
            $userAddress->gender = $post['gender'];
            $userAddress->country = $post['country'];
            $userAddress->user_id = $user->id;

            $userAddress->save();
        }
        $ticket->user_ip_address = \Request::ip();
        $ticket->fill($request->all());
        $ticket->customer_id = $user->id;
        $ticket->user_id = $user->id;
        $ticket->save();

        $theme = env("APP_THEME");
        $this->data['email'] = $user->email;
        $this->data['new_user'] = $new_user;
        $this->data['view_only'] = false;
        $this->data['rawPassword'] = $user->getRawPassword();
        return view($theme.'.main.updateticket',$this->data);
        
    }


    private function validator(array $data,$result)
    {

       

        $message = [
            'in' => 'Captcha Invalid !'
        ];
        return Validator::make($data, [
            'captcha'    => 'required|max:255|in:'.$result.''
        ],$message);
    }
}
