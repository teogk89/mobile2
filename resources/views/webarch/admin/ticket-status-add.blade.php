@extends('webarch.layouts.app')


@section('content')
<style>

 .colorpicker-2x .colorpicker-saturation {
        width: 200px;
        height: 200px;
    }

    .colorpicker-2x .colorpicker-hue,
    .colorpicker-2x .colorpicker-alpha {
        width: 30px;
        height: 200px;
    }

    .colorpicker-2x .colorpicker-color,
    .colorpicker-2x .colorpicker-color div {
        height: 30px;
    }

</style>
<div class="clearfix"></div>
<div id="container">
	
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title">
					<div class="grid-body">
						@include('webarch.partial.notify')
						<form action="{{ route('admin-ticket-status-save')}}" method="POST">
							<div class="col-md-8 col-sm-8 col-xs-8">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="form-label">
										Status
									</label>

									@if($state == 'edit')
									<input type="hidden" value="{{ $status->id}}" name="id"/>

									@endif
									<input type="hidden" class="form-control" name="state" value="{{ $state}}"/>
									<div class="controls">
										<input type="text" name="startus" required class="form-control"

											value="<?php

												if(isset($status)){

													echo $status->startus;
												}

											?>"

										/>
									</div>	
								</div>
								<div class="form-group">
									<label class="form-label">
										Description
									</label>
									<div class="controls">
										<input type="text" name="description"  class="form-control"

											value="<?php 

												if(isset($status)){

													echo $status->description;
												}

											?>"
										/>
									</div>	
								</div>
								<div class="form-group">
									<label class="form-label">
										Color
									</label>
									<div class="controls">
										<div id="cp2" class="input-group colorpicker-component">
    										<input type="text" name="colors" value="<?php

    											if(isset($status)){

    												echo $status->colors;
    											}

    										?>" required class="form-control" />
    										<span class="input-group-addon"><i></i></span>
										</div>
									
									</div>	
								</div>
								<div class="form-group">
									<label class="form-label">
									
									</label>
									<div class="controls">
										<input type="checkbox" name="active" value="1"<?php  

											if(isset($status) && ($status->active != 0 )){

												echo 'checked';
											}

											if(!isset($status)){

												echo 'checked';
											}

										?>> Active<br>
									</div>
								</div>
								<div class="form-actions">
                      				<div class="">
                        				<button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                        				
                      				</div>
                    			</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	


@endsection


@push("extrajs")

<link href="{{ asset('webarch/plugin/bootstrap-colorpicker-master/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
<script src="{{ asset('webarch/plugin/bootstrap-colorpicker-master/dist/js/bootstrap-colorpicker.js') }}"></script>
<script>
$('#cp2').colorpicker({
	customClass: 'colorpicker-2x',
	format:'hex',
	 sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            }
});	

</script>

@endpush