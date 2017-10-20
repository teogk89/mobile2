@extends('webarch.layouts.app')

@section("content")

<?php

	$input = null;

?>
<div class="clearfix"></div>
<div id="container">
	<h3>#{{ $ticket->ticket_id }}</h3>
	@include('webarch.partial.notify')
	
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4>Ticket</h4>
					<div class="tools">
                    <a href="javascript:;" class="expand"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
				</div>
				<div class="grid-body  no-border">
					@include("webarch.form.ticket",['url'=>route('admin-ticket-save')])
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection

@push('pagescript')
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
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