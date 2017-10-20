@extends('webarch.layouts.app')

@section("content")


<div class="clearfix"></div>
<div id="container">
	<div class="row">
		<div class="col-md-8">
			@include('webarch.partial.notify')
			<div class="grid simple">
				<div class="grid-body">
					@include('webarch.form.profile',['url'=>route('admin-profile-save'),'mode'=>'new'])
				</div>
			</div>
		</div>
	</div>

</div>

@endsection


@push('pagescript')
<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>

<script>

$('.submit').preShow();

</script>

@endpush