
<form class="form" method="post" enctype="multipart/form-data" id="ticket-form" target="_self" action="{{$url}}" novalidate="novalidate">
  <fieldset>

    @if(isset($ticket->ticket_id))
      <input type="hidden" name="ticket_id" value="{{$ticket->ticket_id}}"/>
    @endif
    {!! csrf_field() !!}
    @if(Auth::check())
      <?php
        $current_user = \Auth::user();

      ?>
      @if($current_user->isAdmin())

        <div class="control-group span3">
          <label class="control-label" for="ticket_tech">{{TICKET_TECH}}</label>
            <div class="controls">
          <select autocomplete="off"  name="ticket_tech" id="ticket_tech" class="select required valid">
            <option value="" disabled>{{SELECT}}</option>
            @foreach($tech as $te)

              @if(isset($ticket->technician_id) && $ticket->technician_id == $te->id)
               <option value="{{ $te->id}}" selected><?php echo $te->name ?></option>
              @else

               <option value="{{ $te->id}}"><?php echo $te->name ?></option>
              @endif
             

            @endforeach
         </select>
       </div>

       </div>
        <div class="control-group span3">
          <label class="control-label" for="costadmin">{{REPAIR_COST}}</label>
          <div class="controls">
            <input style="margin-left: 0px; margin-right: 0px; width: 210px" class="input-medium required" value="<?php

                 if(isset($ticket->repair_cost)){

                        echo old('repair_cost',$ticket->repair_cost);
                     }
                     else{

                       echo old('repair_cost');
                     }



             ?>" name="repair_cost" id="costadmin" type="text">
          </div>
        </div>

                                       
        <div class="control-group span3">
                          
                                        <label class="control-label" for="repair_date">{{REPAIR_DATE}}</label>
                                        
                         <div class="controls">
        <input style="margin-left: 0px; margin-right: 0px; width: 200px;" 
               name="repair_date" type="text" id="repair_date" value="<?php

                     if(isset($ticket->repair_date)){

                        echo old('repair_date',$ticket->repair_date);
                     }
                     else{

                       echo old('repair_date');
                     }



                ?>"  autocomplete="off">
      
                         
                         </div> </div>
                                         <div class="span11" style="margin-bottom:50px;"> <hr/> </div>
      @endif
    @endif

    <div class="respond hero span10">
      <div class="span3">
        <span class="" style="color:#000000; font-size:18px;">
          <i class="icon-user"></i> <?php echo CUSTOMER_INFORMATION ?>
        </span>
      </div>
    </div>

  
    <div class="control-group pull-left span3">
      <label class="control-label" for="name" >{{ CUSTOMER_NAME }}</label>
      <div class="controls">
                   <input style="margin-left: 0px; margin-right: 0px; width: 210px;" {!! $input !!} type="text" class="input-medium required" name="name" id="name" value="<?php

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
    <div class="control-group span3">
      <label class="control-label" for="gender">{{CUSTOMER_GENDER }}</label>
      <div class="controls">
     
        <select {!! $input !!} name="gender" id="gender" class="select required submit" data-submit="<?php

          if(isset($user->gender)){

            echo old('gender',$user->gender);
          }elseif(isset($ticket->gender)){

            echo old('gender',$ticket->gender);

          }else{

            echo old('gender');
          }
        
        ?>">
          <option value="">{{SELECT}}</option>  
           <option value="MALE" selected="selected">{{MALE}}</option>
          <option value="FEMALE" >{{FEMALE}}</option>
        </select>
      </div>
    </div>
    <div class="span11"> <hr/> </div>

    <div class="control-group span3">
      <label class="control-label" for="zipcode">{{ POSTAL_CODE }}</label>
                   <div class="controls">
                     <input {!! $input !!}  style="margin-left: 0px; margin-right: 0px; width: 210px;margin-bottom:0px" type="text" class="input-medium required" 
                     name="postal_code" id="zipcode" maxlength="6" value="<?php

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
    @if(!$view_only)
    <div class="control-group span6">
         <label style=" visibility: hidden;" class="control-label" for="zipcode">{{ POSTAL_CODE }}</label>
          <div class="controls">
             <button data-ajax-text = 'find' data-url="/api" class="btn btn-info" onclick="getAddress(this,event);">Auto Address</button>
          </div>
         
    </div>
    @endif
     <div class="span11"> <hr/> </div>

    <div class="control-group span3">
       <label class="control-label" for="residence">{{ CUSTOMER_ADDRESS }}</label>
      <div class="controls">
        <input style="margin-left: 0px; margin-right: 0px; width: 210px;" 
         type="text" {!! $input !!} class="input-medium required" 
         name="residence" id="residence" value="<?php

          if(isset($address->address)){

            echo old('residence',$address->address);

          }elseif(isset($ticket->address)){

            echo old('residence',$ticket->address);

          }else{

            echo old('residence');
          }
   

         ?>">
       
        <!------------>
    
       <label class="control-label" for="street_nr">{{ STREET_NR }}</label>
       <div class="controls">
         <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 210px;" '.$input.' type="text" value="<?php

          if(isset($address->str_nr)){

            echo old('str_nr',$address->str_nr);
          }elseif(isset($ticket->street_nr)){

            echo old('str_nr',$ticket->street_nr);

          }else{

            echo old('str_nr');
          }

         ?>" 
         class="input-medium required" name="street_nr" id="street_nr">
       </div> 

      </div>
    </div>
    <div class="control-group pull-left span3">
                          
                  <label class="control-label" for="city">{{CITY}}</label>
                   <div class="controls">
                     <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; 
                     width: 210px;" type="text" class="input-small required" 
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
    <div class="control-group span3">
                          
      <label class="control-label" for="country">{{ COUNTRY }}</label>
        <div class="controls">
          <select {!! $input !!} name="country" id="country" class="select required submit" data-submit="<?php

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
    <div class="span11"> <hr/> </div>

    
    <div class="control-group span3">
     <label class="control-label" for="phone">{{ PHONE_NUMBER }}</label>
     <div class="controls">
       <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; 
       width: 210px;" type="text" class="input-medium required" 
       name="phone"  id="phone" value="<?php

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
   
    <div class="control-group span3">
     <label class="control-label" for="email">{{ EMAIL_ADDRESS }}</label>
     <div class="controls">
       <input style="margin-left: 0px; margin-right: 0px; width: 210px;" 
       type="text" <?php echo (isset($user->email) ? 'disabled':'') ?> class="input-medium" name="email" id="email" value="<?php

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
    <div class="respond hero span10">
      <div class="span3">
        <span class="" style="color:#000000; font-size:22px;">
          <i class="icon-mobile-phone"></i> {{REPAIR_ITEM_INFORMATION}}
        </span>
      </div>
    </div>
    <div class="control-group span3">
      
                    <label class="control-label" for="user_code">{{ USER_CODE }}</label>
                    
      <div class="controls">
     
      <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 180px;" type="text"
       name="user_code" id="user_code" value="<?php

       if(isset($ticket->user_code)){

          echo old('user_code',$ticket->user_code);
       }
       else{

         echo old('user_code');
       }


      

       ?>">
      
      </div>    
    </div>
    <div class="control-group span3">
                          
      <label class="control-label" for="icloud_code">{{ ICLOUD_MAIL_PASSWORD }}</label>
                                        
      <div class="controls">
                         
                          <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 200px;"  type="text"
                           name="icloud_code" id="icloud_code" value="<?php

                            if(isset($ticket->icloud_code)){

                                echo old('icloud_code',$ticket->icloud_code);
                             }
                             else{

                               echo old('icloud_code');
                             }

                           ?>">
                         
      </div> 
    </div>  
                         
    <div class="span11"> <hr/> </div>
    @if(FULL_VERSION)
    <div class="control-group span3">
      <label data-show="YES"  class="control-label" for="warranty">{{ WARRANTY }}</label>
      <div class="controls">
        <select {!! $input !!} name="warranty" data-show="YES" data-object-class="warranty_info" id="warranty" class="select submit preShow" data-submit="<?php

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
    <div class="warranty_info" style="display:none;">
      <div class="control-group span3">
        <label class="control-label" for="warranty_date_order">{{ WARRANTY_DATE_ORDER }}</label>
        <div class="controls">
         <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 210px;" type="text" class="input-medium required" name="warranty_start" value="<?php

          if(isset($ticket->warranty_date_order)){

              echo old('warranty_start',$ticket->warranty_date_order);
          }
          else{

             echo old('warranty_start');
          }

         ?>" id="warranty_date_order"/>
        </div>
      </div>
                                    
                                       <!------------>
      <div class="control-group span3">
         <label class="control-label" for="warranty_date_order2">{{ WARRANTY_UNTIL }}</label>
         <div class="controls">
           <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 210px;" type="text" class="input-medium required" name="warranty_end" value="<?php 

          if(isset($ticket->warranty_until)){

              echo old('warranty_end',$ticket->warranty_until);
          }
          else{

             echo old('warranty_end');
          }

           ?>{{ old('warranty_end') }}" id="warranty_date_order2">
         </div>
         
      </div>
      <br/><br/>
      <div class="span12">                        
          {{ WARRANTY_SALES_SLIP }}
      </div>
    </div>
            
    <div class="span11"> <hr/> </div>         
    @endif
    <div class="control-group span5">
                          
      <label class="control-label" for="only_research">{{ ONLY_RESEARCH }}</label>
        <div class="controls">
                                           <select {!! $input !!} name="only_research" data-submit="<?php

                                                  if(isset($ticket->only_research)){

                                                      echo old('only_research',$ticket->only_research);
                                                   }
                                                   else{

                                                     echo old('only_research');
                                                   }


                                           ?>" id="only_research" class="submit select required valid">
                                           <option value="">{{ SELECT }}</option>
          <option value="YES">{{ YES }}</option>
          <option value="NO">{{ NO }}</option>
          </select>
        </div>
                                         
    </div>
    <div class="control-group span5">
                          
      <label class="control-label" for="inform_price" style="font-size:10px;">{{ INFORM_PRICE }}</label>
        <div class="controls">
          <select  {!! $input !!} name="inform_price" id="inform_price" class="select required valid submit" data-submit="<?php

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
    @if(FULL_VERSION)
    <div class="control-group span3">
                          
      <label class="control-label" for="ordered_from">{{ ORDERED_FROM }}</label>
        <div class="controls">
          <select data-show="Andere" data-object-class="ordered_from_other" {!! $input !!} name="ordered_from" id="ordered_from" class="select required valid submit preShow" data-submit="<?php

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
    <div class="ordered_from_other" style="display:none;">
      <div class="control-group span3">
         <label class="control-label" for="order_other">{{ ORDERED_FROM_OTHER }}</label>
         <div class="controls">
          <input {!! $input !!}  style="margin-left: 0px; margin-right: 0px; width: 210px;" type="text" class="input-small required" name="order_other" id="order_other" value="<?php
         

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
    <div class="control-group span3">
                          
      <label class="control-label" for="casco">{{CASCO}}</label>
                        
        <div class="controls">
          <select {!! $input !!} name="casco" id="casco" data-show="YES" data-object-class="casco_options" class="select required submit preShow" data-submit="<?php

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
        <select {!! $input !!} data-show="Andere" data-object-class="casco_other" name="casco_other" style="display:none;" data-submit="<?php

          if(isset($ticket->casco_options)){

                echo old('casco_options',$ticket->casco_options);
             }
             else{

               echo old('casco_options');
          }

        ?>{{ old('casco_options')}}" id="casco_options" class="submit select required casco_options preShow">
          <option value="">{{SELECT }}</option>'
          @foreach($casco_options_array as $option)
          <option value="{{ $option }}">{{ $option }}</option>
          @endforeach      
        </select>
    </div>
    <div class="casco_other" style="display:none;">
                          <div class="control-group span2">
                           <label class="control-label" for="casco_other">{{OTHER}}</label>
                           <div class="controls">
                           <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 180px;" type="text" class="input-small required" name="casco_other" id="casco_other" value="<?php

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
    <div class="span11"> <hr/> </div>

    <div class="control-group span5.5">
                          
                        <label class="control-label" for="pickup">{{PICKUP}}</label>
                        
                        <div class="controls">
                        
                        <select {!! $input !!} data-show="YES" data-object-class="pickups" name="pickup" id="pickup" class="select required submit preShow" data-submit="<?php

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
    <div class="pickups span6" style="display:none">
      
      <label class="control-label" for="pickup_date">{{PICKUP_DATE}}</label>
                        <div class="controls">
      <input {!! $input !!} style="cursor:pointer;" name="pickup_date" type="text" 
      id="pickup_date" value="<?php

         if(isset($ticket->pickup_date)){

            echo old('pickup_date',$ticket->pickup_date);
         }
         else{

           echo old('pickup_date');
         }




       ?>{{ old('pickup_date') }}" placeholder="Click to choose date" readonly>
      </div>
      
      <h3>{{PICKUP_TIME}} <span id="pickup_time"></span></h3>
      <?php echo nl2br(PICKUP_INFO) ?>
      
    </div>
    <div class="span11"> <hr/> </div>   
    @endif
    <div class="control-group span3">
                          
                        <label class="control-label" for="phone_model">{{PHONE_MODEL}}</label>
                        
                        <div class="controls">
                        <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 210px;" type="text" class="input-medium required" name="phone_model" value="<?php

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
    <div class="control-group span3">
                          
                        <label class="control-label" for="phone_modelex">{{ PHONE_TYPE }}</label>
                        
                        <div class="controls">
                        <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 210px;" type="text" class="input-medium required" name="phone_modelex" value="<?php

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
    <div class="control-group span3">
           
                        <label class="control-label" for="imei_number">
                        <a id="pop" href="#" style="margin:10px;" 
                        data-toggle="popover" data-content="'.IMEI_NUMBER_INFO.'">{{ IMEI_NUMBER }}</a>
                        </label>
                        
                        <div class="controls">
                        <input {!! $input !!} style="margin-left: 0px; margin-right: 0px; width: 210px;" type="text" class="input-medium required" name="imei_number" value="<?php

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
                        
    <div class="span11"> <hr/> </div>
    <div class="control-group span3">
           
                        <label class="control-label" for="reason">
                        {{REASON}}
                        </label>
                        
                        <div class="controls">
                        <textarea  {!! $input !!} maxlength="300"  class="span11 required"  rows="4"
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
    <div class="span11"> <hr/> </div>
    <div class="control-group span8">
                          
                        <label class="control-label" for="extra_parts[]">{{ EXTRA_PARTS }}</label>
                        
      <div class="controls">
                        @foreach($extra_parts_array as $extra_item)
                          <input type="checkbox" name="extra_parts[]" id="extra_parts[]" value="{{ $extra_item }}"<?php

                           if(isset($ticket)){

                              echo (in_array($extra_item,$ticket->extraPartToArray()) ? 'checked':'' ) ;
                           }


                         
                           ?>> {{ $extra_item }}&nbsp;&nbsp;&nbsp
                        @endforeach
                        
                        
                        
                      <input type="checkbox" name="extra_parts[]" class="preShow" value="{{ OTHER }}"<?php 

                            if(isset($ticket)){

                               echo (in_array(OTHER,$ticket->extraPartToArray()) ? 'checked':'' ) ;
                           }
                    


                      ?> id="extra-other">{{ EXTRA_PARTS_OTHER}}
                
              
        <div style="display:none;" id="extra-parts-other-container">
                        
                        <div class="control-group span3">
                          
                        <br/>
                        <label class="control-label" for="extra_parts_other">Add {{EXTRA_PARTS_OTHER }}</label>
                        
                        <div class="controls">
                        
                        <input style="margin-left: 0px; margin-right: 0px; width: 210px;" class="required"
                        type="text" name="extra_parts_other"  id="extra_parts_other" value="<?php

                            if(isset($ticket->extra_parts_other)){

                                  echo old('extra_parts_other',$ticket->extra_parts_other);
                               }
                               else{

                                 echo old('extra_parts_other');
                               }

                        ?>"  {{$input}}/>
                        
                        </div>   
                        </div>
        </div>
        <div class="span11"> <hr/> </div>
        @if(!Auth::check())                
        <div class="control-group span3.3"><br/>
                        <a href="javascript: reload()" class="btn btn-info">R</a>
                        <img src="/captcha" alt="Captcha!" id="captcha" />&nbsp;&nbsp;&nbsp;
                        <span style="font-size:24px; font-weight:bold;"> ? </span> <br/>
                        <div class="controls">
                        <a id="pop" href="#" style="margin:10px;" data-toggle="popover" 
                        data-content="Calculate and enter answer on the right sided box" data-original-title="">{{ CAPTCHA_ANSWER }}</a>
                        
                        </div>
        </div>
        
     
        <div class="control-group span3.3">
                        <label class="control-label" for="captcha_answer">{{ CAPTCHA_ANSWER }}</label>
                        
                        <div class="controls">
                        
                        <input style="margin-left: 0px; margin-right: 0px; width: 210px;" class="required"
                        type="text" name="captcha"  id="captcha_answer">
                        @if($errors->has('captcha'))
                          <label for="captcha_answer" class="error">{{ $errors->first('captcha') }}</label>
                        @endif
                        </div>   
        </div>
     
        <div class="span11"> <hr/> </div>
        @endif
        <div class="content main-box entry span11">
                     <b>{{ AGREEMENT}} :</b> <br/> <p><?php echo nl2br($shop->agreement) ?></p>
        </div>
        <br/><br/><br/>

        
        
       
    </div>

       
  </div>    
   @if(!$view_only)
    <div class="form-actions pull-right span5">
        <button type="submit" name="saveprint_offline" class="btn btn-info">{{ OPSLAAN }}</button>
        <button type="reset" class="btn">{{ RESET }}</button>
    </div>

    @endif             
  </fieldset>  
</form>
        
       
                                      
