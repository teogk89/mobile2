<?php

$input = 'disabled="disabled"';

?>

@extends('webarch.layouts.app2')

@section('content')


<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:10px">
			<div class="row">
				<div class="col-md-12">
					<div class="grid simple">
                    <div class="grid-body">
						<table class="table">
							<thead>
								<tr>
									<th>Tech</th>
									<th>Prijzen</th>
									<th>{{DATE}}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<?php
										if($ticket->teach != null){

											echo $ticket->teach->name;
										}

									?></td>
									<td>{{ $ticket->repair_cost }}</td>
									<td>{{ $ticket->repair_date }}</td>
								</tr>
							</tbody>
						</table>
                        </div>
					</div>
				</div>
			</div>
			<!-- list repair status !-->
			@if($ticket->details->count() > 0)
			<div class="row">
				<div class="col-md-12">
					<div class="grid simple">
						<div class="grid-title no-border">
							
							<div class="tools">
		                    <a href="javascript:;" class="expand"></a>
		                    <a href="#grid-config" data-toggle="modal" class="config"></a>
		                    <a href="javascript:;" class="reload"></a>
		                    <a href="javascript:;" class="remove"></a>
		                  </div>
						</div>
						<div class="grid-body no-border">
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Reparatie Status</th>
										<th>Datum</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($ticket->details as $d)
										<tr>
											<td>{{ $d->detail}}</td>
											<td>{{ $d->ticket_status}}</td>
											<td>{{ $d->getDateAdded() }}</td>
											<td>
												@if($d->imageAvailable())

												<a href="{{ url($d->imageUrl()) }}" data-toggle="lightbox" data-title="">
													<img style="width:24px" src="<?php echo url($d->imageUrl()) ?>"/>
												</a>
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			@endif

			<!-- list repair status end !-->

			<!-- list invoice status end !-->
			@if($ticket->invoices->count())
			<div class="row">
				<div class="col-md-12">
					<div class="grid simple">
						<div class="grid-title no-border">
							
							<div class="tools">
		                    <a href="javascript:;" class="expand"></a>
		                    <a href="#grid-config" data-toggle="modal" class="config"></a>
		                    <a href="javascript:;" class="reload"></a>
		                    <a href="javascript:;" class="remove"></a>
		                  </div>
						</div>
						<div class="grid-body no-border">
							<table class="table">
								<thead>
									<tr>
										<th>Invoice Status</th>
										<th>Note</th>
										<th>Datum</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($ticket->invoices as $i)
										<tr>
											<td><?php echo ($i->status == 0 ? 'UnPaid':'Paid') ?></td>
											<td>{{ $i->notices }}</td>
											<td>{{ $i->getDateAdded()}}</td>
											<td>
												@if($i->imageAvailable())

												<a href="{{ url($i->imageUrl()) }}" data-toggle="lightbox" data-title="">
													<img style="width:24px" src="<?php echo url($i->imageUrl()) ?>"/>
												</a>
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


			@endif


			<div class="row">
				<div class="col-md-12">
					<div class="grid simple">
						<div class="grid-title no-border">
							
							<div class="tools">
		                    <a href="javascript:;" class="expand"></a>
		                    <a href="#grid-config" data-toggle="modal" class="config"></a>
		                    <a href="javascript:;" class="reload"></a>
		                    <a href="javascript:;" class="remove"></a>
		                  </div>
						</div>
						<div class="grid-body no-border">
						@include('webarch.form.ticket',['url'=>''])
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection

@push('pagescript')
<link href="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.css') }}" rel="stylesheet" type="text/css" />


<script src="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>

<script>

$(document).ready(function(){


	$("a[data-toggle='lightbox']").click(function(event){


		event.preventDefault();
	    $(this).ekkoLightbox();
	});


});


$('.submit').preShow();
$('.preShow').selectBoxShow();


</script>
@endpush