@extends('webarch.layouts.app')

@section('content')


<div class="clearfix"></div>
<div id="container">
	<div class="row">
		
		<div class="col-md-9">
			<div class="grid simple">
				<div class="grid-body">
					 @include('webarch.partial.notify')
					<form action="{{ route('admin-email-send') }}" method="POST" enctype="multipart/form-data">
						   {!! csrf_field() !!}
					<div class="row-fluid">
						<div class="row">
                          <div class="form-group col-md-12">
                            <label class="form-label">Receiver</label>
                            <span class="help">e.g. "someone@example.com"</span>
                            <div class="controls">
                              <input class="form-control " type="text" name="sender" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                            <label class="form-label">Subject</label>
                            <span class="help">e.g. "Meeting Agenda"</span>
                            <div class="controls">
                              <input class="form-control " type="text" name="subject" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                            <label class="form-label">Bericht</label>
                            <span class="help"></span>
                            <div class="controls">
                            
                              <textarea style="height: 200px;" class="form-control" name="content" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                            <label class="form-label">Signature</label>
                            <span class="help"></span>
                            <div class="controls">
                              <?php 
                                  $setting2 = \DB::table('settings2')->where('name','email-signature')->first();
                   
                              ?>
                              <textarea style="height: 200px;" class="form-control" name="content" required>{{ $setting2->myvalue }}</textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        	<div class="form-group col-md-12">
                        	<div class="controls">
                            <table>
                            	<tbody id="mytable">
                        		<tr>
                        			<td><input type="file" name="file[]" /></td>
                        			<td><button type="button" onclick="createfile()"class="btn btn-success btn-cons">Add more file</button></td>
                        		</tr>
                        		</tbody>
                        	</table>
                             
                            </div>
                        	</div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                        
                            <div class="controls">
                            	<div class="pull-right">
                            		  <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i>Send</button>
                            	</div>
                           
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        	<div class="form-actions col-md-12">
                      <div class="">
                        
                    
                      </div>
                    </div>
                        </div>
					</div>


				</form>
				</div>
			</div>
		</div>

    <!-- Find box !-->

    <div class="col-md-3">

      <div class="grid simple">
        <div class="grid-body">
          <input type="text"  id="word" placeholder="ticket id or name or email"/> <button data-url= "{{ route('common-api')}}" id="mybutton">Find</button>
          <br/>
          <h4>Result</h4>
          <div id="myresult">


          </div>
        </div>
      </div>
    </div>


    <!-- End find box !-->
		
	</div>
</div>

@endsection


@push("extrajs")

<script>


function createfile(){


	var html = '<tr><td><input type="file" name="file[]" /></td><td></td></tr>';

	$('#mytable').append(html);


}

$('#mybutton').click(function(){

  var url = $(this).attr('data-url');
  var myworld = $('#word').val();
  $.get(url,{type:'emailsearch',world:myworld},function(data){

    console.log(data);
    $('#myresult').html(data[1]);
  });
});
</script>

@endpush