<?php 
//<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>

echo'
<script type="text/javascript" src="'.WEB_ADDRESS.'template/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="'.WEB_ADDRESS.'template/js/jquery-ui.js"></script>
<script src="'.WEB_ADDRESS.'template/js/bootstrap.js"></script>
<script src="'.WEB_ADDRESS.'template/js/filter.js"></script>
<script src="'.WEB_ADDRESS.'template/js/custom.js"></script>';

if(SCRIPT!=="install.php"){
if (is_admin($_SESSION['checkuser'])) {
echo"\n<script src=\"".WEB_ADDRESS."template/js/customjs.php\"></script>\n";
}
}
echo'<script src="'.WEB_ADDRESS.'template/js/fullscreen.js"></script>
<script src="'.WEB_ADDRESS.'js/jquery.timepicker.js"></script>
<script src="'.WEB_ADDRESS.'template/date_pick.php"></script>
<script src="'.WEB_ADDRESS.'js/jquery.validate.min.js"></script>
<script type="text/javascript" src="'.WEB_ADDRESS.'template/js/jquery.form.min.js"></script>';
//<script src="'.WEB_ADDRESS.'js/jquery.tooltip.js"></script>
?>

<?php 
echo'
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
</html>';


?>