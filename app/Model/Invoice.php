<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Invoice extends Model
{
    //
     /**
     *
     *		* Select table
     *
     */
    protected $fillable = ['status'];
    protected $table = "invoice_status";

    public $folder = 'invoices';

    public function setDate(){

    	$date = new \DateTime();

    	$this->date_add = $date->format("Y-m-d");
    	
    }
    public $timestamps = false;



    public function imageUrl(){

        return '/images/'.$this->folder.'/'.$this->file;
    }

    public function saveImage($file){

        $image  = \Storage::disk('uploads')->put($this->folder, $file);

       
        $this->file_type = \File::extension($image);
        $this->file = basename($image);

    }
    public function deleteImage(){

        if($this->imageAvailable()){

            \File::delete(public_path().'/images/'.$this->folder.'/'.$this->file);
        }
    }
    public function imageAvailable(){

        if($this->file == ""){

            return false;
        }
        elseif(\File::exists(public_path().'/images/'.$this->folder.'/'.$this->file)){

            return true;

        }else{

            return false;
        }
    }

    public function getDateAdded(){


        $date  = new Carbon($this->date_add);

        return $date->format('D,d M Y');
        
    }
}
