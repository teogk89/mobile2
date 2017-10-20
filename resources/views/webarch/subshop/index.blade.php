@extends('webarch.layouts.app2')

@section('content')


<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:10px">
			<div class="row">
				<div class="col-md-12">
                @include('webarch.partial.notify')
					<div class="grid simple">
						<div class="grid-body no-border">
							
							<table class="table table-striped">
								<thead>
									<tr>
										<th><a href="?<?php  ?>"><i class="icon-sort"> <?php echo ORDER_ID; ?> </i> </a></th>
										<th><a href="?<?php  ?>"><i class="icon-sort"> <?php echo REG_DATE; ?> </i> </a></th>
										<th><?php echo PHONE_MODEL; ?></th>
										<th><a href="?<?php  ?>"> <?php echo CLIENT_ISSUE_V; ?> </a></th>
										<th>Print</th>
									</tr>
								</thead>
								<tbody>

									@foreach($tickets as $t)
										<tr>
											<td><a href="{{ route('guest-view-ticket',['id'=>$t->ticket_id,'post'=>$t->postal_code])}}"><?php echo $t->ticket_id ?></a></td>
											<td><?php echo $t->ticket_date ?></td>
											<td><?php echo $t->phone_model ?></td>
											<td><?php echo $t->repair_status ?></td>
											<td>
												<a  href="{{ route("guest-print",['id'=>$t->ticket_id,'post'=>$t->postal_code])}}"><i class="fa fa-print"></i></a>
											</td>
										</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection




