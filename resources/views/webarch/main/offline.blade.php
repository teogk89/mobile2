@extends('webarch.layouts.app2')

@push('extracss')
<link href="{{ asset("assets/plugins/ios-switch/ios7-switch.css") }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset("assets/plugins/bootstrap-datepicker/css/datepicker.css") }}" rel="stylesheet" type="text/css" media="screen">
@endpush

@push('extrajs')

<script src="{{ asset('assets/plugins/ios-switch/ios7-switch.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
@endpush
@section('content')
<?php
	
	
	//$input = ( $edit == TRUE ? '':'disabled="disabled"');
	$input = ( $view_only == TRUE ? 'disabled="disabled"':"");
?>
<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:0px">
			<div class="page-title">
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="grid simple">
						<div class="grid-title no-border">
							
						</div>
						<div class="grid-body no-border">
							<div class="row">
								<div class="col-md-12">
									@include("webarch.form.ticket",['url'=>route('update-ticket')])
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
<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>

<script type="text/javascript">


$('.submit').preShow();
$('.preShow').selectBoxShow();

$('#pickup_date').datepicker({
       
        autoclose: true,
        todayHighlight: true,

    }).on('changeDate',getTimes);
$('.hasDatepicker').datepicker({
       
        autoclose: true,
        todayHighlight: true,

    }).on(show,function(){

    	console.log('heelo');
    });

</script>
@endpush