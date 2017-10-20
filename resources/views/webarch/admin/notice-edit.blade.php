<?php

$user = \Auth::user();

?>

@extends($layout)



@if($user->isAdmin())

@section("content")

<div class="clearfix"></div>
<div class="page-title">
       
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
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4>Note for ticket #{{ $ticket_id }}</h4>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-8">
							@include('webarch.form.notice-form',['type'=>'edit'])
						</div>
					</div>
					
				</div>

			</div>
			
		</div>
	</div>
</div>

@endsection


@endif

@if($user->isTech())

@section('content')

<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:10px">
			<div class="grid simple">
				<div class="grid-body">
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
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4>Note for ticket #{{ $ticket_id }}</h4>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-8">
							@include('webarch.form.notice-form',['type'=>'edit'])
						</div>
					</div>
					
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

@endif


