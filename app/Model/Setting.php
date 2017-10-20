<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    public $folder = 'setting';

    public $timestamps = false;

    protected $fillable = ['shop_address','receipt_adds','shop_email','	phone_nr','agreement','facebook','facebook_message','twitter','twitter_message','googleplus','googleplus_message','allsocials_message'];


    public function imageAvailable(){

    	if($this->images == ""){

    		return false;
    	}
    	elseif(\File::exists(public_path().'/images/'.$this->folder.'/'.$this->logo)){

    		return true;

    	}else{

    		return false;
    	}
    }

    public function imageUrl(){

        return '/images/'.$this->folder.'/'.$this->logo;
    }


    public function deleteImage(){

        if($this->imageAvailable()){

            \File::delete(public_path().'/images/'.$this->folder.'/'.$this->logo);
        }
    }

    public function saveImage($file){

        $image  = \Storage::disk('uploads')->put($this->folder, $file);
        $this->logo = basename($image);

    }
}
