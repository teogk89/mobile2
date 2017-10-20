<?php



?>
<div class="clearfix"></div>
<form action="{{ $url }}" method="POST">
<input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id}}"/>

{!! csrf_field() !!}

@if($view_only)
<div class="row">
		<div class="col-md-12 ">
			<div class="form-group pull-right">
				 <a href="{{ route('guest-print',['id'=>$ticket->ticket_id,'post'=>$ticket->postal_code]) }}"><button type="button" class="btn btn-success btn-cons"><i class="fa fa-print"></i>&nbsp;&nbsp;<span class="bold">Print pagina</span></button></a>
			</div>
		</div>
		
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<h3><?php echo CUSTOMER_INFORMATION ?></h3>
	</div>
</div>
<div class="row">


	<div class="col-md-3">
		<div class="form-group">
                        <label class="form-label">{{ CUSTOMER_NAME }}</label>
                        <span class="help"></span>
                        <div class="controls">
                          <input name="name" {!! $input !!} class="form-control" required type="text" value="<?php
						                  	// set value for the name field
						            if(isset($user->name)){

						              echo old('name',$user->name);


						            }elseif(isset($ticket->name)){

						              echo old('name',$ticket->name);

						            }else{

						              echo old('name');
						            }


                           ?>">
                        </div>
                      </div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
                        <label class="form-label">{{CUSTOMER_GENDER }}</label>
                        <span class="help"></span>
                        <div class="controls">
                        	<select {!! $input !!} name="gender" id="gender" required class="submit form-control" data-submit="<?php

						          if(isset($user->gender)){

						            echo old('gender',$user->gender);
						          }elseif(isset($ticket->gender)){

						            echo old('gender',$ticket->gender);

						          }else{

						            echo old('gender');
						          }
						        
						        ?>">
          						<option value="" disabled>{{SELECT}}</option>  
           						<option value="MALE" selected="selected">{{MALE}}</option>
          						<option value="FEMALE" >{{FEMALE}}</option>
        					</select>		
                        
                        </div>
                      </div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
                        <label class="form-label">{{ POSTAL_CODE }}</label>
                        <span class="help"></span>
                        <div class="controls">
                          <input {!! $input !!} type="text" class="form-control" name="postal_code" id="zipcode" maxlength="6" value="<?php

                      if(isset($address->postcode)){

                        echo old('postal_code',$address->postcode);
                      }elseif(isset($ticket->gender)){

                        echo old('postal_code',$ticket->postal_code);

                      }else{

                        echo old('postal_code');
                      }

                  

                    ?>">
                        </div>
        </div>
	</div>
	@if(!$view_only)
	<div class="col-md-3">
		<div class="form-group">
			<label style=" visibility: hidden;" class="form-label">asdfas</label>
			<span class="help"></span>
			<div class="controls">
				<button class="btn btn-primary" onclick="getAddress(this,event)" data-url="{{route('common-api')}}" data-ajax-text="Finding" >Auto Address</button>
			</div>
		</div>
	</div>
	@endif
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ CUSTOMER_ADDRESS }}</label>
			<span class="help"></span>
			<div class="controls">
				<input type="text" {!! $input !!} class="form-control required" name="residence" id="residence" value="<?php

			          if(isset($address->address)){

			            echo old('residence',$address->address);

			          }elseif(isset($ticket->address)){

			            echo old('residence',$ticket->address);

			          }else{

			            echo old('residence');
			          }
   

         ?>"/>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{CITY}}</label>
			<span class="help"></span>
			<div class="controls">
				<input {!! $input !!} type="text" class="form-control" 
                     name="city" id="city" value="<?php

                      if(isset($address->city)){

                        echo old('city',$address->city);
                      }elseif(isset($ticket->city)){

                        echo old('city',$ticket->city);

                      }else{

                        echo old('city');
                      }
                    
                    ?>">
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ COUNTRY }}</label>
			<span class="help"></span>
			<div class="controls">
				 <select {!! $input !!} name="country" id="country" class="form-control submit" data-submit="<?php

		            if(isset($address->country)){

		              echo old('country',$address->country);
		            }elseif(isset($ticket->country)){

		              echo old('country',$ticket->country);

		            }else{

		              echo old('country');
		            }

          ?>">
            <option value="" selected="selected">{{ SELECT }}</option>';
              @foreach($countries as $val)
                <option value="{{ $val }}">{{ $val }}</option>
              @endforeach                               
          </select>        
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ STREET_NR }}</label>
			<span class="help"></span>
			<div class="controls">
				<input {!! $input !!}  class="form-control required" name="street_nr" id="street_nr" type="text" value="<?php

          if(isset($address->str_nr)){

            echo old('str_nr',$address->str_nr);
          }elseif(isset($ticket->street_nr)){

            echo old('str_nr',$ticket->street_nr);

          }else{

            echo old('str_nr');
          }

         ?>" 
         >
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ PHONE_NUMBER }}</label>
			<span class="help"></span>
			<div class="controls">
				 <input {!! $input !!} required class="form-control required" name="phone"  id="phone" value="<?php

        if(isset($address->phone)){

          echo old('phone',$address->phone);
        }elseif(isset($ticket->phone_number)){

          echo old('phone',$ticket->phone_number);

        }else{

          echo old('phone');
        }

       ?>">
			</div>	
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{  EMAIL_ADDRESS }} </label>
			<span class="help"></span>
			<div class="controls">
				 <input {!! $input !!} required class="form-control required" name="email"   value="<?php

        if(isset($user->email)){

          echo old('email',$user->email);
        }elseif(isset($ticket->email_address)){

          echo old('email',$ticket->email_address);

        }else{

          echo old('email');
        }


       ?>">
			</div>	
		</div>
	</div>
