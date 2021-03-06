<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Invoice status</h4>
				<div class="tools">
	                    <a href="javascript:;" class="expand"></a>
	                    <a href="#grid-config" data-toggle="modal" class="config"></a>
	                    <a href="javascript:;" class="reload"></a>
	                    <a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="grid-body  no-border">
				<div id="table-invoice">
					@include('webarch.partial.table-invoice',['ticket'=>$ticket])
				</div>
			<hr/>
			<form action="{{ route('admin-invoice-upload')}}" method="POST" enctype="multipart/form-data" id="MyUploadForm1" autocomplete="off">
				<input type="hidden" name="id" value="{{ $ticket->ticket_id}}"/>
				{!! csrf_field() !!}
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="form-label"></label>
						<span class="help"></span>
						<div class="controls">
							<select name="xstatus_option" id="xsoption" class="form-control input-large">
				
	       		<option value="0">Unpaid</option>
	       		<option value="1">Paid </option>
	       	</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label class="form-label">Note</label>
			<span class="help"></span>
			<div class="controls">
				<textarea maxlength="300" class="form-control"  rows="4" name="xstatus" id="xstatus" ></textarea> 
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label"></label>
			<span class="help"></span>
			<div class="controls">
				<input type="file" name="FileInput" class="form-control"/>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label"></label>
			<span class="help"></span>
			<div class="controls">
				<button type="submit" data-color="rgb(255, 255, 255)" data-color-format="hex" id="cp4" class="btn btn-primary my-colorpicker-control" href="#" data-colorpicker-guid="1">opslaan</button>
			</div>
		</div>
	</div>
</div>
			</form>	

			</div>
		</div>
	</div>
</div>