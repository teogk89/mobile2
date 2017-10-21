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
				<div class="grid-title">
					<div class="grid-body">
						<a href="{{ route('admin-ticket-status-add')}}"type="button" class="btn btn-success btn-cons">New ticket status</a>

						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Status</th>
									<th>Color</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($status as $s)
								<tr>
									<td>{{ $s->id}}</td>
									<td>{{ $s->startus}}</td>
									<td><div style="background:{{ $s->colors}};"class="box blue"></div></td>
									<td>
										<a href="{{ route('admin-ticket-status-add',['id'=>$s->id]) }}"><i class="fa fa-edit"></i></a>
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


@endsection