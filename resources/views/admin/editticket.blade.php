@extend('basic.layout')



@section('content')
<?php
	
	
	//$input = ( $edit == TRUE ? '':'disabled="disabled"');
	$input = ( $view_only == TRUE ? 'disabled="disabled"':"");
?>

<div class="respond well span12">
	@include('basic.form.ticket',['url'=>'/updateticket'])
</div>

@endsection