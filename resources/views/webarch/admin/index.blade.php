@extends('webarch.layouts.app')


@section('content')
<style>

.box {
  float: left;
  width: 20px;
  height: 20px;
  margin: 5px;
  border: 1px solid rgba(0, 0, 0, .2);
}

</style>
<div class="clearfix"></div>
<div id="container">
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-body">



							<div class="row">
								<div class="col-md-12">

					
									<select id='mytype'>
									
										@foreach ($typecolec as $m=>$ty)

											@if($m == $type)
											<option value="{{ route('admin-ticket-by-type',['type'=>$m,'per'=>$per]) }}" selected="selected"><?php echo $ty ?> (<?php echo \Helper::status_count($m)  ?>)</option>
											@else
											<option value="{{ route('admin-ticket-by-type',['type'=>$m,'per'=>$per]) }}"><?php echo $ty ?> (<?php echo \Helper::status_count($m)  ?>)</option>
											@endif
											
										@endforeach
									</select>
									<button id="go" type="button" class="btn btn-primary btn-cons">Ok</button>
								</div>
							</div>
							<table class="table table-striped table-flip-scroll cf">
								<thead>
									<tr>
										<th>#</th>
										<th><?php echo __('admin.submitdate')?></th>
										<th><?php echo __('admin.cusname')?></th>
										<th><?php echo __('admin.model')?></th>
										<th><?php echo __('admin.status')?></th>
									
										<th><?php echo __('admin.edit')?></th>
										<th>Print</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($tickets as $t)
									<tr>
										<td><?php echo $t->ticket_id ?></td>
										<td><?php echo $t->ticket_date ?></td>
										<td><?php echo $t->name ?></td>
										<td><?php echo $t->phone_model.' '.$t->phone_type ?></td>
										@if($t->current_status != null)

										<td><div data-toggle="tooltip" title="{{$t->current_status->status->startus}} - {{ $t->current_status->description}}" style="background:{{ $t->current_status->status->colors }};"class="box blue"></div></td>
										@else
										<td></td>
										@endif
										
										
										<td>
											<a href="{{ route("admin-edit-ticket",['id'=>$t->ticket_id])}}"><i class="fa fa-edit"></i></a>
										</td>
										<td>
											<a target="_blank" href="{{ route("guest-print",['id'=>$t->ticket_id,'post'=>$t->postal_code])}}"><i class="fa fa-print"></i></a>
										</td>
										<td>{!!  \Helper::delButton('ticket',$t->ticket_id) !!}</td>
									</tr>
        								
    								@endforeach
								</tbody>
							</table>
							<div class="row">
								<div class="col-md-12">
									<select>
										<option>10</option>
										<option>30</option>
										<option>50</option>
										<option>100</option>
									</select>
								</div>
							</div>
							{{ $tickets->links() }}
						
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@push('pagescript')
<script src="{{ asset('webarch/plugin/bootbox/bootbox.js') }}" type="text/javascript"></script>
<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>
<script type="text/javascript">


$("#go").click(function(e){

	e.preventDefault();
	var url  = $("#mytype option").filter(":selected").val();
	window.location.replace(url);
});

 $('[data-toggle="tooltip"]').tooltip(); 
</script>
@endpush