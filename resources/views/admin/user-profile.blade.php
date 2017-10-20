@extends('webarch.layouts.app')

@section("content")


<div class="clearfix"></div>
<div id="container">
@include('webarch.partial.my-profile',['url'=>route('admin-profile-save')])
</div>

@endsection


@push('pagescript')
<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>

<script>

$('.submit').preShow();

</script>

@endpush