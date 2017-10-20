<?php
echo'<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8" />
  <!-- Title -->
  <title>'.$_SERVER['HTTP_HOST'].'</title>
  <!-- Description, Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  
  <link href="'.WEB_ADDRESS.'template/custom.php" rel="stylesheet" type="text/css" />
  <!-- Stylesheets -->
  <link href="'.WEB_ADDRESS.'template/style/bootstrap.css" rel="stylesheet" />
  <link href="'.WEB_ADDRESS.'template/style/animate.css" rel="stylesheet" />
  <link href="'.WEB_ADDRESS.'template/style/slider.css" rel="stylesheet" />
  <link href="'.WEB_ADDRESS.'template/style/prettyPhoto.css" rel="stylesheet" />
  <link rel="stylesheet" href="'.WEB_ADDRESS.'template/style/font-awesome.css" />
  <link rel="stylesheet" href="'.WEB_ADDRESS.'template/style/font-awesome.min.css" />
  <!--[if IE 7]>
  <link rel="stylesheet" href="'.WEB_ADDRESS.'template/style/font-awesome-ie7.css">
  <![endif]-->		
  <link href="'.WEB_ADDRESS.'template/style/style.css" rel="stylesheet" />
<!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
  <link href="'.WEB_ADDRESS.'template/style/blue.css" rel="stylesheet" />    
  <link href="'.WEB_ADDRESS.'template/style/bootstrap-responsive.css" rel="stylesheet" />
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="'.WEB_ADDRESS.'template/js/html5shim.js"></script>
  <![endif]-->
<link rel="stylesheet" type="text/css" href="'.WEB_ADDRESS.'template/js/jquery-ui.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
?>
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<?php

echo'</head><body>

<header>
   <div class="container">
      <div class="row">
         <div class="span4">
            <!-- Logo and site link -->
            <div class="logo" style="text-align:center;" class="visible-md visible-lg">
              <a href="'.WEB_ADDRESS.'"> <img class="img-responsive" src="'.WEB_ADDRESS.'images/'.$settings_sql['logo'].'" ><br/>
               <span style="letter-spacing:2px;">Repair Ticket System v2.0b</span></a>
        
            </div>
         </div>
         <div class="span4 offset4">
            <div class="list">
               <!-- Add your phone number here -->
               <div class="phone">
                  <i class="icon-phone"></i> Phone: <a href="tel:'.$settings_sql['phone_nr'].'">'.$settings_sql['phone_nr'].'</a>
               </div>
               <hr />
               <!-- Add your email id here -->
               <div class="email">
                  <i class="icon-envelope-alt"></i> Email: <a href="mailto:'.$settings_sql['shop_email'].'">'.$settings_sql['shop_email'].'</a>
               </div>
               <hr />
               <!-- Add your address here -->
               <div class="address">
                  <i class="icon-home"></i> '.nl2br($settings_sql['shop_address']).'
               </div>
            </div>
         </div>
      </div>
   </div>

</header>

<div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            Menu
          </a>
          <div class="nav-collapse collapse">';
          
          if(!isset($_SESSION['checkuser'])){  
          echo'
        <ul class="nav pull-right shareme hidden-phone hidden-tablet">
        <li>
        <a href="'.$settings_sql['facebook'].'"><i class="icon-facebook"></i> <br/>Follow </a> 
        </li>
        <li>
        <a href="'.$settings_sql['twitter'].'"><i class="icon-twitter"></i> <br/>Follow </a> 
        </li>
        <li>
        <a href="'.$settings_sql['googleplus'].'"><i class="icon-google-plus"></i> <br/>Follow </a> 
        </li>
        </ul>';
        }
        
            echo'<!-- Navigation links starts here -->
             <ul class="nav">
              <!-- Main menu -->';
          
echo'<li class="hidden-phone hidden-tablet"> 
	<a href="#" class="nav-brand" id="view-fullscreen"><i class="icon-fullscreen"></i></a>
	</li>';	

if(!isset($_SESSION['checkuser'])){      
echo'<li><a href="'.WEB_ADDRESS.'offline_ticket.php">'.NEW_TICKET.'</a> </li>';
echo'<li><a href="'.WEB_ADDRESS.'check-ticket.php">'.CHECK_TICKET.'</a> </li>';    
    
} else { echo'<li><a href="'.WEB_ADDRESS.'ticket.php">'.NEW_TICKET.'</a> </li>';}

echo'<li><a href="'.WEB_ADDRESS.'intern/">'.INTERN.'</a></li>';
echo'<li><a href="'.WEB_ADDRESS.'queryprice.php">Prijzen</a></li>';

	if (is_admin($_SESSION['checkuser'])) {
		
		echo'
		<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<b class="caret"></b></a>
                <!-- Submenus -->
                <ul class="dropdown-menu">
                  <li><a href="'.WEB_ADDRESS.'intern/adcprice.php">'.PRICES_M.'</a></li>
		  <li><a href="'.WEB_ADDRESS.'intern/settings.php">'.SETTINGS.'</a></li>
		  <li><a href="'.WEB_ADDRESS.'intern/backup.php">'.BACKUP.'</a></li>
		  <li><a href="'.WEB_ADDRESS.'intern/technicians.php">'.TECHNICIANS.'</a></li>
		  <li><a href="'.WEB_ADDRESS.'intern/users.php">'.USERS.'</a></li>
		<li><a href="'.WEB_ADDRESS.'intern/customers.php">'.CUSTOMERS.'</a></li>
		</ul></li>
		<li><a href="'.WEB_ADDRESS.'stock_bind.php">Stock</a></li>
              '; //	<li><a href="'.WEB_ADDRESS.'stock_bind.php">Stock</a></li>
		
	}
	
	if(is_tech($_SESSION['checkuser'])){
	
	echo'<li><a href="'.WEB_ADDRESS.'intern/customers.php">'.CUSTOMERS.'</a></li>';
	
              }
              if(isset($_SESSION['checkuser'])){
        echo'<li><a href="'.WEB_ADDRESS.'intern/notices.php">Notices</a></li>';
	echo'<li><a href="'.WEB_ADDRESS.'intern/orders_list.php">Orders</a></li>';
	echo'
		<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">E-mail<b class="caret"></b></a>
                <!-- Submenus -->
                <ul class="dropdown-menu">
                  <li><a href="'.WEB_ADDRESS.'intern/mail_system.php">View e-mails</a></li>
		  <li><a href="'.WEB_ADDRESS.'intern/mail_system.php?mail">'.SEND_MAIL.'</a></li>
		</ul></li>
              '; 
              }
	
	$user=userid($_SESSION['checkuser']);
	if(!empty($user)){
	echo'<li><a href="'.WEB_ADDRESS.'intern/login.php?logout">'.LOGOUT.'</a></li>';
	}
	
	
		
echo' </ul> 
 </div> </div> </div> </div>
 
 
 <!-- Content starts -->
';
echo'<div class="content">';
 echo'  <div class="container">
      <div class="row c2">
         <div class="span12">
         
         ';
?>