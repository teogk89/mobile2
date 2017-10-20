@extends('webarch.layouts.app')

@section('content')

<div class="clearfix"></div>
<div id="container">
	<div class="row 2col">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-title no-border">

				</div>
				<div class="grid-body no-border">
					<a href="{{ route('admin-order-edit')}}"><button>New order</button></a>
					<table class="table table-hover no-more-tables">
						<thead>
							<tr>
								<th>Id</th>
								<th>Customer</th>
								<th>Phone</th>
								<th>Date ordered</th>               
								<th>Delivery date</th>               
								<th>Item</th>               
								<th>Price</th>               
								<th>Sent SMS</th>
								<th>Order Status</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $o)
							<tr <?php echo  ($o->order_status != 'open' ? 'bgcolor="#F0F8FF"': '')?> >
								<td>{{ $o->id}}</td>
								<td>{{ $o->customer}}</td>
								<td>{{ $o->	phone}}</td>
								<td>{{ $o->date_order}}</td>
								<td>{{ $o->deliver_date}}</td>
								<td width="20%">{{ $o->item_name}}</td>
								<td>{{ $o->item_price}}</td>
								<td>
								<?php //echo ($o->customer_sms == 'yes' ? 'SMS send': 'SMS not send')?>	

								<input data-id ="{{ $o->id }}" data-type="sms" 	data-size='small' data-on-text="Sent" data-off-text="Not" type="checkbox" name="my-checkbox" <?php echo ($o->customer_sms == 'yes' ? 'checked': '')?>>
								</td>
								<td><?php //echo ($o->order_status == 'open' ? 'Order open': 'Order close')?>

								<input 	data-id ="{{ $o->id }}" data-type="order" data-size='small' data-on-text="Open" data-off-text="Finished" type="checkbox" name="my-checkbox" <?php echo ($o->order_status == 'open' ? 'checked': '')?>>	
								</td>
										
									
								
								<td><a href="{{ route('admin-order-edit',['id'=>$o->id]) }}"><i class="fa fa-edit fa-2x"></i></a></td>
								<td>{!! \Helper::delButton('order',$o->id) !!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$orders->links()}}
				</div>
			</div>
		</div>
	</div>

</div>

@endsection


@push('extrajs')

<link href="{{ asset('webarch/plugin/bootstrap-switch-master/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet">

<script src="{{ asset('webarch/plugin/bootstrap-switch-master/js/bootstrap-switch.js') }}" type="text/javascript"></script>

<script src="{{ asset('webarch/plugin/bootbox/bootbox.js') }}" type="text/javascript"></script>

<script src="{{ asset('webarch/js/app.js') }}" type="text/javascript"></script>

<script type="text/javascript">



$("[name='my-checkbox']").bootstrapSwitch();

var token= "<?php echo csrf_token()  ?>";

$('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
  console.log(this); // DOM element
  console.log(event); // jQuery event
  console.log(state); // true | false
  //alert('afdasd');

  var route = "<?php echo route('common-api-post') ?>";


  var type = $(this).attr('data-type');
  var id = $(this).attr('data-id');
  console.log(type);

  if(type == 'sms'){

  	var result = (state == true ? 'yes':'no');

  	var send = {result:result,_token:token,type:'sms-status',id:id};

  	$.post(route,send);

  }
  else{

   var result = (state == true ? 'open':'closed');	
   var send = {result:result,_token:token,type:'order-status',id:id};
   	$.post(route,send);

  }
});

</script>

@endpush