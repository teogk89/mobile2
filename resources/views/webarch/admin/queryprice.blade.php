@extends('webarch.layouts.app')

@section('content')



<div class="clearfix"></div>
<div class="page-title">
       
</div>

<div id="container">


			<div class="row">
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
						<div class="grid-body">
							<div class="row">
								@foreach($brands as $b)
								<div class="col-md-2">

									@if($b->imageAvailable())
									<a><img style="width:100%" src="<?php echo $b->imageUrl() ?>"/></a>
									@endif
								
									<a href="<?php echo  route('admin-query-price-model',['id'=>$b->nr])?>"><h4 style="text-align: center;"><?php echo $b->name ?></h4></a>
								</div>
								@endforeach
							</div>
							<div class="row">
								<div class="col-md-12">
									 	{{ $brands->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
</div>


@stop


@push('pagescript')
<script type="text/javascript">


$('#mysearch').keyup(function(){

	var string = $(this).val();
	var url='/search?table=phonemodels&col=mdname&temp=table&type=admin&p='+string;

	$.getJSON(url,function(data){
		$('#count').html(data[0]);
		$('#result').html(data[1]);
	});
});


</script>
@endpush