<tr>
			<form action="{{ route('admin-invoice-edit') }}" method="POST" class="table-invoices">
				<input type="hidden" name="id" value="{{$invoice->id}}"/>
				{!! csrf_field() !!}
			
				<td>
					{{$invoice->id}}
				</td>
				<td>
				<select name="status" class="submit" data-submit="{{ $invoice->status}}">

					
						<option value='0' <?php echo ($invoice->status == '0' ? 'selected':'') ?>> UNPAID</option>
					
						<option value='1' <?php echo ($invoice->status == '1' ? 'selected':'') ?>> PAID</option>
						
						
						
				</select>
				</td>
				<td>{{ $invoice->date_add}}</td>
				<td>
					@if($invoice->imageAvailable())
					

					<a href="{{ url($invoice->imageUrl()) }}" data-toggle="lightbox" data-title=""><img style="width:24px" src="<?php echo url($invoice->imageUrl()); ?>"/></a>
					@endif
					

				</td>
				<td><input name="delete" type="checkbox" value="del" /></td>
				<td>  <button type="submit" name="saveprint_offline" class="invoiceB btn btn-info">update</button>   </td>
			</form>	
			</tr>