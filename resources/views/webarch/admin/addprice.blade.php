@extends('webarch.layouts.app')

@section("content")

<div class="clearfix"></div>
<div class="page-title">
            <h3> </h3>
</div>
<div id="container">
	<div class="row">
		<div class="col-md-12">
			@if(Session::has('success'))
				<div class="alert alert-success">
  					{{ Session::get("success") }}
				</div>
			@endif

			@if(Session::has('danger'))
				<div class="alert alert-danger">
  					{{ Session::get("danger") }}
				</div>
			@endif
		</div>
	</div>
	<div class="row 2col">
		<div class="col-md-4">
					
					<div class="row">
						<div class="col-md-12 tiles white clearfix">
							<div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey no-margin">
										<h3><?php echo __('content.searchbybrand') ?></h3>
									</div>
							
							<div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey no-margin">
										<input id="mysearch" type="text" class="form-control"/>
									</div>
									<div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey no-margin">
										<h4>Total <span id="count"></span></h4>
									</div>
									<div id="result" class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey no-margin">
										
									</div>
						</div>
					</div>
				</div>
		<div class="col-md-8">
			<div class="grid simple">
				<div class="grid-title no-border">
                   
                </div>
                <div class="grid-body no-border">
                	 <h4> {{ PRICES_M }}	</h4>
                	<table class="table table-bordered ">
						<thead class="cf">
							<tr>
								<th>#</th>
								<th></th>
								<th>{{MODEL_NAME}}</th>
								<th>{{BRAND}}</th>
								<th>{{MODEL_QUESTIONS}}</th>
								<th>{{EDIT}}</th>
								<th>{{DELETE_MODEL}}</th>
							</tr>
						</thead>
						<tbody>
						@foreach($myresult as $r)
						<tr>
							<td>{{ $r['id'] }}</td>
							<td><a href="{{ url('/images/phones/'.$r['image'].'') }}" data-toggle="lightbox" data-title="{{ $r['name'] }}"><img style="width:24px" src="<?php echo url('/images/phones/'.$r['image'].''); ?>"/></a></td>
							<td>{{ $r['name'] }}</td>
							<td>{{ $r['brand'] }}</td>
							<td>{{ $r['question'] }}</td>
							<td><a href="{{ route('admin-mod-price',['id'=>$r['id']])  }}"><i class="fa fa-edit fa-2x"></i>  </a></td>
							<td>{!!  \Helper::delButton('phone-model',$r['id']) !!}</td>
						</tr>

						@endforeach
						</tbody>
					</table>
					{{$result->links()}}
                </div>
		
			</div>

		</div>

	</div>
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>


</div>


@endsection


@push('extrajs')
<script src="{{ asset('webarch/plugin/bootbox/bootbox.js') }}" type="text/javascript"></script>

<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>
<link href="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.css') }}" rel="stylesheet" type="text/css" />
 <script src="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">



$("a[data-toggle='lightbox']").click(function(e){

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
$('#mysearch').keyup(function(){

	var string = $(this).val();
	var url='<?php echo env("APP_URL") ?>/search?table=phonemodels&col=mdname&temp=table&type=admin&p='+string;

	$.getJSON(url,function(data){
		$('#count').html(data[0]);
		$('#result').html(data[1]);
	});
});
</script>
@endpush