@extends('basic.layouts.app')


@section('content')
<div class="span12">
                     <div class="csoon-page">
                     
                      <h2><a 
                      href="" 
                      target="_blank"><i class="icon-print"></i>{{ CLICK_PRINT_TICKET }}</a> </h2><br/>
                      
                        <p class="soon-med">{{ TICKET_SUBMITED_SUCCESS}}</p>                        
                        <p class="soon-big">{{ THANKS }}<span class="color">!!!</span></p>   <br/>                     
                        <p class="soon-small">
                        <span style="font-size:18px; color:red; font-weight:bold;">{{ TICKET_SUBMIT_INSTRUCT }}</span>
                        </p>
                       <p class="soon-med">
                        
                        @if($new_user)

                        <a href="/login">Login</a> with email : <a href="/login">{{$email}}</a> . Password:<a href="/login"> {{$rawPassword}}</a> to view your ticket.
                        @else
                      
                        <a href="/login">Login</a> with email : <a href="/login">{{$email}}</a>  to view your ticket.
                        @endif


                       </p>    
                       <p class="soon-med">
                      {!! htmlspecialchars_decode(VISIT_WEBSHOP) !!}
                      </p> 
                        </div>
                     </div>
                  </div>
</div>
@endsection