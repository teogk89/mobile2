<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $timestamps = false;

    protected $table = 'custom_orders';

   

    protected $fillable = ['item_name','customer','phone','item_price','date_order','deliver_date'];
}
