@extends('webarch.layouts.app')

@section('content')


<div class="clearfix"></div>
<div id="container">
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-body no-border">
					<form action="{{ route('admin-backup-output')}}"  method="POST">
						<h4>File name</h4>
							<input type="text" required name="name" value="" placeholder="" /><br/>
						 {!! csrf_field() !!}
 <br/>
						 <h4>Select table</h4>

						
						  <input type="checkbox" name="table[]" value="custom_orders" checked> Custom_order<br>
  						  <input type="checkbox" name="table[]" value="invoice_status" checked> invoice_status<br>
  						  <input type="checkbox" name="table[]" value="notices" checked> notices<br>
  						  <input type="checkbox" name="table[]" value="orders" checked> orders<br>
  						  <input type="checkbox" name="table[]" value="phonebrands" checked> phonebrands<br>
  						  <input type="checkbox" name="table[]" value="phonemodels" checked> phonemodels<br>
  						  <input type="checkbox" name="table[]" value="phonebrands" checked> phonebrands<br>
  						  <input type="checkbox" name="table[]" value="phonerepair" checked> phonerepair<br>
  						  <input type="checkbox" name="table[]" value="postcodes" checked> postcodes<br>
  						  <input type="checkbox" name="table[]" value="products" checked> products<br>
  						   <input type="checkbox" name="table[]" value="settings" checked>settings<br>
  						  <input type="checkbox" name="table[]" value="tickets" checked>tickets <br>
  						  <input type="checkbox" name="table[]" value="ticket_users" checked> ticket_users<br>
  						   <input type="checkbox" name="table[]" value="ticket_users" checked> users<br>
  						      <input type="checkbox" name="table[]" value="	user_address" checked> 	user_address<br>
  						      <button type="submit">Download</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection