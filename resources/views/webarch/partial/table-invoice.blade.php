
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Invoice Status</th>
			<th>{{ DATE }}</th>
			<th></th>      
			<th class="text-error">{{DELETE}}</th>      
			<th></th>  
			      
		</tr>
	</thead>
	<tbody autocomplete="off" id="table-invoice-body">
			@foreach($ticket->invoices as $invoice)
				@include('webarch.partial.table-row-invoice',['invoice'=>$invoice])
			
			@endforeach
	</tbody>
</table>
<div class="form-actions pull-right">
                                   
</div>	