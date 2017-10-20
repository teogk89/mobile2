var picktime = [];

picktime[1] = '09:00-12:00'; 
picktime[4] = '18:00-20:00';
picktime[5] = '09:00-12:00';
picktime[6] = '17:00-19:00';

function getTimes(e){


    	var date = new Date(e.date);
    	
    	var mypicktime = picktime[date.getDay()];
  		$("#my_pickup_time").text(mypicktime);
  		$('input[name=pickup_time]').val(mypicktime);

}
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

function tableRowDel(a,b){

	
	var row = $(b);
	var token = row.attr('token');
	var url = row.attr('data-url');
	var model = row.attr('data-model');

	var send = {

		id:row.attr('data-id'),
		_token:token,
		model:model

	};
	bootbox.confirm("Are you sure to delete this record", function(result){
	 
		if(result){
			$.post(url,send);
			row.closest('tr').remove();
		}

	});
	
	
	
}
function checkBoxShow(a){

	var boxClass = $(a).attr('data-object-class');
	var box = $('.'+boxClass+'');
	
	box.show();

	if($(a).is(':checked')){

		box.find('input').attr("required", true);
		box.show();
	}else{

		box.find('select').removeAttr("required");
		box.hide();
	}
}

function editticket(a){


	var button = $(a);
	var select = button.parent('td').find('select').val();

	window.open(select);
}
$.fn.selectBoxShow = function(){


	return this.each(function(){


		//alert('hello');
		var selectBox = $(this);
		
		var boxClass = $(this).attr('data-object-class');
		var box = $('.'+boxClass+'');
		
		var type = $(this).attr("type");

		

		if(selectBox.attr('data-show') == selectBox.val()){
			//console.log("show me");
			box.show();
			box.find('input').attr("required", true);
			box.find('select').attr("required", true);
			
		}else{
			//console.log("showewww me");
			box.hide();
			box.find('select').removeAttr("required");
		}


		$(this).on("change",function(){

        		//console.log(selectBox.val());
        		if(selectBox.attr('data-show') == selectBox.val()){
        			box.find('input').addClass("required");
        			box.find('input').attr("required", true);
    				box.show();
    			}else{

    				box.find('input').removeAttr("required");
    				box.find('input').removeClass("required");
    				box.hide();
    			}

        });


	});
};


$.fn.preShow = function(){


	return this.each(function(){

		var data = $(this).attr('data-submit');
		if(data != ""){

			$(this).val(data);
		}
	});
};
