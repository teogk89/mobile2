<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Repair status</h4>
				<div class="tools">
	                    <a href="javascript:;" class="expand"></a>
	                    <a href="#grid-config" data-toggle="modal" class="config"></a>
	                    <a href="javascript:;" class="reload"></a>
	                    <a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="grid-body  no-border">
				<div class="row">
					<div class="col-md-12">
						@include("webarch.partial.repair-status-table")
					</div>
				</div>
				<form action="{{ route('admin-ticket-edit-quick')}}" method="POST" enctype="multipart/form-data" >
				{!! csrf_field() !!}
				<input type="hidden" name="id" value="{{$ticket->ticket_id}}"/>
				<input type="hidden" name="type" value="status-add"/>	
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label"></label>
							<span class="help"></span>
							<div class="controls">
								<select name="detail" id="xsoption" class="form-control input-large">
		<option value="" selected="selected" disabled="">{{ PLEASE_SELECT }}</option>
       		@foreach($repair_status_options as $repair_status)

       		<option value="{{ $repair_status }}">{{ $repair_status }}</option>
       		@endforeach
       	</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label class="form-label">{{ TICKET_STATUS }}</label>
			<span class="help"></span>
			<div class="controls">
				<textarea maxlength="300" class="form-control" rows="4" name="xstatus" id="xstatus"></textarea> 
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
				<input type="file" name="image" class="form-control" />
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