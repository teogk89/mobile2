<?php
require('../config.php');
header("Content-type: text/javascript");
echo'var WEB_ADDRESS='.json_encode(WEB_ADDRESS).',';
if(FULL_VERSION){
$collect_start_date=strftime("%d %b %Y");
foreach ($pickup_days as $val){
	$day=(int)date("w",strtotime($val['day']));
	$valid_days[]=$day;
	$pickup_times[$day]=$val['time'];
}

echo"collect_start_date=".json_encode($collect_start_date).",validDays=".json_encode($valid_days).",pickup_times=".json_encode($pickup_times).",";
}

echo"YES=".json_encode('YES').",NO=".json_encode('NO').",OTHER=".json_encode(OTHER)."

$(document).ready(function(e){";

if(FULL_VERSION){

echo"$('#warranty').change(function(){
var id=$(this).attr('id');
if ($(this).val()==YES) {
$('.warranty_info').show();
$('.warranty_info input').addClass(\"required\");
} else {
$('.warranty_info').hide();
$('.warranty_info input').removeClass(\"required\");
$('#warranty_date_order').val('');
$('#warranty_date_order2').val('');
}
});

$('#ordered_from').change(function(){
if ($(this).val()==OTHER) {
$('.ordered_from_other').show();
} else {
$('.ordered_from_other').hide().val('');
$('.ordered_from_other input').removeClass(\"required\");
$('#order_other').val('');

}
});

$('#pickup').change(function(){
		if ($(this).val()==YES) {
			$('.pickups').show();
			$('.pickupsx').show();
			$('#pickup_date').removeAttr('disabled').addClass('required');
		} else {
			$('.pickups').hide();
			$('.pickupsx').hide();
			$('#pickup_date').attr('disabled',true).removeClass('required');
			$('#pickup_date').val('');
		}
	}); 

$('#casco').change(function(){
if ($(this).val()==YES) $('#casco_options').show().addClass('required');
else {
$('#casco_options').hide().removeClass('required');
$('#casco_options').val('');
}
$('#casco_options').trigger('change');
});
$('#casco_options').change(function(){
if ($(this).val()==OTHER) {
$('.casco_other').show();
$('.casco_other input').focus().addClass('required');
}
else {
$('.casco_other').hide();
$('.casco_other input').removeClass('required');
$('#casco_other').val('');
}
});

$('#warranty_date_order').datepicker({
dateFormat: 'D, M dd, yy'
});

$('#warranty_date_order2').datepicker({
dateFormat: 'D, M dd, yy'
});

$('#repair_date').datetimepicker({
dateFormat: 'D, M dd, yy'
});

$('#pickup_date').datepicker({ 
		dateFormat: 'D, M dd, yy',
		minDate: new Date(collect_start_date),
		beforeShowDay:function(dt) {
			return [(jQuery.inArray(dt.getDay(),validDays)>-1) ? true : false];
		} ,
		onSelect:function(dt){
			var ds=new Date(dt), 
				selectedDay=ds.getDay();
			$('#pickup_time').html(pickup_times[selectedDay]);
		}
	});

";


} // php end



?>

$('#date_order_select').datepicker({
dateFormat: 'dd/mm/yy'
});

$('#deliver_date_select').datepicker({
dateFormat: 'dd/mm/yy'
});

$('#ticket-form').validate({
rules: {
imei_number: {
required: true,
rangelength: [0, 15]
}
}
});


$('#extra-other').change(function(){
if ($('#extra-other:checked').length!=0) {$('#extra-parts-other-container').show();}
else {$('#extra-parts-other-container').hide(); $('#extra_parts_other').val('');}
});


<?php
if ($print) {echo 'window.print()';}

echo"

});//end ready

";


?>
