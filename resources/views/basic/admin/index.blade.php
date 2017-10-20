@extends('basic.layouts.app')




@section('content')

<div class="well">
	<form class="form-search pull-left" action="{{ route('my-forward')}}"  method="get" enctype="multipart/form-data" id="filter-form">
		<i class="icon-folder-open" style="font-size:24px"> </i>
			<select name="url" class="form-control input-medium">
				
				
				<?php foreach ($repair_status_options as $key=>$val) {
				
				$url = route('admin-ticket-by-type',['type'=>$key,'per'=>$per]);

				if($key==$type){
				echo '<option value="'.$url.'" selected="selected">'.$val.'</option>';
				}
				
				else{ echo '<option value="'.$url.'">'.$val.'</option>'; }
	
				}
				
				?>
				
			</select>
		<input type="submit" name="ok" value="ok" class="btn btn-primary">
	</form>
	<form class="form-search pull-right"  method="get" enctype="multipart/form-data" id="filter-form">
			<i class="icon-search" style="font-size:24px"> </i><input type="text" name="search"  class="form-control input-medium">
			</select>
			<input type="submit" value="<?php echo PROCEED; ?>" class="btn btn-success">
	</form>

	<form action="{{ route('admin-table-status-update')}}" method="post" class="form-horizontal ">
		 {!! csrf_field() !!}
	<table class="table table-striped">
        <thead>
        	<tr>
	            <th><a href=""><i class="icon-sort"> <?php echo ORDER_ID; ?> </i> </a></th>
	            <th><a href=""><i class="icon-sort"> <?php echo REG_DATE; ?> </i> </a></th>
	            <th><?php echo CLIENT_NAME_V; ?></th>
	            <th><?php echo CLIENT_ISSUE_V; ?></th>
	            <th><?php echo PHONE_MODEL; ?></th>
	            <th></th>
	            <th>Current status</th>
	            <th><?php echo STATUS ?></th>
	         	<th>{{ EDIT }}</th>
	         	<th>{{ EDIT_NOTICE }}</th>
         
        	</tr>
        </thead>
    	<tbody>
    		@foreach($tickets as $t)
    		<tr>
    			<td><a href="/admin/editticket?id=<?php echo $t->ticket_id ?>">{{ $t->ticket_id}}</a></td>
    			<td><?php echo strftime("%d %b %Y",strtotime($t->ticket_date));?> &nbsp;</td>
    			<td><?php echo $t->name ?>&nbsp;</td>
    			<td style="max-width:140px;">
				<?php echo'<a href=""> 
								'.substr($t->reason, 0, 45).' ...&nbsp; </a>';
				?>
				</td>
				<td><?php echo \Helper::zimplode(array($t->phone_model,$t->phone_type),'-');?>&nbsp;</td>
				<td><?php echo  \Helper::list_status($repair_status_options,$t->repair_status);?>&nbsp;</td>
				<td><?php echo $t->repair_status ?></td>
				<td>
					<input type="hidden" name="ticketid[]" value="<?php echo $t->ticket_id;?>">
					<select name="status[<?php echo $t->ticket_id;?>]" class="form-control input-small">
						<option value="" selected="selected" disabled>Please select</option>
						@foreach($repair_status_options as $r=>$m)

							@if($r == 0 || $r == 13 || $r == 12)

							@else
								<option value="{{$m}}">{{$m}}</option>
							@endif
						
						@endforeach
					</select>
				</td>
				<td><a href="{{ route('admin-edit-ticket',['id'=>$t->ticket_id])}}" style="margin: 10px;"><span style="color:#47B300; font-size:18px; text-align:right;"><i class="icon-edit"></i></span></a></td>
				<td>
					<?php

						if( count($t->notices) > 0){

							$notice_text = '<span style="color:#ff3d01; font-size:18px; text-align:right;"><i class="icon-file-alt"></i></span>';
						}else{

							$notice_text='<span style="color:#47B300; font-size:18px; text-align:right;"><i class="icon-file-alt"></i></span>';
						}


					?>
					<a>{!! $notice_text !!}</a>
				</td>
    		</tr>	
    		@endforeach
    	</tbody>
    </table>
    	<div class="clearfix"></div>
		<button type="submit" class="btn btn-success btn-medium pull-right">{{ UPDATE }}</button>

		{{ $tickets->links('basic.pagination.table') }}
	<br/>
    </form>	
</div>

@endsection