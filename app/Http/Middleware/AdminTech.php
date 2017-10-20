<?php

namespace App\Http\Middleware;

use Closure;

class AdminTech
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

        if($user->isTech()){

            $routeFilter = ['admin-invoice-upload','admin-ticket-edit-quick','admin-invoice-edit','admin-notice-save','admin-ticket-save'];     

            $type = ($request->has("type") ? $request->input("type"):"");

            $resultId = '';
            if($routeName == 'admin-invoice-upload' || ($routeName == 'admin-ticket-edit-quick' && $type == 'status-add')){

                $id = $request->input('id');

                $resultId = $id;

                
            }

            if($routeName == 'admin-ticket-save'){

                $resultId = $request->input('ticket_id');

            }

            if($routeName == 'admin-ticket-edit-quick' && $type == 'status-update'){

                $id = $request->input('id');

                $detail = \App\Model\TicketDetail::find($id);
                $ticket = \App\Model\Ticket::find($detail->ticket_id);

                $resultId = $ticket->ticket_id;
               

            }

            if($routeName == 'admin-invoice-edit'){

                $id = $request->input('id');


                $invoice = \App\Model\Invoice::find($id);
                $ticket = \App\Model\Ticket::find($invoice->ticket_id);

                $resultId = $ticket->ticket_id;
             
                
            }

            if($routeName == 'admin-notice-save'){

                $type = $request->input("type");

                if($type == 'new'){
                    $id = $request->input('tickets_id');

                    $resultId = $id;

                }else{
                    $id = $request->input('id');
                    $notice = \App\Model\Notice::find($id);
                       $ticket = \App\Model\Ticket::find($notice->tickets_id);
                       $resultId = $ticket->ticket_id;

                }
                

            }

            if($routeName == 'admin-model-del'){

                $model = $request->input('data-model');

                if($model != 'notice'){

                    abort(404);
                }
                if($model == 'notice'){

                    $notice = \App\Model\Notice::find($id);
                    $ticket = \App\Model\Ticket::find($notice->tickets_id);


                    if(!$this->belongTo($user->id,$ticket->ticket_id)){

                            abort(404);
                     }

                }
            }
           


            if(in_array($routeName,$routeFilter)){

                        if(!$this->belongTo($user->id,$resultId)){

                                abort(404);
                         }


            }
            


        }

        if($user != null && ($user->isAdmin() || $user->isTech())){

            return $next($request);
        }
        
    }

    private function belongTo($user_id,$id){

        $ticket = \App\Model\Ticket::find($id);

        if($ticket == null){

            return false;
        }
        if($user_id != $ticket->technician_id){

            return false;

        }else{

            return true;

        }

        



    }
}
