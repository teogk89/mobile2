<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhoneQuestion extends Model
{
    //


    protected $table = "phonerepair";
    public $timestamps = false;

    protected $fillable = ['question_price','repair_question'];

    public $folder = 'questions';

    public function imageAvailable(){

    	if($this->question_image == ""){

    		return false;
    	}
    	elseif(\File::exists(public_path().'/images/questions/'.$this->question_image)){

    		return true;

    	}else{

    		return false;
    	}
    }

    public function imageUrl(){

        return '/images/'.$this->folder.'/'.$this->question_image;
    }

    public function deleteImage(){

    	if($this->imageAvailable()){

    		\File::delete(public_path().'/images/questions/'.$this->question_image);
    	}
    }

    public function saveImage($file){

    	$image  = \Storage::disk('uploads')->put('questions', $file);
        $this->question_image = basename($image);

    }
}
