@extends('webarch.layouts.app2')





@section('content')
<style>

.text-center{

	text-align: center;
}

.soon-med {
    font-size: 20px;
    line-height: 30px;
}


.color {
    color: #30add1;
}

.soon-big {
    font-size: 60px;
    line-height: 70px;
}

.soon-med {
    font-size: 20px;
    line-height: 30px;
}

</style>
<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:0px">
			<div class="row">
				<div class="col-md-offset-2 col-md-8" style="margin-top:40px">
					<div class="grid simple">
						<div class="grid-title no-border">
							
						</div>
						<div class="grid-body no-border">
							<div class="row">
								<div class="">
								<h2 class="text-center"><a href="{{ route('guest-print',['id'=>$ticket->ticket_id,'post'=>$ticket->postal_code]) }}" target="_blank"><i class="fa fa-print" aria-hidden="true"></i>{{ CLICK_PRINT_TICKET }}</a> </h2>
								<p class="text-center soon-med">{{ TICKET_SUBMITED_SUCCESS}}</p> 
								<p class="text-center soon-big">{{ THANKS }}<span class="color">!!!</span></p>   <br/>

								<p class="soon-small text-center">
                        <span style="font-size:18px; color:red; font-weight:bold;">{{ TICKET_SUBMIT_INSTRUCT }}</span>
                        </p>
                       <p class="soon-med text-center">
                        
						@if($new_user)

                        <a href="{{ route('login') }}">Login</a> with email : {{$email}} . Password: {{$rawPassword}}  to view your ticket.
                        @else
                      
                        <a href="{{ route('login') }}">Login</a> with email : {{$email}}  to view your ticket.
                        @endif
                        

                       </p>    

                       <p class="soon-med text-center">
                        
					
                        Bon nr. # :   {{$ticket->ticket_id}} , Postal Code : {{$ticket->postal_code}}

                       </p>    
                       <p class="text-center soon-med">
                      {!! htmlspecialchars_decode(VISIT_WEBSHOP) !!}
                      </p> 
								</div>
							</div>
						</div>
				</div>

			</div>
		</div>
	</div>

</div>


@endsection