$(document).ready(function() { 
	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			success:       afterSuccess,  // post-submit callback 
			uploadProgress: OnProgress, //upload progress callback 
			resetForm: false        // reset the form after successful submit 
		}; 
		


  var options2 = { 
      target:   '#invoicetable',   // target element(s) to be updated with server response 
      beforeSubmit:  function(){
          $('#submit-btn').val('Uploading...');
         // beforeSubmit();
      },  // pre-submit callback 
      success:   function(){
        $('.myImg').on('click',function(e){

          e.preventDefault();
          var modal = $('#myModal');
          modal.css('display','block');
        //  modal.style.display = "block";
          $('#img01').attr('src',$(this).attr('href'));
          $('#caption').html($(this).attr('alt'));

          $('.close').on('click',function(){

             $('#myModal').hide();
          });

        });
        //afterSuccess();
      },  // post-submit callback 
      uploadProgress: function(){}, //upload progress callback 
      resetForm: true,
      complete: function(){

        $('#submit-btn').val('Upload');
      }        // reset the form after successful submit 
    }; 

     $('#MyUploadForm1').submit(function() { 

      $(this).ajaxSubmit(options2);        
      // always return false to prevent standard browser submit and page navigation 
      return false; 
    });
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// always return false to prevent standard browser submit and page navigation 
			return false; 
		}); 
		

    $('#invoicetable').submit(function(){
          $(this).ajaxSubmit(
              {
                target:'#invoicetable',
               
                success:function(){
                    alert("Records have been updated");
                },
              }
            );    
          return false;

    });

//function after succesful file upload (when server response)
function afterSuccess()
{

if( $('#FileInput').val() == "" && $('#xstatus').val() !== "" ) //check empty input filed
{		
	$('#submit-btn').show(); //show submit button
	$('#loading-img').hide(); //hide loading
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
	setTimeout(function() {window.location.reload(true); }, 2000);
// setTimeout(function() { $('#onajaxupload').click();  }, 2000); //reload after 2 seconds
 return true;
}

else{
if(  $('#FileInput').val() == "" && $('#xstatus').val() == "" && $('#xsoption').val() !== "" ) //check empty input filed
{
	$('#submit-btn').show(); //show submit button
	$('#loading-img').hide(); //hide loading
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
	setTimeout(function() {window.location.reload(true); }, 2000);
// setTimeout(function() { $('#onajaxupload').click();  }, 2000); //reload after 2 seconds
 return true;
 }
 
 else{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
	setTimeout(function() {window.location.reload(true); }, 2000);
	 //setTimeout(function() { $('#onajaxupload').click();  }, 2000); 
}

}
}

//function to check file size before uploading.
function beforeSubmit(){
var remember = document.getElementById('onlystatus');

if(  $('#FileInput').val() == "" && $('#xstatus').val() !== "" && remember.checked ) //check empty input filed
{

$('#submit-btn').hide(); //hide submit button
$('#loading-img').hide();
$("#output").html("");  

return true;

}

else {

if(  $('#FileInput').val() == "" && $('#xstatus').val() == "" && $('#xsoption').val() !== "" && remember.checked  ) //check empty input filed
{

if(  $('#FileInput').val() == "" && $('#xstatus').val() == "" && $('#xsoption').val() !== "" && remember.checked  )

{
	
	
$('#submit-btn').hide(); //hide submit button
$('#loading-img').hide();
$("#output").html("");  

return true;
}

else {
			$("#output").html("Are you kidding me?");
			return false
	}
		
}
	}	

if( !$('#FileInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
else{	

    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		var fsize = $('#FileInput')[0].files[0].size; //get file size
		var ftype = $('#FileInput')[0].files[0].type; // get file type
		

		//allow file types 
		switch(ftype)
        {
            case 'image/png': 
			case 'image/gif': 
			case 'image/jpeg': 
			case 'image/pjpeg':
			case 'text/plain':
			case 'text/html':
			case 'application/x-zip-compressed':
			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.ms-excel':
			case 'video/mp4':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 5 MB (1048576)
		if(fsize>5242880) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
			return false
		}
				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
	

}




}

//progress bar function
function OnProgress(event, position, total, percentComplete)
{
if( $('#FileInput').val() == "" && $('#xstatus').val() !== "" ) //check empty input filed
{	
return true;
}

else{	
    //Progress bar
	$('#progressbox').show();
    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
if( $('#FileInput').val() == "" && $('#xstatus').val() !== "" ) //check empty input filed
{

return false;

}	

else{	
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}



$('#select-all').click(function(event) {
        var $that = $(this);
        $(':checkbox').each(function() {
            this.checked = $that.is(':checked');
        });
    });

}); 


$(function(){
$('[data-toggle="tooltip"]').tooltip({
    'placement': 'top'
});
$('[data-toggle="popover"]').popover({
    trigger: 'hover',
        'placement': 'top'
});

$('[data-toggle="pop"]').tooltip({
    'show': true,
        'placement': 'bottom',
        'title': "Click "
});

$('#userNameField').tooltip('show');
});


/* adding ajax hover support for static item */ 

$('.hover-ajax').popover({
    "html": true,
    trigger: 'hover',
    "content": function(){
        var div_id =  "tmp-id-" + $.now();
        return details_in_popup($(this).attr('href'), div_id);
    }
});

function details_in_popup(link, div_id){
    $.ajax({
        url: link,
        success: function(response){
            $('#'+div_id).html(response);
        }
    });
    return '<div id="'+ div_id +'">Loading...</div>';
}



$('.img-ajax').popover({
    "html": true,
    trigger: 'hover',
    'placement': 'left',
    "content": function(){
        var div_id =  "tmp-id-" + $.now();
        return image_in_popup($(this).attr('href'), div_id);
    }
});

function image_in_popup(link, div_id){
    $.ajax({
        url: "ajax_image_popover.php?img="+link,
        success: function(response){
            $('#'+div_id).html(response);
        }
    });
    return '<div id="'+ div_id +'" style="text-align:center;">Loading...</div>';
}



/* Support list */

$("#slist a").click(function(e){
   e.preventDefault();
   $(this).next('p').toggle(200);
});

/* Portfolio */

// filter items when filter link is clicked
$('#filters a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});

function reload()
    {
        var img = new Image();
        img.src = 'captcha.php';
        var x = document.getElementById('captcha');
        x.src = img.src;
    }
    
        
/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_type = new ActiveXObject("Microsoft.XMLHTTP");
} else {
request_type = new XMLHttpRequest();
}
return request_type;
}

var http = createObject();
    
/* -------------------------- */
/* SEARCH */
/* -------------------------- */



function searchNameqReply() {
if(http.readyState == 4){
var response = http.responseText;
document.getElementById('search-result').innerHTML = response;
}
}

function searchNameq() {
searchq = encodeURI(document.getElementById('searchq').value);
// Set te random number to add to URL request
nocache = Math.random();
http.open('get', 'search.php?q='+searchq+'&nocache = '+nocache);
http.onreadystatechange =  searchNameqReply;
http.send(null);
}

function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}

