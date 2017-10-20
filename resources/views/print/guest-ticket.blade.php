@extends('print.app')


@section('content')
<div class="container" style="margin-top:20px;padding-bottom:20px">
  <div class="row">				
    <div class="span11">
        <div class="pull-left">
          <img class="img-responsive" style="height:74px" src="{{ url(\Helper::logoPath()) }}" >
        </div>

        <div class="pull-right" style="font-size:11px; font-weight:bold; letter-spacing:2px;">
          {!!  nl2br($shop->receipt_adds) !!}
          <br/>
          <br/>

          @if($ticket->teach != null)
          <span style="font-size:14px; font-weight:bold; font-style:italic; color:green; letter-spacing:2px;">You are helped by {{ ucfirst($ticket->teach->name) }} </span> 

          @endif
          <span style="font-size:14px; font-weight:bold; font-style:italic; color:red; letter-spacing:2px;">
                {{YOUR_BON_NR}} {{ $ticket->ticket_id }}
          </span>
        </div>
    </div>
    <div class="span11"> 
		  <form class="form" method="post" enctype="multipart/form-data" id="ticket-form" target="_self" action="" novalidate="novalidate">
        <fieldset>
                                   
        <div class="respond hero span10">

                                
                                  <img class="pull-right" style="margin-top:10px; margin-bottom:15px;" src="data:image/png;base64,{!!  $barcode !!}" alt="Barcode Image">
                                  <div class="span4">
                                   <span class="" style="color:#000000; font-size:18px; ">
                                    <img src="{{ url('basic/template/img/user.png') }}"> {{CUSTOMER_INFORMATION}} <br/><br/>
                                    </span>
                                    
                                    <span style="font-size:9px; letter-spacing:1px;">(Open date: {{ $ticket->ticket_date}})</span>
                                    @if($ticket->repair_date != null && $ticket->repair_date != "")
                                    <br/>
                                    <span style="font-size:9px; letter-spacing:1px;">(Repair date: {{ $ticket->repair_date }})</span>
                                    @endif 
                                  </div>
        </div>
                                    <div class="span11"> 

                                    </div>
                                    <div class="control-group  span4">
                                         <label class="control-label" for="name" >{{ CUSTOMER_NAME }}</label>
                                         <div class="inputs">{{ $ticket->name }}</div>
                                    </div>
                                       
                                      @if($ticket->gender != null && $ticket->gender != '')
                                      <div class="control-group span3">
                                         <label class="control-label" for="gender">{{CUSTOMER_GENDER}}</label>
                                         
                                          <div class="inputs">Dhr.</div>
                                   
                                      </div>

                                      @endif
                                      
                                       
                                      <div class="span11">
                                        <hr/> 
                                      </div>
                                       <!------------>
                                      <div class="control-group span4">
                                         <label class="control-label" for="residence">{{CUSTOMER_ADDRESS}}</label>
                                          <div class="inputs" style="min-width:180px;">{{ $ticket->address }}&nbsp; {{$ticket->street_nr}}</div>
                                      </div>
                                      <br/>
                                      <br/>
                                       
                                       
                          <div class="control-group pull-left span3">
                          
                                        <label class="control-label" for="city">{{CITY}}</label>
                                           
                                            <div class="short-inputs" >{{$ticket->city}}</div>
                          </div>
                                         
                           
                          
                          <div class="control-group span3">
                          
                                        <label class="control-label" for="country">Land</label><div class="short-inputs">{{ $ticket->country}}</div>
                          
                          </div>
                                         
                          
                          
                          
                         <div class="span11"> <hr/> </div>
                         
                          
                          <div class="control-group span3">
                          
                                        <label class="control-label" for="zipcode">{{POSTAL_CODE}}</label>
                                          <div class="inputs">{{$ticket->postal_code}}</div>
                                         </div>
                                         
                          

                                      <div class="control-group span3">
                                         <label class="control-label" for="phone">{{PHONE_NUMBER}}</label>
                                           
                                            <div class="inputs">{{$ticket->phone_number}}</div>
                                      </div>
                                       
                                       
                                      <div class="control-group span4">
                                         <label class="control-label" for="email">{{EMAIL_ADDRESS}}</label>
                                           
                                            <div class="auto-inputs">{{$ticket->email_address}}</div>
                                      </div>
                                       
          
                                    <div class="respond hero span11">
                                      <div class="span3">
                                        <span class="" style="color:#000000; font-size:18px;">
                                          <img src="{{ url('basic/template/img/mobile.png') }}"> {{REPAIR_ITEM_INFORMATION}}
                                        </span>
                                        <br/>
                                        <br/>
                                      </div>
                                    </div>
                                    <div class="span11">
                                      <hr/> 
                                    </div>
                                    @if($ticket->user_code != null && $ticket->user_code == '')

                                    <div class="control-group span3">
                          
                                      <label class="control-label" for="user_code">{{USER_CODE}}</label>
                                        
                                      <div class="controls">
                           
                                        <div class="inputs">{{$ticket->user_code}}
                                        </div>
                         
                                      </div>    
                                    </div>

                                    @endif
                                    

                           @if($ticket->icloud_code != null && $ticket->icloud_code != '')         
                          <div class="control-group span4">
                          
                            <label style=" margin-left: 20px; " class="control-label" for="icloud_code">{{ICLOUD_MAIL_PASS}}</label>
                                        
                            <div class="controls">
                              <div class="auto-inputs">{{ $ticket->icloud_code }}</div>
                   
                            </div>
                          </div>
                          @endif
                          
                          <div class="span11">
                            <hr/> 
                          </div>
                          <div class="control-group span3">
                                         <label class="control-label" for="warranty">{{WARRANTY}}</label>

                                         @if($ticket->warranty == 'YES')
                                         <div class="inputs">{{YES}}</div>
                                         @else
                                         <div class="inputs">{{NO}}</div>
                                         @endif 
                                         
                          </div>

                          @if($ticket->warranty == "YES")
                          <div class="warranty_info" style="display:none;">
                              <div class="control-group span3">
                                 <label class="control-label" for="warranty_date_order">{{WARRANTY_DATE_ORDER}}</label>
                                 <div class="inputs">{{$ticket->warranty_date_order}}</div>
                              </div>
                                       
                                    
                                       <!------------>
                              <div class="control-group span3">
                                 <label class="control-label" for="warranty_date_order2">{{WARRANTY_UNTIL}}</label>
                                 <div class="inputs">{{$ticket->warranty_until}}</div>
                              </div>
                                         
                              <br/>
                              <br/>
                                      
                              <div class="span12 auto-inputs" style="font-size:11px;">                        
                                Stuur een aankoopbon mee. Anders zullen wij buiten garantie in behandeling nemen. En onderzoek kosten in rekening brengen 
          	                 </div>
                          </div>
                          @endif
          	
          			     <div class="span11"> 
                          <hr/> 
                      </div>             
                      <div class="control-group span4">
                          
                                        <label class="control-label" for="only_research">{{ONLY_RESEARCH}}</label>
                                        @if($ticket->only_research == "YES")
                                        <div class="inputs">{{YES}}</div>
                                        @else
                                        <div class="inputs">{{NO}}</div>
                                        @endif
                                        
                      </div>
                                         
                          
                          
                      <div class="control-group span5">
                          
                        <label class="control-label" for="inform_price" style="font-size:12px;">{{INFORM_PRICE }}</label>

                        @if($ticket->inform_price == "YES")
                                        <div class="inputs">{{YES}}</div>
                        @else
                                        <div class="inputs">{{NO}}</div>
                        @endif
                                      
					            </div>
                      @if(FULL_VERSION)
                      <div class="span11"> <hr/> </div>
                      <div class="control-group span4">
                          
                            <label class="control-label" for="ordered_from">{{ORDERED_FROM}}</label>

                            <div class="inputs">{{$ticket->ordered_from}}</div>
                      </div>

                        @if($ticket->ordered_from_other != null)
                          <div class="ordered_from_other">
                          <div class="control-group span4">
                           <label class="control-label" for="order_other">{{ORDERED_FROM_OTHER}}</label>
                           
                           <div class="inputs">{{$ticket->ordered_from_other}}</div>
                           
                          </div>
                          </div> 
                          @endif

                          <div class="span11"> <hr/> </div>
                            <div class="control-group span4">
                          
                          <label class="control-label" for="casco">{{CASCO}}</label>
                        
                        
                          @if( $ticket->casco == 'YES')
                                        <div class="inputs">{{YES}}</div>
                                        <div class="inputs">{{$ticket->casco_options }}</div>
                          @else
                                        <div class="inputs">{{NO}}</div>
                          @endif
                        </div>
                         @if( $ticket->casco_other != null && $ticket->casco_other != '')
                         <div class="casco_other">
                          <div class="control-group span2">
                           <label class="control-label" for="casco_other">{{ OTHER }}</label>          
                           <div class="inputs">{{$ticket->casco_other }}</div>
                          </div>
                        </div>
                        @endif 
                        <div class="span12"></div>
                          @if($ticket->pickup_date != '0000-00-00' || $ticket->pickup_date != '' || $ticket->pickup_date != null)
                        <div class="control-group span5">
                          
                          <label class="control-label" for="pickup">{{PICKUP}}</label>
                        
                          <div class="controls">
                            <div class="inputs">{{ YES }}</div>
                          </div>
      
                        </div>

                        <div class="pickups span4">
      
                                      <label class="control-label" for="pickup_date">{{PICKUP_DATE}}</label>
                                      
                                                        <div class="controls">
                                      <div class="short-inputs">{{ $ticket->pickup_date}}</div>
                                      </div>
                                      
                                                        
                                                        
                                                        <div class="span12">
                                       <span id="pickup_time" style="font-size:12px;">{{PICKUP_TIME}} {{$ticket->pickup_time}} 
                                       <br/><br/>
                                       {{nl2br(PICKUP_INFO)}}
                                       </span>
                                      </div>


                        </div>

                        @endif

                      @endif
                      <!-- End full version !-->
                          
                        
                          
                          
                          
                          
                      
                        
                        
                      <br/>

                       
                        

                      
                        



    </div></div><div class="span11" style="margin-top:55px;"> <hr/> </div>
                         
                            <div class="control-group span3">
                          
                        <label class="control-label" for="phone_model">{{PHONE_MODEL}}</label>
                        
                        <div class="inputs">{{$ticket->phone_model}}</div>
                     
                        </div>   
                          
                        
                        <div class="control-group span3">
                          
                        <label class="control-label" for="phone_modelex">{{PHONE_TYPE}}</label>
                        
                        <div class="inputs">{{ $ticket->phone_type}}</div>
                        </div>   
                              
                        
                        <div class="control-group span3">
           
                        <label class="control-label" for="imei_number">
                    	{{IMEI_NUMBER}}
                        </label>
                        
                        <div class="inputs">{{$ticket->imei_number}}</div>
                        
                        </div> 

                        @if($ticket->repair_cost != null && $ticket->repair_cost != "")

                        <div class="control-group span3">
           
                        <label class="control-label" id="repair_cost" for="repair_cost">
                        {{REPAIR_COST}}
                        </label>
                        
                        
                        <div class="inputs">{{ $ticket->repair_cost }}</div>

                        
                        </div>
                        @endif
                        <div class="span11">  </div>
                                       
                        <div class="control-group span3.3">
           
                        <label class="control-label" for="reason">
                        {{REASON}}
                        </label>
                       
                        
                        <div class="text-inputs">{{$ticket->reason}}</div>
                        </div><div class="control-group span6">
                        <span style="margin-left:60px;" >Barcode IMEI/SN nummer </span><br/>

                                     <img class="pull-right" style="margin-top:10px;" src="data:image/png;base64,{!!  $barcode_imei !!}" alt="Barcode Imei">
     
                        
                        </div><div class="span11">  </div>   
                        
                        <div class="control-group span11">
                          
                        <label class="control-label" for="extra_parts[]">Accessoires als wordt mee geleverd</label>
                        
                        <?php
                          $list = $ticket->extraPartToArray();
                        ?>

                        @foreach($extra_parts_array as $ex)

                          @if(in_array($ex,$list))
                          <b>[x]</b>{{$ex }} &nbsp;&nbsp;&nbsp;

                          @else

                          {{ '[' }} {{ ']'}} {{$ex }} &nbsp;&nbsp;&nbsp;

                          @endif


                        @endforeach
                      
                        @if($ticket->extra_parts_other != null && $ticket->extra_parts_other != '')

                        <b>[x]</b>{{EXTRA_PARTS_OTHER}} -> <b>{{ $ticket->extra_parts_other }}</b>
                        @else
                        [ ] {{EXTRA_PARTS_OTHER}} &nbsp;&nbsp;&nbsp;
                        @endif

                      </div><div class="span11"> <hr/> </div> 
<div class="content main-box entry span11"><b>{{AGREEMENT}} :</b> <br/> <p>{!! nl2br($shop->agreement) !!}</p></div><div class="span10" style="font-size:12px;  margin-top:30px;" ><br/>

{{SIGNATURE}} _____________________________ 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
{{SIGNATURE_DATE}}  __________________

</div>

@endsection