@extends('layouts.app')


@section('content')
<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content">

			<div class="row">

				<div class="col-md-12 tiles white">
					<h3>Viewing all orders</h3>
					<table class="table table-striped table-flip-scroll cf">
						<thead>
							<tr>
								<th>#</th>
								<th>Customer</th>
								<th>Phone</th>
								<th>Date ordered</th>
								<th>Delivery date</th>
								<th>Item</th>
								<th>Price</th>
								<th>Sent sms</th>
								<th>Order status</th>
								<th>Edit</th>

							</tr>
						</thead>
						<tbody>
							@foreach($orders as $o)
							<tr>
								<td><?php echo $o->id ?></td>
								<td><?php echo $o->customer ?></td>
								<td><?php echo $o->phone ?></td>
								<td><?php echo $o->date_order ?></td>
								<td><?php echo $o->deliver_date ?></td>
								<td><?php echo $o->item_name ?></td>
								<td><?php echo $o->item_price ?></td>
								<td>
                        			<div class="checkbox check-success 	">
                          <input 	 type="checkbox" value="1" checked="checked">
                          <label for="	"></label>
                        </div>
                     			</td>
								<td>
									<div class="checkbox check-danger 	">
                          <input 	 type="checkbox" value="1" checked="checked">
                          <label for="	"></label>
                        </div></td>
								<td><i class="fa fa-edit"></i></td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>	
@stop