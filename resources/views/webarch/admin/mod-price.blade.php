@extends('webarch.layouts.app')

@section("content")



<div class="clearfix"></div>
<div class="page-title">
       
</div>
<div id="container">
	<div class="row">
		<div class="col-md-2">

			<div class="grid simple">
				<div class="grid-title no-border">
					<h4 class="text-error bold">{{ $model->mybrand->name }}</h4>
				</div>
				 <div class="grid-body no-border">
				 	<img style="width:100%" src="{{ url('/images/brands/'.$model->mybrand->images.'')  }}"/>
				 </div>
			</div>
			
		</div>
		
		

	</div>
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
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">
                   <div class="grid-body no-border table-responsive">
                   		<form method="POST" action="{{ route('admin-model-edit',['id'=>$model->id]) }}" enctype="multipart/form-data">
                   			{!! csrf_field() !!}
                   			<table class="table" >
                   				<thead>
                   					<tr>
                   						<th>#</th>
                   						<th>{{MODEL_NAME}}</th>
                   						<th>{{BRAND}}</th>
                   						<th></th>
                   						<th>{{IMAGE }}</th>
                   						<th></th>
                   					</tr>
                   				</thead>
                   				<tbody>
                   					<tr>
                   						<td>{{ $model->id}}</td>
                   						<td><input type="text" name="mdname" value="{{ $model->mdname}}" /></td>
                   						<td>
                   							<select name="brand">
                   								@foreach($brand as $br){
                   								<option value="{{ $br->nr}}" <?php echo ($br->nr == $model->brand ? 'selected':'') ?>>{{ $br->name}}</option>

                   								@endforeach
                   							</select>

                   						</td>
                   						<td>
                   							@if($model->imageAvailable())
                   							<a href="{{ url('/images/phones/'.$model->image.'') }}" data-toggle="lightbox" data-title=""><img style="width:24px" src="<?php echo url('/images/phones/'.$model->image.'') ?>"/></a>
                   							@endif
                   						</td>
                   						<td>
                   							<input type="file" name="image"/>
                   						</td>
                   						<td>
                   							<button type="submit" class="btn btn-success btn-cons">Update Model</button>
                   						</td>
                   						<td><button type="submit" onclick="hello(event,this)" name="submit" value="delete" class="btn btn-danger btn-cons"><i class="fa fa-trash-o"></i></button></td>
                   					</tr>

                   				</tbody>
                   			</table>

                   		</form>	
                   </div>
                </div>
			</div>
		</div>
	</div>
	<div class="row 2col">
		<div class="col-md-12">
			
			<div class="grid simple">
				<div class="grid-title no-border">
                   
                </div>
                <div class="grid-body no-border table-responsive">
					

					{!! csrf_field() !!}
					<table class="table" >
						<thead>
							<tr>
								<th>{{ ISSUE}}</th>
								<th>{{ PRICE}}</th>
								<th>{{ IMAGE}}</th>
								
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<form method="POST" action="{{ route('admin-mod-price-add',['id'=>$model->id]) }}" enctype="multipart/form-data">
									<td><input name="repair_question" type="text" /></td>
									<td><input name="question_price" type="text" /><i style="padding-top:5px;padding-left:2px" class="fa fa-euro fa-2x" aria-hidden="true"></i></td>
									<td><input name="image" type="file" /></td>
									<td><button type="submit" class="btn btn-success btn-cons">Add question</button></td>
								</form>		
							</tr>
						</tbody>
					</table>
					
                </div>
			</div>
		</div>
	</div>
	@if($model->questions->count() > 0)
	<div class="row 2col">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">
                   
                </div>
                <div class="grid-body no-border">
					

					
					<table class="table">
						<thead>
							<tr>
								<th>NR</th>
								<th >{{ ISSUE}}</th>
								<th>{{ PRICE}}</th>
								<th>{{ IMAGE}}</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($model->questions as $q)
							
						
							<tr>
							<form method="POST" action="{{ route('admin-mod-price-edit') }}" enctype="multipart/form-data">
								<input type="hidden" name="id" value="{{ $q->id}}"/>
								{!! csrf_field() !!}
								<td>{{ $q->id}}</td>
								<td style="width:30%"><input name="repair_question" style="width:100%" type="text" value="{{$q->repair_question}}"/></td>
								<td><input type="text" name="question_price" value="{{$q->question_price}}"  /><i style="padding-top:5px;padding-left:2px" class="fa fa-euro fa-2x" aria-hidden="true"></i></td>
								<td><input name="image" type="file" /></td>
								<td><a href="{{ url('/images/questions/'.$q->question_image.'') }}" data-toggle="lightbox" data-title=""><img style="width:24px" src="<?php echo url('/images/questions/'.$q->question_image.'') ?>"/></a></td>
								<td><button type="submit" class="btn btn-success btn-cons">Update question</button></td>
								<td><button type="submit" onclick="hello(event,this)" name="submit" value="delete" class="btn btn-danger btn-cons"><i class="fa fa-trash-o"></i></button></td>
							</tr>
							</form>		
							@endforeach
						</tbody>
					</table>
					
                </div>
			</div>
		</div>
	</div>


	@endif

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