@extends('layouts.app')

@push('extracss')
<link href="{{ asset("assets/plugins/ios-switch/ios7-switch.css") }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset("assets/plugins/bootstrap-datepicker/css/datepicker.css") }}" rel="stylesheet" type="text/css" media="screen">
@endpush

@push('extrajs')

<script src="{{ asset('assets/plugins/ios-switch/ios7-switch.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
@endpush
@section('content')

<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content">
			<div class="page-title">
				<h3><?php echo __('content.repairSign') ?></h3>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="grid simple">
						<div class="grid-title no-border">
							
						</div>
						<div class="grid-body no-border">
							<div class="row">
								<div class="span12">
									<form>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="col-md-12 col-sm-12">
														<h4><i class="fa fa-user"></i> <?php echo __('content.customerInfo') ?></h4>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													
														<div class="col-sm-12 col-md-3">
															 <label class="form-label"><?php echo __('content.customerName') ?></label>
															 <input type="text" class="form-control">
														</div>
														<div class="col-sm-12 col-md-3">
															 <label class="form-label"><?php echo __('content.sex') ?></label>
															
															 <select class="form-control">
															 	<option><?php echo __('content.choose')?></option>
															 	<option><?php echo __('content.MALE')?></option>
															 	<option><?php echo __('content.FEMALE')?></option>

															 </select>
														</div>
													
												</div>
											</div>
											
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-12 col-md-12">
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.address') ?></label>
														 <input type="text" class="form-control">
													</div>
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.place') ?></label>
														 <input type="text" class="form-control">
													</div>
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.land') ?></label>
														  <select class="form-control">
														 	<option><?php echo __('content.choose')?></option>
														 	<option><?php echo __('content.belgium')?></option>
														 	<option><?php echo __('content.netherlands')?></option>

														 </select>
													</div>
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.streetNo') ?></label>
														 <input type="text" class="form-control">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-12 col-md-12">
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.postcode') ?></label>
														 <input type="text" class="form-control">
													</div>
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.phoneNumber') ?></label>
														 <input type="text" class="form-control">
													</div>
													
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.streetNo') ?></label>
														 <input type="text" class="form-control">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="col-md-12 col-sm-12">
														<h4><i class="fa fa-mobile"></i> <?php echo __('content.repairInformation') ?></h4>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													
														<div class="col-sm-12 col-md-3">
															 <label class="form-label"><?php echo __('content.userCode') ?></label>
															 <input type="text" class="form-control">
														</div>
														<div class="col-sm-12 col-md-3">
														
															 <label class="form-label"><?php echo __('content.icloud') ?></label>
															 <input type="text" class="form-control">
														</div>
													
													
												</div>
											</div>
											
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="col-sm-12 col-md-3">
														<label class="form-label"><?php echo __('content.guarantee') ?></label>
														<input type="checkbox" name="switch" class="ios form-control" checked="checked" />
														

													
													</div>
													<div  class="col-sm-12 col-md-3 guarantee" style="display:none">
														
														<label class="form-label"><?php echo __('content.purchaseDate') ?></label>
														
														<div>
															<div class="input-append success date col-md-12 col-lg-6 no-padding">
										                    	<input type="text" class="form-control">
										                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
										                    </div>
									                    </div>
													</div>
													<div  class="col-sm-12 col-md-3 guarantee" style="display:none">
														
														<label class="form-label"><?php echo __('content.until') ?></label>
														<div>
															<div class="input-append success date col-md-12 col-lg-6 no-padding">
										                    	<input type="text" class="form-control">
										                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
										                    </div>
									                    </div>
													</div>
													<div class="col-md-offset-3 col-md-8 col-sm-12 guarantee" style="display:none">
														
															<br/>
															<p><?php echo __('content.guarantee2')?></p>
														
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="col-sm-12 col-md-3">
														<label class="form-label"><?php echo __('content.onlyQuotation') ?></label>
														<input type="checkbox" id="button1" name="switch" class="ios form-control" checked="checked" />
														

													
													</div>
													<div class="col-sm-12 col-md-3">
														<label class="form-label"><?php echo __('content.notRepair') ?></label>
														<input type="checkbox" id="button2" name="switch" class="ios form-control" checked="checked" />
														

													
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="col-sm-12 col-md-3">
														 <label class="form-label"><?php echo __('content.wherePurchase') ?></label>
														  <select class="form-control" id="boxpurchase">
														 	
														 	<option><?php echo __('content.choose')?></option>
														 	@foreach ($purchase as $pu)
														 		<option value="<?php echo $pu ?>"><?php echo $pu ?></option>
														 	@endforeach
														 	<option value="<?php echo __('content.other') ?>"><?php echo __('content.other') ?></option>	
														 </select>
													</div>
													<div class="col-sm-12 col-md-3" id="buyatother" style="display:none">
														<label class="form-label"><?php echo __('content.buyAtOther') ?></label>
													 	<input type="text" class="form-control">
													</div>	
													<div class="col-sm-12 col-md-3">
														<label class="form-label"><?php echo __('content.youHaveInsurance') ?></label>
														<input type="checkbox" id="insurance" name="switch" class="ios form-control" checked="checked" />

														<br/>
														<select class="form-control" id="insurancechoose" style="display:none">
															<option><?php echo __('content.choose') ?></option>
															@foreach($insurance as $in)
																<option value="$pu"><?php echo $in ?></option>
															@endforeach
															<option value="<?php echo __("content.unknow") ?>"><?php echo __("content.unknow") ?></option>
															<option value="<?php echo __("content.other") ?>"><?php echo __("content.other") ?></option>
														</select>
													</div>	
													<div class="col-sm-12 col-md-3" style="display:none" id="insuranceother">
														<label class="form-label"><?php echo __('content.other') ?></label>
													 	<input type="text" class="form-control">
													</div>	
													
													
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="col-sm-12 col-md-3">
														<label class="form-label"><?php echo __('content.pickUp') ?></label>
														<input type="checkbox" id="pickup" name="switch" class="ios form-control" checked="checked" />
													</div>
													<div id="pickupdate" class="col-sm-12 col-md-4 col-md-offset-2" style="display:none">
														<label class="form-label"><?php echo __('content.date') ?></label>
														
														
														<div>
															<div class="input-append success date col-md-12 col-lg-6 no-padding">
										                    	<input type="text" class="form-control">
										                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
										                    </div>
									                    </div>
									                    <br/>
									                    <br/>
									                    <h1><?php echo __('content.between') ?> 9:00 - 12:00 </h1>
									                    <br/>
									                 
									                    <p><?php echo __('content.pickupprice') ?></p>
													</div>
													
												</div>
												
												

											
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="col-sm-12 col-md-3">
														<label class="form-label"><?php echo __('content.model') ?></label>
														<input type="text" class="form-control" place-holder="Ex: Nokia">	
													</div>
													<div class="col-sm-12 col-md-3">
														<label class="form-label"><?php echo __('content.type') ?></label>
														<input type="text" class="form-control" placeholder="Ex: 6234">	
													</div>
													<div class="col-sm-12 col-md-3">

														<label class="form-label"><a href="#" data-trigger="hover" data-toggle="popover" title="" data-content="<?php echo __('content.imei2') ?>"><?php echo __('content.imei') ?></a></label>
														<input type="text" class="form-control" placeholder="Ex: 350001234512345">	
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class='col-md-12 col-sm-12'>
														<label class="form-label"><?php echo __('content.problemDes') ?></label>
														<textarea class="form-control"> </textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12 col-sm12">
													<div class='col-md-12 col-sm-12'>
														<label class="form-label"><?php echo __('content.accessoriesComeswith') ?></label>
														<div>
														<div class="col-md-2">
															<div class="checkbox check-success 	">
                          										<input id="checkbox2" type="checkbox" value="1">
                          										<label for="checkbox2"><?php echo __('content.battery') ?></label>
                        									</div>
														</div>
														<div class="col-md-2">
															<div class="checkbox check-success 	">
                          										<input id="checkbox2" type="checkbox" value="1">
                          										<label for="checkbox2"><?php echo __('content.charger') ?></label>
                        									</div>
														</div>
														<div class="col-md-2">
															<div class="checkbox check-success 	">
                          										<input id="checkbox2" type="checkbox" value="1">
                          										<label for="checkbox2"><?php echo __('content.memoryCard') ?></label>
                        									</div>
														</div>
														<div class="col-md-2">
															<div class="checkbox check-success 	">
                          										<input id="checkbox2" type="checkbox" value="1">
                          										<label for="checkbox2"><?php echo __('content.usbcable') ?></label>
                        									</div>
														</div>
														<div class="col-md-2">
															<div class="checkbox check-success 	">
                          										<input id="checkbox2" type="checkbox" value="1">
                          										<label for="checkbox2"><?php echo __('content.simcard') ?></label>
                        									</div>
														</div>
														<div class="col-md-2">
															<div class="checkbox check-success 	">
                          										<input id="checkbox2" type="checkbox" value="1">
                          										<label for="checkbox2"><?php echo __('content.case') ?></label>
                        									</div>
														</div>
														<div class="col-md-2">
															<div class="checkbox check-success 	">
                          										<input id="checkbox2" type="checkbox" value="1">
                          										<label for="checkbox2"><?php echo __('content.otherwise') ?></label>
                        									</div>
														</div>
                        								</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class='col-md-12 col-sm-12'>
													<div class="well">
														<p><?php echo(html_entity_decode($policy)) ?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="form-action">
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<button class="btn btn-success btn-cons" type="button">Save</button>
													<button class="btn btn-default btn-cons" type="button">Reset</button>
												</div>
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
	</div>
