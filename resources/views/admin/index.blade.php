@extends('layouts.app')


@section('content')
<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content">

			<div class="row">
				<div class="col-md-12">
					<div class="grid simple">
						<div class="grid-title"></div>
						<div class="grid-body">

							<div class="row">
								<div class="col-md-12">
									<select id='mytype'>
										<option value="/admin/type/0/per/<?php echo $per ?> <?php echo ($type=='0' ? 'selected="selected"':'') ?>"><?php echo __("admin.all") ?></option>
										@foreach ($typecolec as $m=>$ty)

											@if($m == $type)
											<option value="/admin/type/<?php echo $m ?>/per/<?php echo $per?>" selected="selected"><?php echo $ty ?></option>
											@else
											<option value="/admin/type/<?php echo $m ?>/per/<?php echo $per?>"><?php echo $ty ?></option>
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
										<th><?php echo __('admin.change')?></th>
										<th><?php echo __('admin.edit')?></th>
										<th><?php echo __('admin.editnotition')?></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($tickets as $t)
									<tr>
										<td><?php echo $t->ticket_id ?></td>
										<td><?php echo $t->ticket_date ?></td>
										<td><?php echo $t->name ?></td>
										<td><?php echo $t->phone_model.' '.$t->phone_type ?></td>
										<td><?php echo $t->repair_status ?></td>
										<td>
											<select>
												<option><?php echo __('content.choose')?></option>
												@foreach ($typecolec as $m=>$ty)
												<option><?php echo $ty ?></option>
												@endforeach
											</select>
										</td>
										<td><i class="fa fa-edit"></i></td>
										<td><i class="fa fa-file-o"></i></td>
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

	</div>

@stop

@push('pagescript')
<script type="text/javascript">


$("#go").click(function(e){

	e.preventDefault();
	var url  = $("#mytype option").filter(":selected").val();
	window.location.replace(url);
});


</script>
@endpush