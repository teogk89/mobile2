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
						<div class="grid-body no-border">
							<table class='table'>
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>phone type</th>
										<th>phone model</th>
										<th>reason</th>
										<th>{{ DATE }}</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($tickets as $t)
									<tr>
										<td>{{ $t->ticket_id }}</td>
										<td>{{ $t->name }}</td>
										<td>{{ $t->phone_model }}</td>
										<td>{{ $t->phone_type }}</td>
										<td>
											@if($t->reason != null || $t->reason != '')
													{{ $t->getReason(40) }}
											@endif
										</td>
										<td>{{ $t->ticket_date}}</td>
										<td><a href="{{ route('tech-ticket-edit',['id'=>$t->ticket_id])}}"><i class="fa fa-edit"></i></a></td>
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