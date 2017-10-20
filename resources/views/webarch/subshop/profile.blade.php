@extends('webarch.layouts.app2')

@section('content')


<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:10px">
			@include('webarch.partial.my-profile',['url'=>route('shop-profile-save')])
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