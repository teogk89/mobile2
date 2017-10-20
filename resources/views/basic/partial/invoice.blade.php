<div class="span11" style="text-align:right; font-size:12px;"></div>
<div class="control-group span11">  <br>

	<form action="/admin/invoice/edits" method="POST" autocomplete="off" id="invoicetable">
		
		@if(count($ticket->invoices) > 0)	
		
			
			
					@include('basic.partial.table-invoice',['ticket'=>$ticket])
			
		
        @endif
	</form>
	<div class="span11"> <hr/> </div>
	<div class="control-group span12">
		<h3>Invoice File Uploader</h3>
		<form action="{{ $url}}" method="post" enctype="multipart/form-data" id="MyUploadForm1" autocomplete="off">
			{!! csrf_field() !!}
			<select name="xstatus_option" id="xsoption" class="form-control input-large">
				
	       		<option value="0">Unpaid</option>
	       		<option value="1">Paid </option>
	       	</select>
	       		
			<br/><h4>Note</h4> 
			<textarea maxlength="300" class="span11"  rows="4" name="xstatus" id="xstatus" ></textarea> 
			<br/>
			
			<input style="margin-left: 0px; margin-right: 0px; width: 10px;" 
			type="checkbox" name="onlystatus" id="onlystatus" value="1" /> No file / Only Status.
			<br/><br/>
			
			<input style="margin-left: 0px; margin-right: 0px; width: 210px;" name="FileInput" id="FileInput" type="file" class="input-medium btn btn-warning"/> &nbsp;
			<input style="margin-left: 0px; margin-right: 0px; width: 210px;" type="submit"  id="submit-btn" class="btn-large btn-success" value="Upload" />
			<input type="hidden" name="id" value="{{ $ticket->ticket_id}}" />

			<img src="/basic/template/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
		</form>
		<div id="progressbox" >
			<div id="progressbar"></div >
			<div id="statustxt">0%</div>
		</div>
		<div id="output"></div>
	</div>
</div>