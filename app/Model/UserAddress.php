<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $table = "user_address";

    public $timestamps = false;



    protected $fillable = ['address','str_nr','postcode','country','gender','city','phone'];
    public function user()
    {
       return $this->hasOne('App\User', 'user_id', 'id');
    }


    public function dataFromRequest($post){

        if(isset($post['residence'])){

            $this->address = $post['residence'];
        }

        if(isset($post['address'])){

          $this->address = $post['address'];
        }

         if(isset($post['city'])){

          $this->city = $post['city'];
        }

         if(isset($post['str_nr'])){

          $this->str_nr = $post['str_nr'];
        }

        if(isset($post['city'])){

          $this->city = $post['city'];
        }
        if(isset($post['street_nr'])){

             $this->str_nr = $post['street_nr'];
        }

        if(isset($post['postal_code'])){

              $this->postcode = $post['postal_code'];
        }

        if(isset($post['gender'])){

             $this->gender = $post['gender'];
        }

         if(isset($post['country'])){

             $this->country = $post['country'];
        }
    	
      
       
       
    }
}
