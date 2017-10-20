@extends('layouts.app')


@section('content')
	<style>

	#myform{

	background-color: #ffffff;

	margin-left:auto;
	margin-right:auto;
	float:none;		
	}



	</style>
	<div class="page-container row-fluid">
		<div class="page-content">
			@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content">	
		<div class="row">	
		<div id='myform' class="col-md-4 col-sm-12">	
          <br>
          <form action="login" class="login-form validate" id="login-form" method="post" name="login-form">
            <div class="row">
            	  {{ csrf_field() }}

              <div class="form-group col-md-10 ">
              	<h3><?php echo __('menu.logintext')?></h3>
              </div>		  
              <div class="form-group col-md-10">
                <label class="form-label">Username</label>
                <input class="form-control" id="txtusername" name="username" type="text" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-10">
                <label class="form-label">Password</label> <span class="help"></span>
                <input class="form-control" id="txtpassword" name="password" type="password" required>
              </div>
            </div>
            <div class="row">
              <div class="control-group col-md-10">
                <div class="checkbox checkbox check-success">
                 
                  <input name="keep" id="checkbox1" type="checkbox" value="1">
                  <label for="checkbox1">Keep me login</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10">
                <button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>
              </div>
            </div>
          </form>
        </div>
    	</div>
    	</div>
		</div>
	</div>

@stop