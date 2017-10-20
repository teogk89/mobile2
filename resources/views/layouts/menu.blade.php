<style>
.header{
padding:25px 0px 0px 0px;
border-bottom:1px solid #ddd;
background:url('<?php echo env('APP_URL').'/' ?>header-back.png') repeat;
}

 .list {
    position:relative;
right:150px;
width:200px;
background:#fff;
padding:7px 10px;
border:1px solid #ddd;
box-shadow:0px 1px 2px #ddd;
border-top:none;
border-bottom-left-radius:10px;
border-bottom-right-radius:10px;
font-size:12px;
line-height:20px;
color:#777;

margin-bottom:20px;
}

.list hr{

  margin-top:2px;
  margin-bottom:2px;
}

</style>

<div class="header navbar navbar-inverse " style="position:relative;background-color:#e5e9ec">

      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="header-seperation">
          <ul class="nav pull-left notifcation-center visible-xs visible-sm">
            <li class="dropdown">
              <a href="#main-menu" data-webarch="toggle-left-side">
                <i class="material-icons">menu</i>
              </a>
            </li>
          </ul>
          <!-- BEGIN LOGO -->
          <a href="index.html">
            <img src="assets/img/logo.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo2x.png" width="106" height="21" />
          </a>
          <!-- END LOGO -->
          <ul class="nav pull-right notifcation-center">
            <li class="dropdown hidden-xs hidden-sm">
              <a href="index.html" class="dropdown-toggle active" data-toggle="">
                <i class="material-icons">home</i>
              </a>
            </li>
            <li class="dropdown hidden-xs hidden-sm">
              <a href="email.html" class="dropdown-toggle">
                <i class="material-icons">email</i><span class="badge bubble-only"></span>
              </a>
            </li>
            <li class="dropdown visible-xs visible-sm">
              <a href="#" data-webarch="toggle-right-side">
                <i class="material-icons">chat</i>
              </a>
            </li>
          </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav" style="background-color:white;height:auto">
           <div class="clearfix"></div>
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="pull-left">
             
               
              <div class="logo" style="text-align:center;margin-left:200px">
                <a href="{{ env('APP_URL')}}"> <img  style="height:54px" class="img-responsive" src="{{ url(\Helper::logoPath()) }}"><br>
                <span style="letter-spacing:2px;">{{ env('APP_NAME') }}</span></a>
               </div>   
             
                 
             
          </div>
          <div id="notification-list" style="display:none">

          </div>
          <!-- END TOP NAVIGATION MENU -->
          <!-- BEGIN CHAT TOGGLER -->
          <div class="pull-right">
            <?php
              $shop = \Helper::shop();
            ?>
            <div class="list">
               <!-- Add your phone number here -->
               <div class="phone">
                  <i class="icon-phone"></i> Phone: <a href="tel:{{$shop->phone_nr}}"><?php echo $shop->phone_nr ?></a>
               </div>
               <hr>
               <!-- Add your email id here -->
               <div class="email">
                  <i class="icon-envelope-alt"></i> Email: <a href="mailto:{{$shop->shop_email}}">{{$shop->shop_email}}</a>
               </div>
               <hr>
               <!-- Add your address here -->
               <div class="address">
                    {!!  nl2br($shop->shop_address) !!}
               </div>
            </div>

          </div>
          <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
    
</div>