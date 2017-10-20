<?php 

$theme = 'webarch';

?>


@extends('webarch.layouts.app2')



@section('content')

<div class="page-container row-fluid">
  <div class="page-content">
    @include('layouts/menu2')
    <div class="clearfix"></div>
    <div class="content" style="padding-top:0px">
      <div class="page-title">
        
      </div>
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <div class="grid simple">
            <div class="grid-body no-border">
                <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
                     
               <form class="" role="form" method="POST" action="{{ route('login') }}">
                 {{ csrf_field() }}

                 <div class="row-fluid">
                   <h3>Inloggen naar <span class="text-info">Zakelijk Paneel</span></h3>
                    @if ($errors->has('password'))
                                                    
                      <p class="text-error">{{ $errors->first('password') }}</p>
                    @endif
                    
                    <br>
                    <div class="row form-row">
                      <div class="input-append col-md-10 col-sm-10 primary">
                        <input id="appendedInput" name="email" class="form-control" placeholder="someone@example.com" type="text">
                        <span class="add-on"><span class="arrow"></span><i class="fa fa-align-justify"></i> </span>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="input-append col-md-10 col-sm-10 primary">
                        <input id="appendedInput2" name="password" class="form-control" placeholder="your password" type="password">
                        <span class="add-on"><span class="arrow"></span><i class="fa fa-lock"></i> </span>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-10 col-sm-10 primary">
                          <input type="checkbox" name="remember" checked>  <?php echo REMEMBER; ?></label>
                       
                      </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="row form-row">
                      <div class="input-append col-md-10 col-sm-10 primary">
                         <button type="submit" class="btn btn-primary btn-cons-md"> Login</button>
                      </div>
                    </div>
                </div>
                 
               </form>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>


@endsection
