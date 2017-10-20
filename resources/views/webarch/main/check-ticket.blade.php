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
                     
               <form class="" role="form" method="POST" action="{{ route('guest-view-ticket') }}">
             

{!! csrf_field() !!}
                 <div class="row-fluid">
                   <h3>Reparatie Status Bekijken</h3>
                    @if ($errors->has('password'))
                                                    
                      
                    @endif


@if(Session::has('danger'))
        <div class="alert alert-danger">
           
            <p class="text-error"> {{ Session::get("danger") }}</p>
        </div>
        @endif
                    
                    <br>
                    <div class="row form-row">
                      <div class="input-append col-md-10 col-sm-10 primary">
                      	<label>OrderBon nr:</label>
                        <input id="appendedInput" name="id" class="form-control" placeholder="Uw kaartje is identiek 130079" type="text"/>
                      
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="input-append col-md-10 col-sm-10 primary">
                      	<label>Postcode of Klant Naam</label>
                        <input id="appendedInput2" name="post" class="form-control" placeholder="Postcode van het ticket 4561AB"/>
                       
                      </div>
                    </div>
                    
                    <br/>
                    <br/>
                    <div class="row form-row">
                      <div class="input-append col-md-10 col-sm-10 primary">
                         <button type="submit" class="btn btn-primary btn-cons-md"> Enter</button>
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
