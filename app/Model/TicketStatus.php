<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    //
    public $timestamps = false;
    public $table = "ticket_status";

    protected $fillable = ['startus','description','colors'];
}