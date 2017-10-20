

@foreach($results as $r)

<a target="_blank" href="{{ route('admin-edit-ticket',['id'=>$r->ticket_id]) }}">{{ $r->ticket_id }}</a><br/>
{{ $r->name }}<br/>
{{ $r->email_address }}<br/>

<br/>
<br/>
@endforeach