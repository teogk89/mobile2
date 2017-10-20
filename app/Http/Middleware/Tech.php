<?php

namespace App\Http\Middleware;

use Closure;

class Tech
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();

        if($user == null){

            return redirect('/');
        }
        $routeName = $request->route()->getName();

        if($routeName == 'tech-ticket-edit' || $routeName == 'tech-ticket-save'){

            $id = $request->route('id');

            if(!$this->belongTo($user->id,$id)){

                abort(404);
            }
           
        }
        

        if($user != null && $user->role == 'tech'){

            //return redirect('/');
            return $next($request);

        }
        
    }


    private function belongTo($user_id,$id){

        $ticket = \App\Model\Ticket::find($id);

        if($user_id != $ticket->technician_id){

            return false;

        }else{

            return true;

        }

        



    }
}
