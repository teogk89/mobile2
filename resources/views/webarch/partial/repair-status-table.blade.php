<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
						<th></th>	
						<th>{{ TICKET_STATUS }}</th>
						<th>{{ DATE }}</th>
						<th>{{ FILE }}</th>          
						<th class="text-error">{{ DELETE }}</th> 
						<th></th>         
						</tr>
					</thead>
					<tbody>
						@foreach($ticket->details as $detail)
						<form action="{{ route('admin-ticket-edit-quick')}}" method="POST">
							{!! csrf_field() !!}
							<input type="hidden" name="type" value="status-update"/>
							<input type="hidden" name="id" value="{{ $detail->ticket_detail_id}}"/>
						<tr>
							<td>{{$detail->ticket_detail_id }}</td>
							<td>{{ $detail->detail}}</td>
							<td>{{ $detail->ticket_status }}</td>
							<td>{{ $detail->date_added }}</td>
							<td>
							
								@if($detail->imageAvailable())
					

									<a href="{{ url($detail->imageUrl()) }}" data-toggle="lightbox" data-title=""><img style="width:24px" src="<?php echo url($detail->imageUrl()); ?>"/></a>
								@endif
							</td>
							<td><input name="delete" value="on" type="checkbox"></td>
							<td>  <button id="invoicetablesubmit" type="submit" name="saveprint_offline" class="btn btn-info">update</button>   </td>

						</tr>
					</form>

						@endforeach
					</tbody>
				</table>