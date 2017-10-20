
			@include("webarch.partial.notify")
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-3">
					<div class="grid simple">
						<div class="grid-body">
							<form action="{{ $url }}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $user->id }}"/>
								<input type="hidden" name="type" value="password"/>
								<div class="row">
									<div class="col-md-12">
										<h3>Change password</h3>
									</div>
								</div>
								<div class="row">
  
									<div class="col-md-12">
										<div class="form-group">
					                        <label class="form-label">Password</label>
					                        <span class="help"></span>
					                        <div class="controls">
					                        	<input type="password" name="password" class="form-control"/>
					                        </div>
					                      </div>
									</div>
									
								</div>
								<div class="row">

									<div class="col-md-12">
										<div class="form-group">
					                        <label class="form-label">Confirm</label>
					                        <span class="help"></span>
					                        <div class="controls">
					                        	<input type="password" name="confirm" class="form-control"/>
					                        </div>
					                      </div>
									</div>
									
								</div>
								<div class="row">

									<div class="col-md-12">
										<div class="form-group">
					                        <label class="form-label"></label>
					                        <span class="help"></span>
					                        <div class="controls">
					                        	<button type="submit" class="btn btn-primary btn-cons">Opslaan</button>
					                        </div>
					                      </div>
									</div>
									
								</div>
							</form>

						</div>
						
					</div>
				</div>
				<div class="col-md-9">
					<div class="grid simple">
						<div class="grid-body">
							@include('webarch.form.profile')
						</div>
					</div>
				</div>
			</div>


			<!-- Begin profile !-->

			<div class="row">

			</div>

		