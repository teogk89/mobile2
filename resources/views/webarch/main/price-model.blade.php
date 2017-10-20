@extends('webarch.layouts.app2')

@section('content')


<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:10px">
			<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="grid simple">
								<div class="grid-body">
									<div class="row">
										<div class="col-md-offset-5 col-md-2">
											@if($model->imageAvailable())
												<img style="width:100%" src="{{ url($model->imageUrl())}}">
											@endif
											
											<h4 style="text-align: center;">{{ $model->mdname}}</h4>
								</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table">
												<thead>
													<th>Vraag/Klacht</th>
													
													<th></th>
													<th>Prijs</th>
													<th></th>
												</thead>
												<tbody>
													@foreach($model->questions as $q)
													<tr>
														<td>
															{{ $q->repair_question}}
														</td>
														
														<td>
															@if($q->imageAvailable())

															<a href="{{ url($q->imageUrl()) }}" data-toggle="lightbox" data-title=""><img style="width:24px" src="<?php echo url($q->imageUrl())  ?>"/></a>
															@endif
														</td>
														<td>
															{{ $q->question_price}}
														</td>
														<td>
															<input class="price" type="checkbox" value="{{ $q->question_price }}"/>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="button" onclick="getTotal()" class="btn btn-success btn-cons">Breken uw reparatie kosten</button>
											<h3 id="result" style="float:right;display:none">Total: <span style="color:red;"><span id="final">88</span> €</span> </h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			
		</div>
	</div>
</div>
@endsection

@push('pagescript')
<link href="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}" type="text/javascript"></script>
<script>
	

$("a[data-toggle='lightbox']").click(function(event){

	 event.preventDefault();
    $(this).ekkoLightbox();
});

	function getTotal(){

			var total = 0;
			$('.price').each(function(){

			
				if($(this).is(':checked')){

					total +=  parseFloat($(this).val());
					
				}
				
				
			});

			$('#final').text(total);
			$('#result').show();

	}
</script>

@endpush