</div>

@if(Auth::check())
	@if(Auth::user()->isAdmin() && $view_only == true)

		@include("webarch.partial.my-map")
		
	@endif
@endif
<div class="row">
	<div class="col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3>{{REPAIR_ITEM_INFORMATION}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ USER_CODE }}</label>
			<span class="help"></span>
			<div class="controls">
					 <input {!! $input !!} type="text" required class="form-control" name="user_code" id="user_code" value="<?php

       if(isset($ticket->user_code)){

          echo old('user_code',$ticket->user_code);
       }
       else{

         echo old('user_code');
       }


      

       ?>">
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ ICLOUD_MAIL_PASSWORD }}</label>
			<span class="help"></span>
			<div class="controls">
				 <input {!! $input !!} class="form-control" required type="text" name="icloud_code" id="icloud_code" value="<?php

                            if(isset($ticket->icloud_code)){

                                echo old('icloud_code',$ticket->icloud_code);
                             }
                             else{

                               echo old('icloud_code');
                             }

                           ?>">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ WARRANTY }}</label>
			<span class="help"></span>
			<div class="controls">
				 <select {!! $input !!} required name="warranty" data-show="YES" data-object-class="warranty_info" id="warranty" class="select form-control submit preShow" data-submit="<?php

          if(isset($ticket->warranty)){

              echo old('warranty',$ticket->warranty);
           }
           else{

             echo old('warranty');
           }

        ?>" >
          <option value="">{{ SELECT }}</option>
          <option value="YES">{{ YES }}</option>
          <option value="NO">{{ NO }}</option>
        </select>
			</div>
		</div>
	</div>
	<div class="col-md-3 warranty_info" style="display:none">
		<div class="form-group">
			<label class="form-label">{{ WARRANTY_DATE_ORDER }}</label>
			<span class="help"></span>
			<div class="controls">
				 <input {!! $input !!} type="text" data-date-format="D, M dd, yyyy" class="hasDatepicker form-control"  name="warranty_start" value="<?php

          if(isset($ticket->warranty_date_order)){

              echo old('warranty_start',$ticket->warranty_date_order);
          }
          else{

             echo old('warranty_start');
          }

         ?>" id="warranty_date_order"/>
			</div>
		</div>
	</div>
	<div class="col-md-3 warranty_info" style="display:none">
		<div class="form-group">
			<label class="form-label">{{ WARRANTY_UNTIL }}</label>
			<span class="help"></span>
			<div class="controls">
				<input {!! $input !!}  type="text" data-date-format="D, M dd, yyyy" class="hasDatepicker form-control"  name="warranty_end" value="<?php 

          if(isset($ticket->warranty_until)){

              echo old('warranty_end',$ticket->warranty_until);
          }
          else{

             echo old('warranty_end');
          }

           ?>{{ old('warranty_end') }}" id="warranty_date_order2">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12"> {{ WARRANTY_SALES_SLIP }}</div>
</div>
<br/>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ ONLY_RESEARCH }}</label>
			<span class="help"></span>
			<div class="controls">
				 <select required {!! $input !!} name="only_research" data-submit="<?php

                                                  if(isset($ticket->only_research)){

                                                      echo old('only_research',$ticket->only_research);
                                                   }
                                                   else{

                                                     echo old('only_research');
                                                   }


                                           ?>" id="only_research" class="submit form-control">
                                           <option value="">{{ SELECT }}</option>
          <option value="YES">{{ YES }}</option>
          <option value="NO">{{ NO }}</option>
          </select>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ INFORM_PRICE }}</label>
			<span class="help"></span>
			<div class="controls">
				   <select  {!! $input !!} required name="inform_price" id="inform_price" class="select required valid submit form-control" data-submit="<?php

                 if(isset($ticket->inform_price)){

                    echo old('inform_price',$ticket->inform_price);
                 }
                 else{

                   echo old('inform_price');
                 }

          ?>">
            <option selected="selected" value="YES">{{ YES }}</option>
            <option value="NO">{{ NO }}</option>
          </select>
			</div>
		</div>
	</div>
