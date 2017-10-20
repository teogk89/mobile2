@extends('webarch.layouts.app')



@section("content")
<div class="clearfix"></div>
<div class="page-title">
            <h3>Dashboard </h3>
</div>
<div id="container">
	<div class="row 2col">
		@foreach($result as $key=>$m)

		<div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">

                <div class="tiles green  added-margin">
                  <div class="tiles-body">
                    <div class="controller">
                      <a href="javascript:;" class="reload"></a>
                      <a href="javascript:;" class="remove"></a>
                    </div>
                    <div class="tiles-title">  <a style="  text-decoration: none;color:white"href="{{ $m['link'] }}">{{ $m['name']}}</a></div>
                    <div class="heading"> <span class="animate-number" data-value="{{$m['count']}}" data-animation-duration="1200">0</span> </div>
                    <div class="progress transparent progress-small no-radius">
                      <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="{{$m['percent']}}%" style="width: 0%;"></div>
                    </div>
                    <div class="description"><span class="text-white mini-description "></span>
                    </div>
                  </div>
                </div>
                   
              </div>

  
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="grid simple">
				<div class="grid-body">
					<table class='table'>
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>phone type</th>
								<th>phone model</th>
								<th>reason</th>
								<th>{{ DATE }}</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($tickets as $t)
							<tr>
								<td>{{ $t->ticket_id }}</td>
								<td>{{ $t->name }}</td>
								<td>{{ $t->phone_model }}</td>
								<td>{{ $t->phone_type }}</td>
								<td>
									@if($t->reason != null || $t->reason != '')
											{{ $t->getReason(40) }}
									@endif
								</td>
								<td>{{ $t->ticket_date}}</td>
								<td><a href="{{ route('admin-edit-ticket',['id'=>$t->ticket_id])}}"><i class="fa fa-edit"></i></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection