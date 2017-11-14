@extends('webarch.layouts.app')

@section("content")


<div class="clearfix"></div>
<div class="page-title">
       
</div>
<div id="container">
	<div class="row">

		<div class="col-md-12">
			@if(Session::has('success'))
				<div class="alert alert-success">
  					{{ Session::get("success") }}
				</div>
			@endif
			<div class="grid simple">
				<div class="grid-title no-border">

				</div>

				<form action="{{ route('admin-setting-save') }}" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}	
				<div class="grid-body no-border">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
                        		<label class="form-label"><strong>Facebook</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<input class="form-control" type="text" name="facebook" value="{{ $setting->facebook}}">
                        		</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="form-label"><strong>Facebook Message</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<textarea class="form-control" name="facebook_message">{{ $setting->facebook_message}}</textarea>
                        		</div>
                      		</div>
                      		
						</div>
						<div class="col-md-8">
							<div class="form-group">
                        		<label class="form-label"><strong>Twitter</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<input class="form-control" type="text" name="twitter" value="{{ $setting->twitter}}">
                        		</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="form-label"><strong>Twitter Message</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<textarea class="form-control" name="twitter_message">{{ $setting->twitter_message}}</textarea>
                        		</div>
                      		</div>
                      		
						</div>
						<div class="col-md-8">
							<div class="form-group">
              		<label class="form-label semi-bold"><strong>GooglePlus</strong></label>
              		<span class="help"></span>
              		<div class="controls">
                			<input class="form-control" type="text" name="googleplus" value="{{ $setting->googleplus}}">
            		  </div>
              </div>
          		<div class="form-group">
            		<label class="form-label"><strong>GooglePlus Message</strong></label>
            		<span class="help"></span>
            		<div class="controls">
              			<textarea class="form-control" name="googleplus_message">{{ $setting->	googleplus_message}}</textarea>
            		</div>
          		</div>
                      		
						</div>
            <div class="col-md-8">
              <div class="form-group">
                <label class="form-label"><strong>Email signature</strong></label>
                <span class="help"></span>
                <div class="controls">
                    <?php 
                        $setting2 = \DB::table('settings2')->where('name','email-signature')->first();
                    //$email_signature = "";
                    ?>
                    <textarea class="form-control" name="email_signature">{{ $setting2->myvalue}}</textarea>
                </div>
              </div>

            </div>
						<div class="col-md-8">
							
                      		<div class="form-group">
                        		<label class="form-label"><strong>All socials Message</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<textarea class="form-control" name="allsocials_message">{{ $setting->allsocials_message}}</textarea>
                        		</div>
                      		</div>
                      		<div class="form-actions">
                      <div class="pull-right">
                        <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                      
                      </div>
                    </div>
						</div>
					</div>
				</div>

				</form>

			</div>
		</div>
	</div>

	<!-- End social setting !-->

	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				
				<div class="grid-title no-border">

				</div>

				<div class="grid-body no-border">
					<form action="{{ route('admin-setting-save') }}" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}	
					<div class="row">
						<div class="col-md-8">

							<div class="form-group">
                        		<label class="form-label semi-bold"><strong>Bedrijf Adres</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<textarea class="form-control" name="shop_address">{{ $setting->shop_address}}</textarea>
                        		</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="form-label semi-bold"><strong>Ticketing Bedrijf Adres</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<textarea class="form-control" name="	receipt_adds">{{ $setting->	receipt_adds}}</textarea>
                        		</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="form-label semi-bold"><strong>Bedrijf Email adres</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<input class="form-control" type="text" name="shop_email" value="{{ $setting->shop_email}}">
                        		</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="form-label semi-bold"><strong>Phone nr</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<input class="form-control" type="text" name="phone_nr" value="{{ $setting->phone_nr}}">
                        		</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="form-label semi-bold"><strong>Agreement</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<textarea class="form-control" name="agreement">{{ $setting->agreement}}</textarea>
                        		</div>
                      		</div>
                      		<div class="form-group">
                        		<label class="form-label semi-bold"><strong>Logo</strong></label>
                        		<span class="help"></span>
                        		<div class="controls">
                          			<input type="file" name="logo"/>
                          			<img src="{{ url($setting->imageUrl()) }}"/>
                        		</div>
                      		</div>
                      		<div class="form-actions">
                      			<div class="pull-right">
                        			<button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                      
                      			</div>
                    		</div>
						</div>
					</div>	

					</form
				</div>
			</div>
		</div>
	</div>
</div>

@endsection