</div>

@if(FULL_VERSION)
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ ORDERED_FROM }}</label>
			<span class="help"></span>
			<div class="controls">
				<select required data-show="Andere" data-object-class="ordered_from_other" {!! $input !!} name="ordered_from" id="ordered_from" class="form-control submit preShow" data-submit="<?php

               if(isset($ticket->ordered_from)){

                    echo old('ordered_from',$ticket->ordered_from);
                 }
                 else{

                   echo old('ordered_from');
                 }


          ?>">
            <option value="">{{ SELECT }}</option>';
            @foreach($ordered_from_options as $option)
              <option value="{{ $option }}">{{ $option }}</option>
            @endforeach              
          </select>
			</div>
		</div>
	</div>
	<div class="col-md-3 ordered_from_other" style="display:none;">
		<div class="form-group">
			<label class="form-label">{{ ORDERED_FROM_OTHER }}</label>
			<span class="help"></span>
			<div class="controls">
				<input {!! $input !!} type="text" class="form-control"  name="order_other" id="order_other" value="<?php
         

               if(isset($ticket->ordered_from_other)){

                    echo old('order_other',$ticket->ordered_from_other);
                 }
                 else{

                   echo old('order_other');
                 }


          

            ?>">
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{CASCO}}</label>
			<span class="help"></span>
			<div class="controls">
				 <select   {!! $input !!} required name="casco" id="casco" data-show="YES" data-object-class="casco_options" class="form-control submit preShow" data-submit="<?php

             if(isset($ticket->casco)){

                echo old('casco',$ticket->casco);
             }
             else{

               echo old('casco');
             }

          ?>">
            <option value="">{{SELECT }}</option>
            <option value="YES">{{YES }}</option>
            <option value="NO">{{NO }}</option>    
          </select>
			</div>
		</div>
	</div>
	<div class="col-md-3 casco_other" style="display:none;">
		<div class="form-group">
			<label class="form-label">{{OTHER}}</label>
			<span class="help"></span>
			<div class="controls">
				 <input {!! $input !!}  type="text" class="form-control"  name="casco_other" id="casco_other" value="<?php

                            if(isset($ticket->casco_other)){

                                  echo old('casco_other',$ticket->casco_other);
                               }
                               else{

                                 echo old('casco_other');
                            }


                           ?>"  class="required">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-offset-6 col-md-3">
		<div class="form-group">
			<label class="form-label"></label>
			<span class="help"></span>
			<div class="controls">
				<select {!! $input !!} data-show="Andere" data-object-class="casco_other" name="casco_options" style="display:none;" data-submit="<?php

          if(isset($ticket->casco_options)){

                echo old('casco_options',$ticket->casco_options);
             }
             else{

               echo old('casco_options');
          }

        ?>" id="casco_options" class="submit form-control casco_options preShow">
          <option value="">{{SELECT }}</option>'
          @foreach($casco_options_array as $option)
          <option value="{{ $option }}">{{ $option }}</option>
          @endforeach      
        </select>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{PICKUP}}</label>
			<span class="help"></span>
			<div class="controls">
				  <select {!! $input !!} data-show="YES" data-object-class="pickups" name="pickup" id="pickup" class="form-control submit preShow" data-submit="<?php

                                  if(isset($ticket->pickup)){

                                      echo old('pickup',$ticket->pickup);
                                   }
                                   else{

                                     echo old('pickup');
                                   }


                        ?>">
      <option value="">{{SELECT}}</option>
      <option value="YES">{{YES}}</option>
      <option value="NO">{{NO}}</option>  
      </select>
			</div>
		</div>
	</div>
	
	<div class="col-md-3 pickups">
		<div class="form-group">
			<label class="form-label">{{PICKUP_DATE}}</label>
			<span class="help"></span>
			<div class="controls">
				<input {!! $input !!} style="cursor:pointer;"  data-date-days-of-week-disabled="023" data-date-format="D, M dd, yyyy" class=" form-control" name="pickup_date" type="text" 
      id="pickup_date" value="<?php

         if(isset($ticket->pickup_date)){

            echo old('pickup_date',$ticket->getDatePicker());
         }
         else{

           echo old('pickup_date');
         }




       ?>" placeholder="Click to choose date" >
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="pickup_time" value="<?php

		if(isset($ticket->pickup_time)){

			echo $ticket->pickup_time;
		}

		?>"/>
