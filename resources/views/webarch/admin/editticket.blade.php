@extends('webarch.layouts.app')

@section("content")
<?php
	
	
	//$input = ( $edit == TRUE ? '':'disabled="disabled"');
	$input = ( $view_only == TRUE ? 'disabled="disabled"':"");
?>

<div class="clearfix"></div>
<div id="container">
	<h3>#{{ $ticket->ticket_id }}</h3>
	@include('webarch.partial.notify')
	@include('webarch.partial.tech-add')
	@include('webarch.partial.repair-status')

	@include('webarch.partial.invoice')

	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title">
					<h4>Notice</h4>
					<div class="tools">
	                    <a href="javascript:;" class="expand"></a>
	                    <a href="#grid-config" data-toggle="modal" class="config"></a>
	                    <a href="javascript:;" class="reload"></a>
	                    <a href="javascript:;" class="remove"></a>
                  	</div>
                  	<div class="grid-body">
                  		@if($ticket->notices->count() > 0)
                  			@include('webarch.partial.notice-table',['result'=>$ticket->notices])
                  		@endif
                  		<?php 
                  		$notice = new \App\Model\Notice();

                  		?>
                  		<h4>Add notice</h4>
                  		@include('webarch.form.notice-form',['notice'=>$notice,'type'=>'new','tickets_id'=>$ticket->ticket_id])
                  	</div>
				</div>
			</div>
		</div>
	</div>
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

@push('beforeScript')

<script src="{{ asset('webarch/js/moment.js') }}"></script>
@endpush

@push("extrajs")


<script src="{{ asset('webarch/plugin/bootbox/bootbox.js') }}" type="text/javascript"></script>
<link href="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('webarch/js/jquery.form.js') }}" type="text/javascript"></script>




<script src="{{ asset('webarch/plugin/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<link rel="stylesheet" href="{{ asset('webarch/plugin/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" />

<script type="text/javascript">

$("a[data-toggle='lightbox']").on('click',function(event){

	event.preventDefault();
    $(this).ekkoLightbox();
});

 $('#MyUploadForm1').submit(function() { 

 		var options = {

 			//target:'#table-invoice',
 			success:function(a,b,c,d){

 				//var content = $(a);
 				$('#table-invoice-body').append(a);
 			}
 		};
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
}); 


$(document).ready(function(){
	//Wed,09 Aug 2017

	

	
	 $('#datetimepicker1').datetimepicker(
	 	{
	 		format:'ddd, MMM DD, YYYY  HH:mm'
	 	}
	 );

	$('.submit').preShow();
	$('.preShow').selectBoxShow();

	$('#pickup_date').datepicker({
       
        autoclose: true,
        todayHighlight: true,

    }).on('changeDate',getTimes);

	$('.hasDatepicker').datepicker({
       
        autoclose: true,
        todayHighlight: true
    });
	

});


/*
if($("#check-box-other").is(':checked')){
	$('.show-other').show();
	
}

$("#check-box-other").change(function(){

	 if($(this).is(":checked")) {
          	$('.show-other').show();
        }

});*/

</script>

@endpush