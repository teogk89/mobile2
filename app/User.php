<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Mailgun\Mailgun;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //protected $table = 'ticket_users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $rawPassword = null;
    public function isAdmin(){

        return ($this->role == 'admin' ? true:false);
    }

    public function isTech(){

        return ($this->role == 'tech' ? true:false);

    }

    public function isUser(){

        return ($this->role == 'user' ? true:false);

    }

    public function isSubShop(){

        return ($this->role == 'subshop' ? true:false);

    }



    public function address(){

       
        return $this->hasOne('App\Model\UserAddress','user_id','id');

    }

    public function sendFacebook(){

        if($this->address == null){

            return false;
        }

        elseif($this->address->invited_facebook == 'yes'){

            return true;
        }else{

            return false;
        }

    }

    public function sendSocial($type){

        if($this->address == null){

            return false;
        }

        elseif($this->address->$type == 'yes'){

            return true;
        }else{

            return false;
        }

    }

    public function sendSocialAll(){

        if($this->address == null){

            return false;
        }
        elseif($this->address->invited_twitter == 'yes' && $this->address->invited_facebook == 'yes' && $this->address->invited_googleplus == 'yes'){

            return true;
        }else{

            return false;
        }
    }

    public function sendEmailSocial($type){

        $api = env('MAILGUN_SECRET');
        $domain = env('MAILGUN_DOMAIN');

        $mgClient = new Mailgun($api);

        $data = [];

        $data['email'] = $this->email;
        
        $subject = '';

        $setting = \App\Model\Setting::find(1);
        $content = '';

        $add = \App\Model\UserAddress::where("user_id",$this->id)->first();

        if($add == null){

            $add = new \App\Model\UserAddress();
            $add->user_id = $this->id;
        }
        if($type == 'facebook'){

            $subject = $setting->facebook;
            $content = $setting->facebook_message;
        
            $add->invited_facebook = 'yes';

        }elseif($type == 'google'){

            $subject = $setting->googleplus;
            $content = $setting->googleplus_message;

            $add->invited_googleplus = 'yes';


        }elseif($type == 'twitter'){

            $subject = $setting->twitter;
            $content = $setting->twitter_message;
            
            $add->invited_twitter = 'yes';

        }else{

            $subject = 'Repair Ticket System v2.0b';
            $content = $setting->allsocials_message;
            $add->invited_all = 'yes';

        }
        $content = array(
            'from'    => 'admin@'.$domain,
            'to'      => $this->email,
           
            'subject' => $subject,
          //  'text'    => 'Testing some Mailgun awesomness!',
            'html'    => $content
        );

        $result =  $mgClient->sendMessage($domain,$content);

        $add->save();

        return $result;


    }

    public function sendEmail(){

        $api = env('MAILGUN_SECRET');
        $domain = env('MAILGUN_DOMAIN');

        $mgClient = new Mailgun($api);

        $data = [];

        $data['email'] = $this->email;
        $data['rawPassword'] = $this->rawPassword;
        $content = array(
            'from'    => 'admin@'.$domain,
            'to'      => $this->email,
           
            'subject' => 'Your account has been create at '.env('APP_URL'),
          //  'text'    => 'Testing some Mailgun awesomness!',
            'html'    => view('email.new-user',$data)->render()
        );

        $result =  $mgClient->sendMessage($domain,$content);

        return $result;

    }

    public function createPassword(){

        $length = 10;

        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $this->rawPassword = $randomString;

        $this->password = \Hash::make($randomString);
        
    }
    public function getRawPassword(){

        return $this->rawPassword;
    }

    public function tickets(){


         return $this->hasMany('App\Model\Ticket','user_id');
    }

    public function clearTicket(){

        foreach($this->tickets as $t){

            $t->user_id = null;
        }

    }

    public function clearTech(){

        foreach($this->tickets as $t){

            $t->technician_id = null;
        }

    }
    public function tech(){

        return $this->hasMany('App\Model\Ticket','technician_id');

    }

    


}
