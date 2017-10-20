<div class="row">
	<div class="col-md-12">
		<div class="grid simple">
			<div class="grid-title no-border">
				<h4>Techican</h4>
				<div class="tools">
	                    <a href="javascript:;" class="expand"></a>
	                    <a href="#grid-config" data-toggle="modal" class="config"></a>
	                    <a href="javascript:;" class="reload"></a>
	                    <a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="grid-body  no-border">
				<form action="{{ route('admin-ticket-edit-quick') }}" method="POST">
				{!! csrf_field() !!}
				
				<input type="hidden" name="id" value="{{ $ticket->ticket_id}}"/>
				<input type="hidden" name="type" value="tech"/>	
				<div class="row">
					<div class="col-md-12"></div>
				</div>	
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">{{TICKET_TECH}}</label>
							<span class="help"></span>
							<div class="controls">
								<select autocomplete="off"  name="ticket_tech" id="ticket_tech" class="form-control select required valid">
						            <option value="" disabled>{{SELECT}}</option>
						            <?php
						            
						            $tech = \DB::table("users")->where('role','tech')->get();

						            ?>

						            @foreach($tech as $te)

						              @if(isset($ticket->technician_id) && $ticket->technician_id == $te->id)
						               <option value="{{ $te->id}}" selected><?php echo $te->name ?></option>
						              @else

						               <option value="{{ $te->id}}"><?php echo $te->name ?></option>
						              @endif
						             

						            @endforeach
						        </select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">{{REPAIR_COST}}</label>
							<span class="help"></span>
							<div class="controls">
								 <input  required name="price" class="input-medium  form-control" value="<?php

							                 if(isset($ticket->repair_cost)){

							                        echo old('repair_cost',$ticket->repair_cost);
							                     }
							                     else{

							                       echo old('repair_cost');
							                     }



             ?>" name="repair_cost" id="costadmin" type="text">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">{{REPAIR_DATE}}</label>
							<span class="help"></span>
							<div class="controls">
								<input required id="datetimepicker1" class="form-control" name="repair_date" type="text" id="repair_date" value="<?php

                     if(isset($ticket->repair_date)){

                        echo old('repair_date',$ticket->repair_date);
                     }
                     else{

                       echo old('repair_date');
                     }



                ?>"  autocomplete="off">
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
				<button type="submit" data-color="rgb(255, 255, 255)" data-color-format="hex" id="cp4" class="btn btn-primary my-colorpicker-control" href="#" data-colorpicker-guid="1">{{ OPSLAAN }}</button>
			</div>
		</div>
	</div>
</div>
				</form>
			</div>
		</div>
	</div>
</div>