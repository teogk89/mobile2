@extends('webarch.layouts.app')

@section("content")

<div class="clearfix"></div>
<div class="page-title">
       
</div>
<div id="container">
	<div class="row">
		<div class="col-md-12 white">

			<div class="grid simple">

				<div class="grid-title no-border">

				</div>
				<div class="grid-body no-border">
					<h4>Notices</h4>
					<table class="table">

						<thead>
							<tr>
								<th>#</th>
								<th>{{ NOTICE }}</th>
								<th>{{ TICKET_ID }}</th>
								<th>Description</th>
								<th>Opened</th>
								<th>Modified</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($result as $r)
							<tr>
								<td>{{ $r->id}}</td>
								<td>{{ $r->notice_name}}</td>
								<td>{{ $r->ticket->ticket_id}}</td>

								<td><?php echo substr($r->notice_content, 0, 45) ?></td>
								<td>{{ $r->notice_date}}</td>
								<td>{{ $r->mods_date}}</td>
								<td><a href="{{ route('admin-notice-edit',['id'=>$r->id])}}"><i class="fa fa-edit fa-2x"></i>  </a></td>
								<td>{!!  \Helper::delButton('notice',$r->id) !!}</td>
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