<div class="row pickups">
	<div class="col-md-offset-3 col-md-9">
		<h3>{{PICKUP_TIME}} <span id="my_pickup_time">
		<?php
			if(isset($ticket->pickup_time)){

			echo $ticket->pickup_time;
		}

			


		?></span></h3>

      <?php echo nl2br(PICKUP_INFO) ?>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{PHONE_MODEL}}</label>
			<span class="help"></span>
			<div class="controls">
				<input {!! $input !!}  required type="text" class="form-control" name="phone_model" value="<?php

                              if(isset($ticket->phone_model)){

                                  echo old('phone_model',$ticket->phone_model);
                               }
                               else{

                                 echo old('phone_model');
                               }

                        ?>" id="phone_model" 
                        placeholder="Ex: Nokia">
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ PHONE_TYPE }}</label>
			<span class="help"></span>
			<div class="controls">
				<input {!! $input !!} type="text" class="form-control" required name="phone_modelex" value="<?php

                              if(isset($ticket->phone_type)){

                                  echo old('phone_modelex',$ticket->phone_type);
                               }
                               else{

                                 echo old('phone_modelex');
                               }

                        ?>" id="phone_modelex" 
                        placeholder="Ex: 6234">
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ IMEI_NUMBER }}</label>
			<span class="help"></span>
			<div class="controls">
				 <input {!! $input !!}  type="text" class="form-control" required name="imei_number" value="<?php

                               if(isset($ticket->imei_number)){

                                  echo old('imei_number',$ticket->imei_number);
                               }
                               else{

                                 echo old('imei_number');
                               }

                        ?>" id="imei_number" 
                        placeholder="Ex: {{IMEI_NUMBER_EXAMPLE }}">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label class="form-label">  {{REASON}}</label>
			<span class="help"></span>
			<div class="controls">
				 <textarea  {!! $input !!} maxlength="300"  class="form-control" required rows="4"
                        name="reason" id="reason"><?php

                            if(isset($ticket->reason)){

                                  echo old('reason',$ticket->reason);
                               }
                               else{

                                 echo old('reason');
                               }

                        ?></textarea>
			</div>
		</div>
	</div>
</div>
<?php
	
	if(isset($ticket->extra_parts_other) && $ticket->extra_parts_other != ''){

		$hide_extra = '';
	}else{

		$hide_extra = 'style="display:none"';
	}
	
?>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label class="form-label">{{ EXTRA_PARTS }}</label>
			<span class="help"></span>
			<div class="controls">
					   @foreach($extra_parts_array as $extra_item)
                          <input type="checkbox" name="extra_parts[]" value="{{ $extra_item }}"<?php

                           if(isset($ticket)){

                              echo (in_array($extra_item,$ticket->extraPartToArray()) ? 'checked':'' ) ;
                           }


                         
                           ?>> {{ $extra_item }}&nbsp;&nbsp;&nbsp
                        @endforeach
                         <input type="checkbox"  onclick="checkBoxShow(this)" name="extra_parts[]" data-object-class="show-other" id="check-box-other" class="" value="{{ OTHER }}"<?php 

                            if(isset($ticket)){

                               if(in_array(OTHER,$ticket->extraPartToArray())){

                               		echo 'checked';
                               		$hide_extra = '';

                               }	
                               //echo (in_array(OTHER,$ticket->extraPartToArray()) ? 'checked':'' ) ;
                           }
                    


                      ?> id="extra-other">{{ EXTRA_PARTS_OTHER}}
			</div>
		</div>
	</div>
</div>
<div class="row show-other" {!!  $hide_extra !!}>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">Add {{EXTRA_PARTS_OTHER }}</label>
			<span class="help"></span>
			<div class="controls">
				 <input style="" class="required" {!! $input !!}
                        type="text" name="extra_parts_other"   id="extra_parts_other" value="<?php

                            if(isset($ticket->extra_parts_other)){

                                  echo old('extra_parts_other',$ticket->extra_parts_other);
                               }
                               else{

                                 echo old('extra_parts_other');
                               }

                        ?>" />
			</div>
		</div>
	</div>
</div>
@if(!Auth::check() || Auth::user()->isSubShop())
<div class="row">
	<div class="col-md-12">
		     <b>{{ AGREEMENT}} :</b> <br/> <p class="well"><?php echo nl2br($shop->agreement) ?></p>
	</div>
</div>

@endif

@if(!$view_only)
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label"></label>
			<span class="help"></span>
			<div class="controls">
				<input type="submit" data-color="rgb(255, 255, 255)" data-color-format="hex" id="cp4" class="btn btn-primary my-colorpicker-control"  data-colorpicker-guid="1" value="{{ OPSLAAN }}"/>
			</div>
		</div>
	</div>
</div>

@endif


</form>