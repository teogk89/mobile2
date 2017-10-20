<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhoneBrand extends Model
{
    //

    protected $table = 'phonebrands';

    public $folder = 'brands';
    public $timestamps = false;

    public function imageAvailable(){

    	if($this->images == ""){

    		return false;
    	}
    	elseif(\File::exists(public_path().'/images/'.$this->folder.'/'.$this->images)){

    		return true;

    	}else{

    		return false;
    	}
    }

    public function imageUrl(){

        return '/images/'.$this->folder.'/'.$this->images;
    }


    public function deleteImage(){

        if($this->imageAvailable()){

            \File::delete(public_path().'/images/'.$this->folder.'/'.$this->images);
        }
    }

    public function saveImage($file){

        $image  = \Storage::disk('uploads')->put($this->folder, $file);
        $this->images = basename($image);

    }


    public function createNr(){

        $this->nr = md5(sha1(time()*15+mt_rand(55,9999)));
    }
  
}
