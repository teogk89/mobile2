@extends('webarch.layouts.app')

@section("content")


<div class="clearfix"></div>
<div id="container">
	<div class="row 2col">
		@if(Session::has('success'))
				<div class="alert alert-success">
  					{{ Session::get("success") }}
				</div>
		@endif
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">

				</div>
				<div class="grid-body no-border">
					<h4>{{ ADD_NEW_MODELS_TO_DATABASE}}</h4>

					<form action="{{ route('admin-save-brand') }}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="type" value="new"/>
					{!! csrf_field() !!}	
					<table class="table table-bordered ">
						<thead>
							<tr>
								<th>{{ BRAND}}</th>
								<th>{{IMAGE }}</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" name="name" class="form-control" required/></td>
								<td><input type="file" name="image" required/></td>
								<td><button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> {{ ADD_BRAND }}</button></td>
							</tr>
							
						</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- List all brands !-->
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">

				</div>
				<div class="grid-body no-border">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>{{ BRAND}}</th>
								<th>{{IMAGE }}</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($brands as $b)
							<form action="{{ route('admin-save-brand') }}" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id" value="{{ $b->id}}"/>
									{!! csrf_field() !!}
							<tr>
								<td>{{ $b->id}}</td>
								<td><input type="text" class="form-control" name="name" value="{{$b->name}}"/></td>
								<td>
								@if($b->imageAvailable())
								<a href="{{ url($b->imageUrl()) }}" data-toggle="lightbox" data-title=""><img style="width:24px" src="<?php echo url($b->imageUrl())  ?>"/></a>
								
								@else
								
								@endif	
								</td>
								<td><input type="file" name="image" /></td>
								<td>	<button type="submit" class="btn btn-success btn-cons">Update Brand</button></td>
							</tr>
								</form>
							@endforeach
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@push('extrajs')
<link href="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">



$("a[data-toggle='lightbox']").click(function(event){

	 event.preventDefault();
    $(this).ekkoLightbox();
});


function hello(e,b){

	

	var model = $(b);
	var a = confirm("Are you sure ?");

	
	if(a){

		return true;
	}else{
		e.preventDefault();

	}

	
}
</script>
@endpush