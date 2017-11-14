@extends('webarch.layouts.app')

@section('content')

<style>
.isubbmited_no{

	color:#30add1;
}

.isubbmited{

	color: #69d169;
}

</style>
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
								<th>Socialmedia email</th>
								
								<th>Total ticket</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach($subshop as $s)
						<tr>
							<td>{{$s->id}}</td>
							<td>{{$s->name}}</td>
							<td>{{$s->email}}</td>
							<td>
								<i data-id = "{{ $s->id }}" data-type="facebook" class="<?php echo ($s->sendSocial('invited_facebook')  ? 'isubbmited':'isubbmited_no sendClick') ?> fa fa-facebook fa-2x"></i>
								<i data-type="google" data-id = "{{ $s->id }}" class="<?php echo ($s->sendSocial('invited_googleplus')  ? 'isubbmited':'isubbmited_no sendClick') ?> fa fa-google-plus fa-2x"></i>
								<i data-id="{{ $s->id }}" data-type="twitter" class="<?php echo ($s->sendSocial('invited_twitter')  ? 'isubbmited':'isubbmited_no sendClick') ?> fa fa-twitter fa-2x"></i>
								<i data-type="all" data-id="{{ $s->id }}" class="<?php echo ($s->sendSocial('invited_all')  ? 'isubbmited':'isubbmited_no sendClick') ?>   fa fa-sitemap fa-2x"></i>

							</td>
							<td></td>
							<td></td>
							<td>{{$s->tickets->count()}}</td>
							<td>
								<select>
									@foreach($s->tickets as $t)
									<option value="{{ route('admin-edit-ticket',['id'=>$t->ticket_id]) }}"># {{$t->ticket_id}}</option>
									@endforeach
								</select>
								<button onclick="editticket(this)" class="edit-ticket btn btn-primary">View</button>
								
								

							</td>
							<td><a href="{{ route('admin-new-ticket',['id'=>$s->id])}}"><button  class="btn btn-primary">New Ticket</button></a></td>
							<td>
								<a target="_blank" href="{{route('admin-user-profile',['id'=>$s->id])}}"><i class="fa fa-edit fa-2x"></i>  </a>
							</td>
							<td>
								{!!  \Helper::delButton('subshop',$s->id) !!}
							</td>
						</tr>
						@endforeach	
						</tbody>
					</table>
						{{ $subshop->links() }}
				</div>
			</div>
		</div>
	</div>
		
</div>

@endsection

@push('pagescript')
@push('pagescript')
<script src="{{ asset('webarch/plugin/bootbox/bootbox.js') }}" type="text/javascript"></script>

<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>


<script>

var token = '<?php echo csrf_token() ?>';

var url = '<?php echo route("common-api-post") ?>';
$('.sendClick').click(function(){

	var id = $(this).attr('data-id');
	var type = $(this).attr("data-type");
	var object = $(this);
	bootbox.confirm("Are you sure",function(result){

		if(result == true){

		var send = {_token:token,id:id,type:'social',social:type};
		console.log(result);

		object.removeClass('isubbmited_no');
		object.addClass('isubbmited');
		$.post(url,send);

		}
		
	});
});



</script>

@endpush