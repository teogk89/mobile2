<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    //

    protected $table = "phonemodels";
    public $timestamps = false;

    public $folder = 'phones';
    public function mybrand(){


    	 return $this->belongsTo('App\Model\PhoneBrand', 'brand', 'nr');
    }


    public function questions(){

    	return $this->hasMany('App\Model\PhoneQuestion','model');
    }

    public function imageUrl(){

        return '/images/'.$this->folder.'/'.$this->image;
    }

    public function imageAvailable(){

    	if($this->image == ""){

    		return false;
    	}
    	elseif(\File::exists(public_path().'/images/phones/'.$this->image)){

    		return true;

    	}else{

    		return false;
    	}
    }

    public function deleteAll(){

    	$questions = \App\Model\PhoneQuestion::where("model",$this->id)->get();

    	foreach($questions as $q){

    		$q->deleteImage();
    		$q->delete();
    	}
    	$this->deleteImage();
    	$this->delete();

    }
    public function deleteImage(){

    	if($this->imageAvailable()){

    		\File::delete(public_path().'/images/phones/'.$this->image);
    	}
    }

    public function saveImage($file){

    	$image  = \Storage::disk('uploads')->put('phones', $file);
        $this->image = basename($image);

    }


    public function countQuestions(){

    	   return \DB::table('phonerepair')->where('model',$this->id)->groupby('model')->count();
    	

    }


    
}