</div>

@stop

@push('pagescript')
<script type="text/javascript">
console.log('adfads');

var Switch2 = require('ios7-switch')
        , checkbox = document.querySelector('.ios')
        , mySwitch2 = new Switch2(checkbox);

      mySwitch2.el.addEventListener('click', function(e){
        e.preventDefault();
        mySwitch2.toggle();
        $('.guarantee').toggle();
       
      }, false);

 $('.input-append.date').datepicker({
				autoclose: true,
				todayHighlight: true
	   });
 var Switch3 = require('ios7-switch')
        , checkbox = document.querySelector('#button1')
        , mySwitch3 = new Switch2(checkbox);


mySwitch3.el.addEventListener('click', function(e){
        e.preventDefault();
        mySwitch3.toggle();
       
      }, false);

var Switch4 = require('ios7-switch')
        , checkbox = document.querySelector('#button2')
        , mySwitch4 = new Switch2(checkbox);

mySwitch4.toggle();
mySwitch4.el.addEventListener('click', function(e){
        e.preventDefault();
        mySwitch4.toggle();
       
      }, false);

var Switch5 = require('ios7-switch')
        , checkbox = document.querySelector('#insurance')
        , mySwitch5 = new Switch2(checkbox);

mySwitch5.el.addEventListener('click', function(e){
        e.preventDefault();
        mySwitch5.toggle();
       	
       	$('#insurancechoose').toggle();
      }, false);


var other = '<?php echo __("content.other") ?>';

$('#boxpurchase').change(function(){

	var option = $(this).find('option:selected');
	console.log(option.val());
	if(other == option.val()){

		$('#buyatother').show();
	}
	else{

		$('#buyatother').hide();
	}

});

$('#insurancechoose').change(function(){

	var option = $(this).find('option:selected');
	console.log(option.val());
	if(other == option.val()){

		$('#insuranceother').show();
	}
	else{

		$('#insuranceother').hide();
	}
});

 $('[data-toggle="popover"]').popover();

var pickup = require('ios7-switch')
        , checkbox = document.querySelector('#pickup')
        , pickup = new Switch2(checkbox);

pickup.el.addEventListener('click', function(e){
        e.preventDefault();
        pickup.toggle();
       	$('#pickupdate').toggle();
       	//$('#insurancechoose').toggle();
      }, false);
</script>

@endpush