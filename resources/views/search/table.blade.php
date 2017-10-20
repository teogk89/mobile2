

<table>
	<tbody>
		@foreach($result as $r)
			<tr>
				@if($type == 'admin')
				
				<td><a href="{{ route($route,['id'=>$r['id']]) }}">{{ $r['name']}}</a></td>
				@else

				<td><a href="{{ route($route,['id'=>$r['id']]) }}">{{ $r['name']}}</a></td>
				@endif
			
			</tr>
		@endforeach
	</tbody>
</table>