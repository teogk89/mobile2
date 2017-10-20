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
  <!-- Stylesheets -->
  <link href="'.WEB_ADDRESS.'template/style/print_bootstrap.css" rel="stylesheet" />	
<!-- Color Stylesheet - orange, blue, pink, brown, red or green-->
  <link href="'.WEB_ADDRESS.'template/style/print_blue.css" rel="stylesheet" />    
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="'.WEB_ADDRESS.'template/js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/favicon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
?>
</head>
<body onload="window.print()">
   <div class="container">
      <div class="row">