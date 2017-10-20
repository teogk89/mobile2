@extends('webarch.layouts.app')

@section("content")


<div class="clearfix"></div>
<div id="container">
	<div class="row 2col">
		<div class="col-md-12">

			<div class="grid simple">

				@if(Session::has('success'))
				<div class="alert alert-success">
  					{{ Session::get("success") }}
				</div>
				@endif
				
				<div class="grid-title no-border">

				</div>
				<div class="grid-body no-border">
					<h4 >{{ ADD_NEW_MODELS_TO_DATABASE }}<span class="pos-demo"></span></h4>
					<form method="POST" action="{{ route('admin-save-model')}}" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<table class="table table-bordered ">
						<thead>
							<tr>

								<th>{{ MODEL }}</th>
								<th>{{ BRAND }}</th>                      
								<th>{{ IMAGE }}</th>   
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" name="name" required/></td>	
								<td>
									<select name="brand" required>
										<option disabled>{{ SELECT }}</option>
										@foreach($brand as $br)
										<option value="{{ $br->nr}}">{{ $br->name}}</option>
										@endforeach
									</select>

								</td>
								<td><input  type="file" name="myimage" required/></td>
							</tr>

						</tbody>
					</table>
					<div class="form-action">
						<div class="pull-right">
                        <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> {{ ADD_MODEL }}</button>
                       
                      </div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@push('extrajs')
<script src="{{ asset('assets/plugins/notify.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.3/underscore-min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.10/backbone-min.js"></script>
<script src="{{ asset('assets/plugins/jquery-notifications/js/messenger.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-notifications/js/messenger-theme-future.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-notifications/js/demo/location-sel.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-notifications/js/demo/theme-sel.js') }}"></script>
<!-- END -->
<!-- BEGIN PAGE LEVEL JS -->

<script type="text/javascript" src="assets/js/notifications.js"></script>


@endpush