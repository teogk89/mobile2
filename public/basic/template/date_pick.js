
function getAddress(b,e){

	e.preventDefault();
	var url = $(b).attr('data-url');
	var zipcode = $('input[name=postal_code]').val();
	var text = $(b).attr('data-ajax-text');
	if(zipcode == ""){

		$('input[name=postal_code]').focus();
		return false;
	}
	var label = $(b).text();
	$.ajax({
		dataType: "json",
		url:url,
		data:{type:'address',value:zipcode},
		beforeSend: function(){
			$(b).html(text+'...');
		},
		success:function(data){
			
			if(!$.isEmptyObject(data)){
				
					$('input[name=residence').val(data.straatnaam);
			$('input[name=city').val(data.plaats);
			$('select[name=country]').val('Nederland');
			//$('input[name=city').val(data['plaats']);
			}
		
			//alert(data);

		},
		complete:function(){

			$(b).html(label);
			
		},
		


	});
	
	
}

$.fn.preShow = function(){


	return this.each(function(){

		var data = $(this).attr('data-submit');
		if(data != ""){

			$(this).val(data);
		}
	});
};

$.fn.selectBoxShow = function(){


	return this.each(function(){

		//alert('hello');
		var selectBox = $(this);
		
		var boxClass = $(this).attr('data-object-class');
		var box = $('.'+boxClass+'');
		
		

		if($(this).attr('data-show') == selectBox.val()){

			box.show();
		}

		$(this).on("change",function(){

        		//console.log(selectBox.val());
        		if(selectBox.attr('data-show') == selectBox.val()){
        			box.find('input').addClass("required");

    				box.show();
    			}else{
    				box.find('input').removeClass("required");
    				box.hide();
    			}

        });


	});
};

$(document).ready(function(e){


$('.submit').preShow();
$('.preShow').selectBoxShow();


/*$('#warranty').change(function(){

console.log($(this));
//resubmitselectbox();
var yes = "<?php YES ?>"
console.log(yes);
var id=$(this).attr('id');
if ($(this).val()==YES) {
$('.warranty_info').show();
$('.warranty_info input').addClass("required");
} else {
$('.warranty_info').hide();
$('.warranty_info input').removeClass("required");
$('#warranty_date_order').val('');
$('#warranty_date_order2').val('');
}
});*/

/*$('#ordered_from').change(function(){
if ($(this).val()==OTHER) {
$('.ordered_from_other').show();
} else {
$('.ordered_from_other').hide().val('');
$('.ordered_from_other input').removeClass("required");
$('#order_other').val('');

}
});*/

/*$('#pickup').change(function(){
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
	}); */

/*$('#casco').change(function(){
if ($(this).val()==YES) $('#casco_options').show().addClass('required');
else {
$('#casco_options').hide().removeClass('required');
$('#casco_options').val('');
}
$('#casco_options').trigger('change');
});*/
/*$('#casco_options').change(function(){
if ($(this).val()==OTHER) {
$('.casco_other').show();
$('.casco_other input').focus().addClass('required');
}
else {
$('.casco_other').hide();
$('.casco_other input').removeClass('required');
$('#casco_other').val('');
}
});*/

$('#warranty_date_order').datepicker({
dateFormat: 'D, M dd, yy'
});

$('#warranty_date_order2').datepicker({
dateFormat: 'D, M dd, yy'
});

$('#repair_date').datetimepicker({
dateFormat: 'D, M dd, yy'
});
console.log(collect_start_date);
//var collect_start_date = ("");
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

if ($('#extra-other:checked').length!=0) {

	$('#extra-parts-other-container').show();
};

$('#extra-other').change(function(){
if ($('#extra-other:checked').length!=0) {$('#extra-parts-other-container').show();}
else {
	$('#extra-parts-other-container').hide(); 
	//$('#extra_parts_other').val('');

}
});




});