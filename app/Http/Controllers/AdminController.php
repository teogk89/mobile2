<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Carbon\Carbon;
use Mailgun\Mailgun;
use Ifsnop\Mysqldump as IMysqldump;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        //$this->middleware('subshop');
        parent::__construct();

        $this->theme = 'webarch';
    }

    public function ticketstatuslist(){

        $this->data['status'] = \App\Model\TicketStatus::all();
        $theme = $this->theme;
        return view($theme.'.admin.ticket-status-list',$this->data);


    }

    public function ticketstatussave(Request $request){


        $post = $request->all();

        if($post['state'] == 'new'){

             $status = new \App\Model\TicketStatus();

            
            

        }
        if($post['state'] == 'edit'){

             $status = \App\Model\TicketStatus::find($post['id']);   

        }
        if(isset($post['active'])){

            $status->active = 1;
        }else{

            $status->active = 0;

        }
        $status->fill($post);
        $status->save();   
        return redirect()->back()->with('success','Status has been saved !');

    }
    public function ticketstatusadd($id = null){
        if($id != null){

            $this->data['state'] = 'edit';
            $this->data['status'] = \App\Model\TicketStatus::find($id);
        }else{

            $this->data['state'] = 'new';
        }
        
        $theme = $this->theme;
        return view($theme.'.admin.ticket-status-add',$this->data);
    }
    public function profile(Request $request){

        $user = \Auth::user();

        if($user->address == null){

            $address = new \App\Model\UserAddress();
            $address->user_id = $user->id;
            $address->postcode = '';
            $address->save();
        }
        $theme = $this->theme;
        $this->data['user'] = $user;
        return view($theme.'.admin.profile',$this->data);
    }

    public function profilesave(Request $request){

         $post = $request->all();
        if($request->has('id')){

            $user = \App\User::find($request->input('id'));

        }elseif($request->has("mode") && $request->input('mode') == 'new'){

            $user = new \App\User();
            $user->email = $post['email'];
            $user->name = $post['name'];
            $user->role = $post['role'];
            $user->createPassword();
            $user->save();

            $add = new \App\Model\UserAddress();
            $add->postcode = $post['postal_code'];
            $add->user_id = $user->id;
            $add->fill($post);
            $add->save();

        }
        else{

            $user = \Auth::user();
        }
      

        $type = $request->input('type');

       
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

    public function userprofile(Request $request,$id = null){

        if($id == null){

            $user = new \App\User();

        }else{

            $user = \App\User::find($id);
        }
      
        if($user->address == null){

            $address = new \App\Model\UserAddress();
            $address->user_id = $user->id;
            $address->postcode = '';
            $address->save();
        }
        $theme = $this->theme;
        $this->data['user'] = $user;
        return view($theme.'.admin.user-profile',$this->data);

    }

    public function newuser(Request $request){
         $user = new \App\User();
         $address = new \App\Model\UserAddress();
         $user->address = $address;
         //$this->data['address'] = $address;

        $theme = $this->theme;
        $this->data['user'] = $user;
        return view($theme.'.admin.new-user',$this->data);

    }


    public function backupoutput (Request $request){

            $db = env('DB_DATABASE');
             $dumpSettings = array('include-tables'=>$request->input('table'));
            try {
                $dump = new IMysqldump\Mysqldump('mysql:host=localhost;dbname='.$db, 'root', '',$dumpSettings);
                $dump->start('sfas.sql');
            } catch (\Exception $e) {
                echo 'mysqldump-php error: ' . $e->getMessage();
            }

            return response()->download(public_path().'//sfas.sql',$request->input('name').'.sql')->deleteFileAfterSend(true);

        dd($request->all());
    }
    public function backup(Request $request){

        $theme = $this->theme;
        return view($theme.'.admin.backup',$this->data);
    }
    public function emailsend(Request $request){

      
        $api = env('MAILGUN_API_KEY');
       
     //  dd($post['file']);
        $mgClient = new Mailgun($api);
        $domain = 'duykhanhonline.net';


        # Make the call to the client.

       
        $content = array(
            'from'    => 'admin@'.$domain,
            'to'      => $request->input('sender'),
           
            'subject' => $request->input('subject'),
          //  'text'    => 'Testing some Mailgun awesomness!',
            'html'    => $request->input('content').'<br/>'.$request->input('email-signature')
        );

        if($request->hasFile("file")){

              $post = $request->all();

              $images = [];
            // $imagePath =  $_FILES['uploadImageFile']['tmp_name']; 
            foreach($post['file'] as $f){
                //var_dump($f);
                    

                  $image  = \Storage::disk('uploads')->put('tmp', $f);
                  //   dd(public_path().'/images/'.$image);

                 $images[] = public_path().'/images/'.$image;

                //echo $f->getClientOriginalName()."<br/>";
               // echo $f->getPathName().'<br/>';
            }
           // dd($request->input('file'));

           
             $result = $mgClient->sendMessage($domain,$content,
                array(
                    'attachment'=>$images
                )
            );


        }else{

             $result = $mgClient->sendMessage($domain, $content);

        }

        return redirect()->back()->with('success','email has been sent !');

     
    }
    public function emailcreate(Request $request){


        $theme = $this->theme;
        return view($theme.'.admin.email-send',$this->data);

    }

    public function ordersave(Request $request){


        if($request->input("type") == 'edit'){

            $id = $request->input("id");
            $order = \App\Model\Order::find($id);
            $order->fill($request->all());
            $order->save();

            return redirect()->back()->with("success","order #".$order->id.' has been saved !');

        }

        if($request->input("type") == 'new'){

            $order = new \App\Model\Order();
            $order->fill($request->all());
            $order->customer_sms = 'no';
            $order->order_status = 'open';
            $order->save();

            return redirect()->back()->with("success","order #".$order->id.' has been created !');
        }
       
    }
    public function settings(Request $request){

        $this->data['setting'] = \App\Model\Setting::find(1);

        $theme = $this->theme;
        return view($theme.'.admin.setting',$this->data); 

    }

    public function noticeedit(Request $request,$id){

       

        $notice = \App\Model\Notice::find($id);
        $this->data['notice'] = $notice;
        $this->data['ticket_id'] = $notice->id;
        $theme = $this->theme;

        $user = \Auth::user();
        $layout = ($user->isAdmin() ? 'webarch.layouts.app':'webarch.layouts.app2');

        $this->data['layout'] = $layout;
        return view($theme.'.admin.notice-edit',$this->data);
        

    }

    public function orderedit(Request $request,$id = null){

        $this->data['type'] = ($id == null ? 'new':'edit');
        $theme = $this->theme;
        if($id != null){

            $order = \App\Model\Order::find($id);

        }else{

            $order = new \App\Model\Order();
        }
        $this->data['order'] = $order;
        
        return view($theme.'.admin.order-edit',$this->data);
        
    }

    public function orders (Request $request){

        $orders = \App\Model\Order::orderBy('id','desc')->paginate(15);
        $this->data['orders'] = $orders;
        $theme = $this->theme;
        return view($theme.'.admin.orders',$this->data);
    }

    public function notice(Request $request){

        $theme = $this->theme;

        $this->data['result'] = \App\Model\Notice::paginate(15);
        return view($theme.'.admin.notice',$this->data);

    }

    public function noticesave(Request $request){

        if($request->input('type') == 'edit'){

            $notice = \App\Model\Notice::find($request->input('id'));


          
        }else{

            $notice = new \App\Model\Notice();
            $notice->tickets_id = $request->input('tickets_id');
            $notice->ticket_id = $request->input('tickets_id');
            $notice->setNoticeDate();
        }

            $notice->fill($request->all());

            $notice->modDate();
            $notice->save();

            return redirect()->back()->with('success','Notice #'.$notice->id.' has been saved'); 
    }
    public function settingssave(Request $request){



        $set = \App\Model\Setting::find(1);


        $set->fill($request->all());
        \DB::table('settings2')->where('name','email-signature')->update(['myvalue'=>$request->input('email_signature')]);

        if($request->hasFile('logo')){

            $set->deleteImage();
            $set->saveImage($request->file('logo'));
            
        }
        $set->save();

        return redirect()->back()->with('success','Setting has been save');

    }
    public function savebrand(Request $request){


        if($request->input('type') == 'new'){

                $brand = new \App\Model\PhoneBrand();
                $brand->name = $request->input("name");
                $brand->saveImage($request->file('image'));
                $brand->createNr();
                $brand->save();

                return redirect()->back()->with('success',$brand->name.' has beend added');
               

        }else{

                $brand = \App\Model\PhoneBrand::find($request->input('id'));

                $brand->name = $request->input('name');

                if($request->hasFile('image')){

                    $brand->deleteImage();
                    $brand->saveImage($request->file('image'));
                }
                $brand->save();

                return redirect()->back()->with('success',$brand->name.' has been updated');


        }
    }

    public function editticket(Request $request,$id){



        //$id = $request->input('id');

        $ticket = \App\Model\Ticket::find($id);
        $this->data['ticket'] = $ticket;
        $this->data['view_only'] = false;

        $this->data['tech'] = \App\User::where('role','tech')->get();

       // $theme = 'basic';
        $theme = $this->theme;
        return view($theme.'.admin.editticket',$this->data);


    }


    public function brandadd(Request $request){



        $this->data['brands'] = \App\Model\PhoneBrand::all();

        $theme = $this->theme;

        return view($theme.'.admin.brand-add',$this->data);
    }
    public function modprice (Request $request,$id){


        $model = \App\Model\PhoneModel::find($id);


        $brand = \DB::table('phonebrands')
                      ->select('phonebrands.nr','phonebrands.name')->get();

        //$theme = $this->theme;
        $this->data['brand'] = $brand;
        $this->data['model'] = $model;
        $theme = $this->theme;

        return view($theme.'.admin.mod-price',$this->data);
    }

    public function savemodel(Request $request){

        $post = $request->all();
       
       //$image_path = $request->file('myimage')->store('uploads');
        $image_path = null;
        if($request->hasFile('myimage')){

            $image = \Storage::disk('uploads')->put('phones', $request->file('myimage'));

           
            $image_path = basename($image);
        }
        //$image = \Storage::disk('uploads')->put('model', $post['image']);

       // $image_path = env('UPLOAD_FOLDER').$image;
          
        $model = new \App\Model\PhoneModel();

        $model->mdname = $post['name'];
        $model->brand = $post['brand'];
        $model->image = $image_path;
        $model->mnr =  md5(time()*15+mt_rand(55,9999));
        $model->save();
      

        return redirect()->back()->with('success','Model has been saved!');


    }

    public function modeledit(Request $request){

        

        $phoneModel = \App\Model\PhoneModel::find($request->input('id'));

        if($request->has('submit') && $request->input('submit') == 'delete'){

            $name = $phoneModel->mdname;
            $phoneModel->deleteAll();

            return redirect()->route('admin-addprice')->with('danger','Model '.$name.' has been delete !');
        }
        $phoneModel->mdname = $request->input("mdname");
        $phoneModel->brand = $request->input("brand");

        if($request->hasFile('image')){

            $phoneModel->deleteImage();
            $phoneModel->saveImage($request->file("image"));
        }
        $phoneModel->save();

        return redirect()->back()->with('success','Phone model #'.$phoneModel->id.' has been updated !');

    }
    public function addmodel(Request $request){


        $brand = \DB::table('phonebrands')
                      ->select('phonebrands.nr','phonebrands.name')->get();

        $theme = $this->theme;
        $this->data['brand'] = $brand;
        return view($theme.'.admin.add-model',$this->data);
    }
    public function addprice(Request $request){

        $theme = $this->theme;

        $result = \DB::table("phonemodels as phonemodels")    
                    ->join('phonebrands as phonebrands', 'phonemodels.brand', '=', 'phonebrands.nr')
                    ->select('phonemodels.id','phonemodels.mdname', 'phonebrands.name','phonemodels.image')
                   ->orderBy('phonemodels.mdname')
                   ->paginate(15);
        
        $collec = $result->toArray();
  
        $myresult = [];
        foreach($collec['data'] as $r){
            $question = \DB::table('phonerepair')->where('model',$r->id)->groupby('model')->count();
            $myresult[] = [

            'id'=>$r->id,
            'name'=>$r->mdname,
            'brand'=>$r->name,
            'image'=>$r->image,
            'question'=>$question


            ];
          
        };
        $this->data['myresult'] = $myresult;
        $this->data['result'] = $result; 
       // foreach($result as)          
        return view($theme.'.admin.addprice',$this->data);



    }
    public function myprint(Request $request,$id){

        $theme = \Helper::theme();

        return view($theme.'.admin.print',$this->data);

    }

    public function saveticket(Request $request){

        $edit  = ($request->has('ticket_id') ? true:false);

        $post = $request->all();
   //     $post['extra_parts'] = ($request->has('extra_parts') && is_array($request->input('extra_parts'))  ? implode(',', $request->input('extra_parts')):null);
        $ticket = ($edit ? \App\Model\Ticket::find($request->input("ticket_id")) : new \App\Model\Ticket());

        $ticket->user_ip_address = \Request::ip();
        $ticket->fill($post);
        $ticket->fromPost($post);

        if(!$edit){

            $ticket_user = \App\User::where('email',$post['email_address'])->first();
            $ticket->customer_id = $ticket_user->id;
            $ticket->user_id = $ticket_user->id;
        }
        $ticket->save();

        
        return redirect()->back()->with('success','Ticket has been saved!');
    }

 
    public function dashboard(Request $request){

        $result = [];

        $total = \DB::table('tickets')->count();
       
        $color = ['blue','green','red','purple'];
        $first = [

            'count' => $total,
            'percent'=> 100,
            'name'=>'All tickets',
            'color'=>'blue',
            'link' => route('admin-ticket-by-type',['type'=>'all','per'=>15])

        ];
            

        $ticket_today = \DB::table('tickets')->where("ticket_date",'>',  Carbon::now()->subDay() )->count();

        $today = [

            'name'=> "Today",
            'count' => $ticket_today,
            'color'=> 'purple',
            'percent'=> \Helper::get_percentage($total,$ticket_today),
            'link' => route('admin-ticket-by-type',['type'=>'today','per'=>15])
        ];
        $result[] = $first;
        $result[] = $today;

        $ticket_status = \DB::table('ticket_status')->where('active',1)->get();

        foreach($ticket_status as $k=>$m){


            $count = \DB::table('current_ticket_status')->where('ticket_id_status',$m->id)->count();
            $mycolor = $m->colors;
            $data = [

                'count' =>$count,
                'percent'=> \Helper::get_percentage($total,$count),
                'name' =>$m->startus,
                'color'=>$mycolor,
                'link' => route('admin-ticket-by-type',['type'=>$m->id,'per'=>15])

            ];

            $result[] = $data;
        }

        /*foreach($this->data['repair_status_options'] as $k=>$m){


            if($m == "All" || $m == 'Today'){

                continue;
            }
            $count = \DB::table("tickets")->where("repair_status",$m)->count();
            $mycolor = $k % 4;
            $data = [
                'count' => $count,
                'percent'=> \Helper::get_percentage($total,$count),
                'name'=>$m,
                'color'=>$color[$mycolor],
                'link' => route('admin-ticket-by-type',['type'=>$k,'per'=>15])
            ];
            $result[] = $data;

        }*/
        $other_count =  \App\Model\Ticket::doesntHave('current_status')->count();
        $other = [
            'name'=> "No Status",
            'count'=>$other_count,
            'percent'=>\Helper::get_percentage($total,$other_count),
            'color' => 'green',
            'link' => route('admin-ticket-by-type',['type'=>'nostatus','per'=>15])

        ];
        $result[]  = $other;
        $this->data['result'] = $result;

        $theme = 'webarch';


        return view($theme.'.admin.dashboard',$this->data);

    }
    
    public function subshoplist(Request $request){


        $subshop = \App\User::where("role",'subshop')->orderBy("id",'desc')->paginate(20);
        $this->data['subshop'] = $subshop;
        $theme = $this->theme;
        return view($theme.'.admin.list-subshop',$this->data);

    }

    public function techlist (Request $request){

        $subshop = \App\User::where("role",'tech')->orderBy("id",'desc')->get();
        $this->data['subshop'] = $subshop;
        $theme = $this->theme;
        return view($theme.'.admin.list-tech',$this->data);

    }

    public function newticket(Request $request,$user){


        $myuser = \App\User::find($user);

        $this->data['user'] = $myuser;
        $this->data['address'] = $myuser->address;
        $theme = $this->theme;
        $this->data['view_only'] = false;
        $ticket = new \App\Model\Ticket();
        $this->data['ticket'] = $ticket;

        return view($theme.'.admin.new-ticket',$this->data);
    }   

    public function modeldel(Request $request){

        $post = $request->all();
        $model = $post['model'];
        $id = $post['id'];
        $model::find($id)->delete();
       
    }

    public function ticketeditquick(Request $request){


        $post = $request->all();
       
        $type = $request->input("type");

        if($type == 'tech'){

        
            $ticket = \App\Model\Ticket::find($post['id']);
            $ticket->technician_id = $post['ticket_tech'];
            $ticket->repair_cost = $post['price'];
            $ticket->repair_date = $post['repair_date'];
            $ticket->save();

            return redirect()->back()->with("success","Ticket  #".$ticket->ticket_id." has been saved !");

        }
        if($type == 'status-add'){

             $status = new \App\Model\TicketDetail();   

             $status->ticket_status_id = $post['ticket_status_id'];
          //   $status->detail = ($request->has('detail') ? $request->input("detail"):null);
             $status->ticket_id = $request->input("id");
             $status->ticket_status = $post['xstatus'];

             $status->date_added = Carbon::now();
             if($request->hasFile("image")){

                $status->saveImage($request->file("image"));
               

                
             }
             $ticket = \App\Model\Ticket::find($status->ticket_id);
             $ticket->repair_status = ($request->has('detail') ? $request->input("detail"):null);
             $ticket->save();
             $status->save();

             $current_status = \App\Model\CurrentTicketStatus::find($ticket->ticket_id);

             if($current_status == null){

                $current_status = new \App\Model\CurrentTicketStatus();
                $current_status->ticket_id = $ticket->ticket_id;


             }
             $current_status->ticket_id_status = $post['ticket_status_id'];
             $current_status->description = $post['xstatus'];
             $current_status->ticket_detail_id = $status->ticket_detail_id;
             $current_status->save();
             
             if(isset($post['social_email']) && $ticket->user_id != null){

                \Helper::social_email($post['social_email'],$ticket->user_id);
             }
             

             return redirect()->back()->with("success","Status #".$status->ticket_detail_id." has been added !");
        }

        if($type == 'status-update'){
        
            $status = \App\Model\TicketDetail::find($request->input("id"));
            $id = $status->ticket_detail_id;
            if($request->has("delete")){

                $status->deleteImage();
                $status->delete();
                return redirect()->back()->with("danger","Status #".$id." has been deleted !");
               
            }
            return redirect()->back()->with("success","Status #".$id." has been update !");

        }   


    }
    public function monitor(Request $request){

        $filter = [2,9,3];
        $theme = 'webarch';

        $total = \DB::table('tickets')->count();
        $result = [];

        $first = [

            'count' => $total,
            'percent'=> 100,
            'name'=>'All tickets',
            'color'=>'blue',
            'link' => route('admin-ticket-by-type',['type'=>0,'per'=>15])

        ];
        $result [] = $first;
        foreach($this->data['repair_status_options'] as $k=>$m){




            if(!in_array($k,$filter)){

                continue;
            }
            $count = \DB::table("tickets")->where("repair_status",$m)->count();
            $mycolor = $k % 4;
            $data = [
                'count' => $count,
                'percent'=> \Helper::get_percentage($total,$count),
                'name'=>$m,
                'color'=>'white',
                'link' => route('admin-ticket-by-type',['type'=>$k,'per'=>15])
            ];
            $result[] = $data;

        }
        $tickets = \App\Model\Ticket::orderBy('ticket_id','desc')->limit(10)->get();
        $this->data['result'] = $result;
        $this->data['tickets'] = $tickets;
        return view($theme.'.admin.monitor',$this->data);

    }

    public function postInvoiceEdits(Request $request){

        $post = $request->all();
        

        $id = $post['id'];

        $invoice = \App\Model\Invoice::find($post['id']);
        $invoice->status = $post['status'];
        $invoice->save();

        $ticket_id = $invoice->ticket_id;

        if($request->has("delete")){

            $invoice->deleteImage();
            $invoice->delete();

            return redirect()->back()->with('danger','Invoice  #'.$id.' has been deleted !');

        }
        
        return redirect()->back()->with('success','record has been save');
        
        // $ticket = \App\Model\Ticket::find($ticket_id);
        // if(count($ticket->invoices) > 0){

        //     $this->data['ticket'] = $ticket;
        //     $view = \View::make($this->theme.'.partial.table-invoice',$this->data);
        //     echo (string)$view; 

        // }else{

        //     echo (string)'';

        // }
       
       
    }

    public function postInvoiceUpload(Request $request){

        $post = $request->all();
        $invoice = new \App\Model\Invoice();

        if($request->hasFile("FileInput")){

            $invoice->saveImage($request->file('FileInput'));
        }
        
        $invoice->setDate();
       
        $invoice->status = $post['xstatus_option'];
        $invoice->notices = $post['xstatus'];
       
        $invoice->ticket_id = $post['id'];
        $invoice->save();
        // dd($image);   

        $ticket = \App\Model\Ticket::find($post['id']);
        
        $this->data['ticket'] = $ticket;
        $theme = $this->theme;
        $this->data['invoice'] = $invoice;
        $view = \View::make($theme.'.partial.table-row-invoice',$this->data);

        echo $view; 

    }
    public function index(Request $request,$type = 0, $per = 15){

	   //$tickets = \DB::table('tickets')->orderBy('ticket_id', 'desc')->paginate(10);


    	 //$tickets = $this->gettype($type,$per);

        // $tickets = \App\Model\Ticket::has('current_status',)   

        if($type == 'all'){


            $tickets = \App\Model\Ticket::paginate($per);
        }elseif($type == 'nostatus'){

            $tickets = \App\Model\Ticket::doesntHave('current_status')->paginate($per);


        }elseif($type == 'today'){


            $tickets = \App\Model\Ticket::where("ticket_date",'>',  Carbon::now()->subDay() )->paginate($per);


        }else{

             $tickets = \App\Model\Ticket::whereHas('current_status',function($q)use($type){

            $q->where('ticket_id_status',$type);

         })->paginate($per);
        }
         $this->data['ticket_all_count']  =    \App\Model\Ticket::count();
         $this->data['ticket_no_status']  =    \App\Model\Ticket::doesntHave('current_status')->count();
         $this->data['ticket_today'] = \DB::table('tickets')->where("ticket_date",'>',  Carbon::now()->subDay() )->count();    
    	 $this->data['typecolec'] = \Helper::repair_status();

    	 $this->data['tickets'] = $tickets;
    	 $this->data['type'] = $type;
    	 $this->data['per'] = $per;
         $this->data['repair_status_options'] = \Helper::repair_status();
         $theme = $this->theme;
     
    	 return view($theme.'.admin.index',$this->data);
 

    }

    public function tableStatusUpdate(Request $request){


        $post = $request->all();

        if($request->has('status')){

            foreach($post['status'] as $k=>$m){

            $ticket = \App\Model\Ticket::find((int)$k);
            $tiket->repair_status = $m;
            $ticket->save();    
            \App\Model\Ticket::find($k)->update(['repair_status'=>$m]);
           //dd($ticket);

            echo $k.'   '.$m.'<br/>';
        };


        }
        

        //return redirect()->back();

        
    }
    private function gettype($type,$per){

    	$status = 'All';
    	$collec = \Helper::repair_status();

    	/*foreach($collec as $m=>$n){

    		if($m == $type){

    			$status = $n;
    			break;
    		}
    	}*/

        $repair_status = \Helper::repair_status();
    	if($type == '0'){

    		//$tickets = \DB::table('tickets')->orderBy('ticket_id', 'desc')->paginate($per);

            $tickets = \App\Model\Ticket::orderBy('ticket_id','desc')->paginate($per);


    	}elseif ($type == '12'){

            $tickets = \App\Model\Ticket::getToday($per);

        }elseif($type == '13'){


            $tickets = \App\Model\Ticket::whereNotIn('repair_status',$repair_status)->paginate($per);



        }else{

    		//$tickets = \DB::table('tickets')->where('repair_status',$status)->orderBy('ticket_id', 'desc')->paginate($per);
            $tickets = \App\Model\Ticket::orderBy('ticket_id','desc')->where('repair_status',$repair_status[$type])->paginate($per);

    	}
    	return $tickets;

    }
    public function modpriceedit(Request $request){

            $post = $request->all();
            $question = \App\Model\PhoneQuestion::find($request->input('id'));
            

            if($request->has('submit')){

                if($request->input('submit') == 'delete'){

                    $question->deleteImage();
                    $question->delete();


                    return redirect()->back()->with('danger','Question #'.$question->id.' has been deleted');

                }
            }
           // $question = \App\Model\PhoneQuestion::find($request->input('id'));
            //dd($question);

            $question->repair_question = $post['repair_question'];
            $question->question_price = $post['question_price'];

            if($request->hasFile('image')){

                $question->deleteImage();
                $question->saveImage($post['image']);
            }
            $question->save();

            return redirect()->back()->with('success','Question #'.$question->id.' has been edited !');
            

    }

    public function modpriceadd(Request $request,$id){


            $post = $request->all();

            $phonemodel = new \App\Model\PhoneQuestion();
            $phonemodel->repair_question = $post['repair_question'];
            $phonemodel->question_price = $post['question_price'];
            $phonemodel->model = $id;
            $image_path = '';

            if($request->hasFile('image')){

                $image  = \Storage::disk('uploads')->put('questions', $post['image']);
                $image_path = basename($image);


            }
            $phonemodel->brand = '';
            $phonemodel->question_image = $image_path;
            $phonemodel->com = 'no';
            $phonemodel->other_id = '';
            $phonemodel->save();


            return redirect()->back()->with('success','Question #'.$phonemodel->id.' has been added !');
            //dd($phonemodel);


    }

    public function querypricemodel(Request $request,$id){
       
        $theme = $this->theme;
        $this->data['models'] = \App\Model\PhoneModel::where('brand',$id)->paginate(10);
     
        return view($theme.'.admin.query-price-model',$this->data);

    }
    public function queryprice(Request $request){


    	$this->data['brands'] = \App\Model\PhoneBrand::paginate(10);
        $theme = $this->theme;
    	return view($theme.'.admin.queryprice',$this->data);
    }

    public function order(Request $request){


    	$tickets = \DB::table('custom_orders')->orderBy('id', 'desc')->paginate(20);

    	$this->data['orders'] = $tickets;

    	return view('admin.order',$this->data);
    }
}
