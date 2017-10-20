
							<form action="{{ $url }}" method="POST">
								<input type="hidden" name="id" value="{{ $user->id }}"/>
								<input type="hidden" name="type" value="profile"/>
								@if(isset($mode))
								<input type="hidden" name="mode" value="{{$mode }}"/>
								@endif
								<div class="row">
									<div class="col-md-12">
										<h4>Profile</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
											<div class="form-group">
							                        <label class="form-label">{{ CUSTOMER_NAME }}</label>
							                        <span class="help"></span>
							                        <div class="controls">
							                          <input name="name" class="form-control" required type="text" value="<?php
													             echo $user->name

							                           ?>">
							                        </div>
							                      </div>
								</div>
												<div class="col-md-3">
		<div class="form-group">
                        <label class="form-label">{{CUSTOMER_GENDER }}</label>
                        <span class="help"></span>
                        <div class="controls">
                        	<select name="gender" id="gender" required class="submit form-control" data-submit="<?php

						       
						            echo $user->address->gender;
						       
						        ?>">
          						<option value="" disabled>{{SELECT}}</option>  
           						<option value="MALE" selected="selected">{{MALE}}</option>
          						<option value="FEMALE" >{{FEMALE}}</option>
        					</select>		
                        
                        </div>
                      </div>
	</div>
	@if(isset($mode) && $mode == 'new')
	<div class="col-md-3">
		<div class="form-group">
                        <label class="form-label">Role</label>
                        <span class="help"></span>
                        <div class="controls">
                        	<select name="role" id="gender" required class="submit form-control" data-submit="">
          						<option value="" disabled>{{SELECT}}</option>  
           						<option value="subshop" selected="selected">Subshop</option>
          						<option value="tech" >Technican</option>
        					</select>		
                        
                        </div>
                      </div>
	</div>

	@endif



								</div>
								<div class="row">
										<div class="col-md-3">
		<div class="form-group">
                        <label class="form-label">{{ POSTAL_CODE }}</label>
                        <span class="help"></span>
                        <div class="controls">
                          <input  type="text" class="form-control" name="postal_code" id="zipcode" maxlength="6" value="<?php

                   
                         echo $user->address->postcode;
                     

                  

                    ?>">
                        </div>
        </div>
	</div>
		<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ STREET_NR }}</label>
			<span class="help"></span>
			<div class="controls">
				<input  class="form-control required" name="str_nr" id="street_nr" type="text" value="<?php

        			  echo $user->address->str_nr;
         ?>" 
         >
			</div>
		</div>
	</div>
								</div>
								<div class="row">
									<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ CUSTOMER_ADDRESS }}</label>
			<span class="help"></span>
			<div class="controls">
				<input type="text"  class="form-control required" name="address" id="residence" value="<?php

			         	
			         	echo $user->address->address;
   

         ?>"/>
			</div>
		</div>
	</div>
	   {{ csrf_field() }}
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{CITY}}</label>
			<span class="help"></span>
			<div class="controls">
				<input  type="text" class="form-control" 
                     name="city" id="city" value="<?php

                     echo $user->address->city;

                    ?>">
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ COUNTRY }}</label>
			<span class="help"></span>
			<div class="controls">
				 <select name="country" id="country" class="form-control submit" data-submit="<?php


		             echo $user->address->country;

          ?>">
            	<option value="">{{ SELECT }}</option>
              @foreach($countries as $val)
                <option value="{{ $val }}">{{ $val }}</option>
              @endforeach                               
          </select>        
			</div>
		</div>
	</div>
								</div>
								<div class="row">
										<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{ PHONE_NUMBER }}</label>
			<span class="help"></span>
			<div class="controls">
				 <input  required class="form-control required" name="phone"  id="phone" value="<?php

       

         echo $user->address->phone;
       

       ?>">
			</div>	
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class="form-label">{{  EMAIL_ADDRESS }} </label>
			<span class="help"></span>
			<div class="controls">
				 <input <?php echo (isset($mode) && $mode == 'new' ? '':'disabled') ?> required class="form-control required" name="email"   value="<?php

       
				 echo $user->email;
       

       ?>">
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
						