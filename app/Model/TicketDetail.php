<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class TicketDetail extends Model
{
    //

	public $timestamps = false;
	protected $table = "tickets_details";


	protected $primaryKey = 'ticket_detail_id';

	public $folder = 'ticketstatus';

	public function deleteImage(){

        if($this->imageAvailable()){

            \File::delete(public_path().'/images/'.$this->folder.'/'.$this->ticket_file);
        }
    }

    public function imageUrl(){

        return '/images/'.$this->folder.'/'.$this->ticket_file;
    }

     public function saveImage($file){

        $image  = \Storage::disk('uploads')->put($this->folder, $file);

       
       // $this->file_type = \File::extension($image);
        $this->ticket_file = basename($image);

    }

    public function imageAvailable(){

        if($this->ticket_file == ""){

            return false;
        }
        elseif(\File::exists(public_path().'/images/'.$this->folder.'/'.$this->ticket_file)){

            return true;

        }else{

            return false;
        }
    }

    public function getDateAdded(){


        $date  = new Carbon($this->date_added);

        return $date->format('D,d M Y H:i');
        
    }

 

}