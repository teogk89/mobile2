@extends('webarch.layouts.app')

@section('content')


<div class="clearfix"></div>
<div id="container">
	<div class="row 2col">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">
					@if($type == 'edit')
					<h4>Edit order # {{ $order->id}}</h4>
					@endif
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-10">
              @include('webarch.partial.notify')
							<form action="{{ route("admin-save-order") }}"  method="POST">
                 
                {!! csrf_field() !!}
                  <input type="hidden" value="{{ $type }}" name="type"/>
								@if($type == 'edit')
							
                <input type="hidden" name="id" value="{{ $order->id}}"/>
								@endif
								<div class="form-group">
                        			<label class="form-label"><strong>Item Name</strong></label>
                        			<span class="help"></span>
                        			<div class="controls">
                          				<input class="form-control" name="item_name" type="text" value="<?php

                                  if(isset($order->item_name)){

                                    echo old('item_name',$order->item_name);
                                  }
                                  else{

                                    echo old('item_name');
                                  }


                                ?>" required>
                        			</div>
                      			</div>
                      			<div class="form-group">
                        			<label class="form-label"><strong>Customer name</strong></label>
                        			<span class="help"></span>
                        			<div class="controls">
                          				<input class="form-control" required name="customer" type="text" value="<?php 


                                  if(isset($order->customer)){

                                    echo old('customer',$order->customer);
                                  }
                                  else{

                                    echo old('customer');
                                  }


                                ?>">



                                 
                        			</div>
                      			</div>
                      			<div class="form-group">
                        			<label class="form-label"><strong>Customer phone</strong></label>
                        			<span class="help"></span>
                        			<div class="controls">
                          				<input class="form-control" required name="phone" type="text" value="<?php

                                     if(isset($order->phone)){

                                    echo old('phone',$order->phone);
                                  }
                                  else{

                                    echo old('phone');
                                  }


                                  

                                  ?>">
                        			</div>
                      			</div>
                      			<div class="form-group">
                        			<label class="form-label"><strong>Item price € </strong></label>
                        			<span class="help"></span>
                        			<div class="controls">
                          				<input class="form-control" required name="item_price" type="text" value="<?php


                                     if(isset($order->item_price)){

                                    echo old('item_price',$order->item_price);
                                  }
                                  else{

                                    echo old('item_price');
                                  }


                                  ?>">
                        			</div>
                      			</div>
                      			<div class="form-group">
                        			<label class="form-label"><strong>Date ordered</strong></label>
                        			<span class="help"></span>
                        			<div class="controls">
                                  <div class="input-append success date col-md-10 col-lg-6 no-padding">
                              <input required class="form-control" name="date_order" type="text" value="<?php

                                         
                                  if(isset($order->date_order)){

                                    echo old('date_order',$order->date_order);
                                  }
                                  else{

                                    echo old('date_order');
                                  } 


                              ?>"/>
                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                              </div>
                          				
                        			</div>
                      			</div>
                            <div class="clearfix"></div>
                           <br/>
                      			<div class="form-group">
                        			<label class="form-label"><strong>Deliver date</strong></label>
                        			<span class="help"></span>
                        			<div class="controls">
                              <div class="input-append success date col-md-10 col-lg-6 no-padding">
                              <input required class="form-control" name="deliver_date" type="text" value="<?php
                                            if(isset($order->deliver_date)){

                                    echo old('deliver_date',$order->deliver_date);
                                  }
                                  else{

                                    echo old('deliver_date');
                                  } 


                              ?>"/>
                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                              </div>
                          				
                        			</div>
                      			</div>
                            <div class="form-action">
                              <div class="pull-right">
                                <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Update Order</button>
                       
                              </div>
                            </div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>

@endsection



@push("extrajs")
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>

  $('.input-append.date').datepicker({
         format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
     });
</script>

@endpush