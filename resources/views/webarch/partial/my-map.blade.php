
<?php

	$code = $ticket->getGeoCode2();

?>

@if($code)
<!-- <div class="row">
<div class="col-md-8">
		<div class="form-group">
			<h4 class="text-success">User Address by Geocode : {{ $code }}</h4>
		</div>
</div>
<div class="col-md-4">
	<div class="form-group">
	<button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-cons"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Map</button>
	</div>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                            	<h4>{{ $code }}</h4>
                            </div>
                            <div class="modal-body">
                            	
                            	{!! \Helper:: googleMapFrame($ticket->postal_code) !!}

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                         
                        </div>
                      
</div> -->
@endif