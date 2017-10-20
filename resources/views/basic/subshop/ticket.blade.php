<?php
	
	$template = 'basic';

?>

@extends('basic.layouts.app')


@section('content')
@if(Session::has('success'))
   
    <div class="alert alert-success">
   {{ Session::get('success') }}
</div>
@endif

<?php
	
	
	//$input = ( $edit == TRUE ? '':'disabled="disabled"');
	$input = ( $view_only == TRUE ? 'disabled="disabled"':"");
?>
<div class="well span12">
	<div class="title pull-right"><h4>{{ REPARATIE_AANMELDEN }}</h4></div>
</div>




<div class="respond well span12">

@if(!$edit && $ticket != null)
<div class="button pull-right">
	<a href="'.WEB_ADDRESS.'intern/print.php?id='.$id.'&amp;postcode='.htmlspecialchars($postalid).'" target="_blank">
    	<i class="icon-print"></i> Print pagina</a> 
</div>	

@endif

@if($view_only && count($ticket->invoices) > 0)

<div class="clearfix"></div>	
<div class="respond hero span10">
      <div class="span3">
        <span class="" style="color:#000000; font-size:18px;">
         	Invoice status
      </div>
</div>
<div class="respond hero span10">
<table class="table table-striped">

	<thead>
		<tr>
			<th>#</th>
			<th>Invoice Status</th>
			<th>{{ DATE }}</th>
			<th></th>          
		    <th>Note</th>
		</tr>
	</thead>
	<tbody id="table-invoce" autocomplete="off">
		@foreach($ticket->invoices as $in)
		<tr>
			<td>{{ $in->id}}</td>

			<td><?php echo ($in->status == 0 ? "UNPAID":"PAID") ?></td>
			<td>{{ $in->date_add}}</td>
			<td><a href="<?php echo config('app.url').$in->file ?>" target="_blank"><i class="icon-picture"></i></a></td>
			<td>{{ $in->notices}}</td>
		</tr>
		@endforeach
	</tbody>

</table>
</div>
<br/>
<br/>

@endif
@include('basic.form.ticket',['url'=>'/subshop/saveticket'])




@endsection





@push('extrajs')
<?php if(FULL_VERSION):?>
<?php
	$pickup_times = [];
	$collect_start_date=strftime("%d %b %Y");
	foreach ($pickup_days as $val){
		$day=(int)date("w",strtotime($val['day']));
		$valid_days[]=$day;
		$pickup_times[$day]=$val['time'];
	}
?>
<script type="text/javascript">
var WEB_ADDRESS = "<?php echo env('APP_URL') ?>/";
//var collect_start_date="04 Jul 2017",validDays=[1,4,5,6],pickup_times={"1":"09:00-12:00","4":"18:00-20:00","5":"09:00-12:00","6":"17:00-19:00"},YES="YES",NO="NO",OTHER="Andere"


var collect_start_date = <?php echo json_encode($collect_start_date) ?>;
var validDays = <?php echo json_encode($valid_days) ?>;
var pickup_times = <?php echo json_encode($pickup_times) ?>;
var YES = <?php echo json_encode('YES') ?>;
var NO = <?php echo json_encode("NO") ?>;
var OTHER = <?php echo json_encode(OTHER) ?>;



function reload(){

	d = new Date();
	$("#captcha").attr("src", "/captcha?"+d.getTime());
}
<?php endif?>




</script>

@endpush