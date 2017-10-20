@extends('basic.layouts.app')



@section('content')
<?php
	
	
	//$input = ( $edit == TRUE ? '':'disabled="disabled"');
	$input = ( $view_only == TRUE ? 'disabled="disabled"':"");
?>
@if(Session::has('success'))
   
    <div class="alert alert-success">
   {{ Session::get('success') }}
</div>
@endif
<div class="well span12">
        <div class="btn">
          <a style="text-decoration: none;" href=""  onclick="return confirm('Are you sure you want to delete this ticket?');">
{{ DELETE }} # {{$ticket->ticket_id}}</a>
        </div>"

</div>
<div class="respond well span12">
	
	@include('basic.form.ticket',['url'=>'/admin/saveticket'])

	@if(count($ticket->details) > 0)

	<div class="span11" style="margin-top:10px;"> <hr/> </div>

	<form>
		<div class="control-group span11">
			<div class="span11" style="text-align:right; font-size:12px;"> 
				<br/>
				<table class="table table-striped">
					<thead>
						<tr>
						<th>{{ TICKET_STATUS }}</th>
						<th>{{ DATE }}</th>
						<th>{{ FILE }}</th>          
						<th>{{ DELETE }}</th>          
						</tr>
					</thead>
					<tbody>
						@foreach($ticket->details as $detail)
						<tr>
							<td>{{ $detail->ticket_status }}</td>
							<td>{{ $detail->date_added }}</td>
							<td></td>
							<td><input name="delete_attach[]" value="{{ $detail->id }}" type="checkbox"></td>
						</tr>


						@endforeach
					</tbody>
				</table>
			</div>
			<div class="form-actions pull-right">
    			<button id="invoicetablesubmit" type="submit" name="saveprint_offline" class="btn btn-info">update</button>                                    
			</div>	
		</div>
	</form>
	<div class="span11" style="margin-top:10px;"> <hr/> </div>
	@endif


	<div class="control-group span12"><h3>Ajax File Uploader</h3>
		<form action="" method="post" enctype="multipart/form-data" id="MyUploadForm">
		
		<select name="xstatus_option" id="xsoption" class="form-control input-large">
		<option value="" selected="selected" disabled="">{{ PLEASE_SELECT }}</option>
       		@foreach($repair_status_options as $repair_status)

       		<option value="{{ $repair_status }}">{{ $repair_status }}</option>
       		@endforeach
       	</select>
       		
		<br><h4>{{ TICKET_STATUS }}</h4> 
		<textarea maxlength="300" class="span11" rows="4" name="xstatus" id="xstatus"></textarea> 
		<br>
		
		<input style="margin-left: 0px; margin-right: 0px; width: 10px;" name="onlystatus" id="onlystatus" value="1" type="checkbox"> No file / Only Status.
		<br><br>
		
		<input style="margin-left: 0px; margin-right: 0px; width: 210px;" name="FileInput" id="FileInput" class="input-medium btn btn-warning" type="file"> &nbsp;
		<input style="margin-left: 0px; margin-right: 0px; width: 210px;" id="submit-btn" class="btn-large btn-success value=" upload="" type="submit">
		<input name="id" value="135665" type="hidden">
		<img src="http://localhost:5000/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait">
		</form>
		
		<div id="progressbox"><div id="progressbar"></div><div id="statustxt">0%</div></div>
		<div id="output"></div>
	</div>
	<div class="span11" style="margin-top:10px;"> <hr/> </div>
	@include('basic.partial.invoice',['url'=>'/admin/invoice/upload'])

	<!-- The Modal -->
	<div id="myModal" class="modal">
  		<span class="close">&times;</span>
  		<img class="modal-content" id="img01">
  		<div id="caption"></div>
	</div>
     
</div>

@endsection


@push('extrajs')
<?php if(FULL_VERSION):?>
<?php
	$pickup_times = [];
	$collect_start_date=strftime("%d %b %Y");
	foreach ($pickup_days as $val){
		$day=(int)date("w",strtotime($val['day']));
		$valid_days[]=$day;
		$pickup_times[$day]=$val['time'];
	}
?>
<script type="text/javascript">
var WEB_ADDRESS = "<?php echo env('APP_URL') ?>/";
//var collect_start_date="04 Jul 2017",validDays=[1,4,5,6],pickup_times={"1":"09:00-12:00","4":"18:00-20:00","5":"09:00-12:00","6":"17:00-19:00"},YES="YES",NO="NO",OTHER="Andere"


var collect_start_date = <?php echo json_encode($collect_start_date) ?>;
var validDays = <?php echo json_encode($valid_days) ?>;
var pickup_times = <?php echo json_encode($pickup_times) ?>;
var YES = <?php echo json_encode('YES') ?>;
var NO = <?php echo json_encode("NO") ?>;
var OTHER = <?php echo json_encode(OTHER) ?>;



</script>
<?php endif?>
<script type="text/javascript">


function myModal(){

	$('.myImg').on('click',function(e){

		e.preventDefault();
		var modal = $('#myModal');
		modal.css('display','block');
	//	modal.style.display = "block";
		$('#img01').attr('src',$(this).attr('href'));
		$('#caption').html($(this).attr('alt'));

		$('.close').on('click',function(){

			 $('#myModal').hide();
		});

	});
}
myModal();
</script>
@endpush