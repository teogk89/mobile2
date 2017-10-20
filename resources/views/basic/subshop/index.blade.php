@extends('basic.layouts.app')


@section('content')


<div class="well">

	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="?<?php  ?>"><i class="icon-sort"> <?php echo ORDER_ID; ?> </i> </a></th>
				<th><a href="?<?php  ?>"><i class="icon-sort"> <?php echo REG_DATE; ?> </i> </a></th>
				<th><?php echo PHONE_MODEL; ?></th>
				<th><a href="?<?php  ?>"> <?php echo CLIENT_ISSUE_V; ?> </a></th>
			</tr>
		</thead>
		<tbody>

			@foreach($tickets as $t)
				<tr>
					<td><a href='/subshop/newticket?id=<?php echo $t->ticket_id ?>'><?php echo $t->ticket_id ?></a></td>
					<td><?php echo $t->ticket_date ?></td>
					<td><?php echo $t->phone_model ?></td>
					<td><?php echo $t->repair_status ?></td>
				</tr>
			@endforeach

		</tbody>
	</table>
</div>

@endsection