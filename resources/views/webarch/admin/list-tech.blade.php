@extends('webarch.layouts.app')

@section('content')


<div class="clearfix"></div>

<div id="container">
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-body">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Total ticket</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>
						@foreach($subshop as $s)
						<tr>
							<td>{{$s->id}}</td>
							<td>{{$s->name}}</td>
							<td>{{$s->email}}</td>
							<td>{{$s->tech->count()}}</td>
							<td>
								<select>
									@foreach($s->tech as $t)
									<option value="{{ route('admin-edit-ticket',['id'=>$t->ticket_id]) }}"># {{$t->ticket_id}}</option>
									@endforeach
								</select>
								<button onclick="editticket(this)" class="edit-ticket btn btn-primary">View</button>
								
								

							</td>
							<td></td>
							<td>
								<a target="_blank" href="{{route('admin-user-profile',['id'=>$s->id])}}"><i class="fa fa-edit fa-2x"></i>  </a>
							</td>
							<td>
								{!!  \Helper::delButton('tech',$s->id) !!}
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

@endsection

@push('pagescript')
<script src="{{ asset('webarch/plugin/bootbox/bootbox.js') }}" type="text/javascript"></script>
<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>


@endpush