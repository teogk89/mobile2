

<input type="hidden" name="id" value="{{$ticket->ticket_id}}"/>
	
{!! csrf_field() !!}
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Invoice Status</th>
			<th>{{ DATE }}</th>
			<th></th>          
			<th>{{DELETE}}</th>          
		</tr>
	</thead>
	<tbody id="table-invoce" autocomplete="off">
@foreach($ticket->invoices as $invoice)
			<tr>
				<td>
					{{$invoice->id}}
				</td>
				<td>
				<select name="status[{{$invoice->id}}]" class="submit" data-submit="{{ $invoice->status}}">

					
						<option value='0' <?php echo ($invoice->status == '0' ? 'selected':'') ?>> UNPAID</option>
					
						<option value='1' <?php echo ($invoice->status == '1' ? 'selected':'') ?>> PAID</option>
						
						
						
				</select>
				</td>
				<td>{{ $invoice->date_add}}</td>
				<td><a class='myImg' href="{{$invoice->file}}"><i class="icon-picture"></i></a></td>
				<td><input name="delete_attach[]" value="{{$invoice->id }}" type="checkbox"></td>
			</tr>

@endforeach
	</tbody>
</table>
<div class="form-actions pull-right">
    <button id="invoicetablesubmit" type="submit" name="saveprint_offline" class="btn btn-info">update</button>                                    
</div>	