
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8" />
  <!-- Title -->
  <title>{{ env('APP_NAME') }}</title>
  <!-- Description, Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  
  <link href="{{ asset('basic/template/custom.css') }}" rel="stylesheet" type="text/css" />
  <!-- Stylesheets -->
  <link href="{{ asset('basic/template/style/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ asset('basic/template/style/animate.css') }}" rel="stylesheet" />
  <link href="{{ asset('basic/template/style/slider.css') }}" rel="stylesheet" />
  <link href="{{ asset('basic/template/style/prettyPhoto.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('basic/template/style/font-awesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('basic/template/style/font-awesome.min.css') }}" />
  <!--[if IE 7]>
  <link rel="stylesheet" href="http://localhost:5000/template/style/font-awesome-ie7.css">
  <![endif]-->		
  <link href="{{ asset('basic/template/style/style.css') }}" rel="stylesheet" />
<!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
  <link href="{{ asset('basic/template/style/blue.css') }}" rel="stylesheet" />    
  <link href="{{ asset('basic/template/style/bootstrap-responsive.css') }}" rel="stylesheet" />
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="http://localhost:5000/template/js/html5shim.js"></script>
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="{{ asset('basic/template/js/jquery-ui.css') }}">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.png" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
</head>

<body>
  <header>
   <div class="container">
      <div class="row">
         <div class="span4">
            <!-- Logo and site link -->
            <div class="logo" style="text-align:center;" class="visible-md visible-lg">
              <a href="<?php echo env('APP_URL') ?>"> <img class="img-responsive" src="<?php echo env('APP_URL') ?>/images/{{$shop->logo}}" ><br/>
               <span style="letter-spacing:2px;">Repair Ticket System v2.0b</span></a>
        
            </div>
         </div>
         <div class="span4 offset4">
            <div class="list">
               <!-- Add your phone number here -->
               <div class="phone">
                  <i class="icon-phone"></i> Phone: <a href="tel:<?php echo $shop->phone_nr  ?>"><?php echo $shop->phone_nr  ?></a>
               </div>
               <hr />
               <!-- Add your email id here -->
               <div class="email">
                  <i class="icon-envelope-alt"></i> Email: <a href="mailto:<?php echo $shop->shop_email  ?>"><?php echo $shop->shop_email  ?></a>
               </div>
               <hr />
               <!-- Add your address here -->
               <div class="address">
                  <i class="icon-home"></i><?php echo nl2br($shop->shop_address) ?>
               </div>
            </div>
         </div>
      </div>
   </div>

  </header>
  @include('basic/layouts/menu')

  <!-- Content starts -->

  <div class="content">
    <div class="container">
      <div class="row c2">
        <div class="span12">
          @yield('content')
        </div>
      </div>
    </div>  
  </div>

<script type="text/javascript" src="/basic/template/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="/{{ $template }}/template/js/jquery-ui.js"></script>
<script src="/{{ $template }}/template/js/bootstrap.js"></script>
<script src="/{{ $template }}/template/js/filter.js"></script>



<script src="/{{ $template }}/template/js/fullscreen.js"></script>
<script src="/{{ $template }}/js/jquery.timepicker.js"></script>

<script src="/{{ $template }}/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/{{ $template }}/template/js/jquery.form.min.js"></script>
@stack('extrajs')
@if(Auth::check())
  @if(Auth::user()->isAdmin())
  <script src="/{{ $template }}/template/js/custom.js"></script>
  @endif

@endif


<script src="/{{ $template }}/template/date_pick.js"></script>
<footer>
<div class="container">
    <div class="row">
      <div class="span4">

      <div class="span12"><hr>
      <ul>
      <li><a href="#">Copyright  &copy; Secgsm online reparatie systems</a> </li>
      <li><a href="mailto:secgsm@gsmhardware.com">secgsm@gsmhardware.com</a> </li>
      <li><a href="tel:0031627415161">tel: 0031 627 41 51 61</a></li>
      </ul>
      
     <!-- <p class="copy"><a href="#">&copy; Copyright Secgsm online reparatie systems</a> | <a href="mailto:secgsm@gsmhardware.com">secgsm@gsmhardware.com</a> | <a href="tel:0031627415161">tel: 0031 627 41 51 61</a></p> -->
     
      </div>
               
    </div>
  </div>
</footer>
</body>
</html>