function clearSearch(){
$(function(){

$('#main_menu').click(function(e) {  
$('#searchq').attr('value','');
});

$('#main').click(function(e) {  
$('#searchq').attr('value','');
});


});


/* $('body').click(function() { 
 	$('#searchq').attr('value','');
 	//searchNameq();
      });
*/
}


/* -------------------------- */
/*   add zip code by search   */
/* -------------------------- */

/* based on http://www.w3schools.com/php/php_ajax_php.asp*/

function zipNameq(putID,searchID) {

var searchp = encodeURI(document.getElementById(searchID).value);
// Set te random number to add to URL request

//if(searchp.length=="6"){

document.getElementById(putID).value='';

nocache = Math.random(); 

http.onreadystatechange=function() {
    if (http.readyState==4 && http.status==200) {
      document.getElementById(putID).value += http.responseText;
    }
  } 
  
if(putID =="mail_to"){
http.open('get', 'zipnameq.php?p='+searchp+'&nocache='+nocache);
}

else{
http.open('get', 'zipnameq.php?q='+searchp+'&nocache='+nocache);
}

//http.success =  insertText(putID, reply);
http.send(null);
//}

}

/*********************************/

function socials(userID,socialACT,returnTO) {

var getclass = document.getElementById(returnTO).className;

nocache = Math.random(); 

build = 'user='+userID+'&action='+socialACT+'&nocache='+nocache+'';


$.ajax(
   {
      type:'GET',
      url:'socials.php',
      data: build,
      success: function(data){
        document.getElementById(returnTO).className += data;
      }
   }
);

}


function orderstate(userID,stateACT,returnTO) {

var getclass = document.getElementById(returnTO).className;

nocache = Math.random(); 

build = 'order='+userID+'&action='+stateACT+'&nocache='+nocache+'';


$.ajax(
   {
      type:'GET',
      url:'order_state.php',
      data: build,
      dataType: "json", // Set the data type so jQuery can parse it for you
      success: function(data){
      //http://stackoverflow.com/questions/19503631/ajax-how-to-use-a-returned-array-in-a-success-function
      document.getElementById(returnTO).className = data[0];
      document.getElementById(userID).className = data[2];
      document.getElementById(returnTO).title = data[1];
      $('#'+returnTO).attr('data-original-title',data[1]);
      }
   }
);

}


function smsstate(smsID,smsACT,smsTO) {

var getclass = document.getElementById(smsTO).className;

nocache = Math.random(); 

build = 'order='+smsID+'&action='+smsACT+'&nocache='+nocache+'';


$.ajax(
   {
      type:'GET',
      url:'sms_state.php',
      data: build,
      dataType: "json", // Set the data type so jQuery can parse it for you
      success: function(data){
      //http://stackoverflow.com/questions/19503631/ajax-how-to-use-a-returned-array-in-a-success-function
      document.getElementById(smsTO).className = data[0];
      document.getElementById(smsTO).title = data[1];
      $('#'+smsTO).attr('data-original-title',data[1]);
      }
   }
);

}
