			<form action="{{ route('admin-notice-save') }}" method="POST">
								{!! csrf_field() !!}	
								<input type="hidden" name="id" value="{{ $notice->id}}"/>
 								<input type="hidden" name="type" value="{{$type}}"/>

                @if(isset($tickets_id) )
                <input type="hidden" name="tickets_id" value="{{ $tickets_id}}"/>
                @endif
								<div class="form-group">
                        			<label class="form-label"><strong>Notice title</strong></label>
                       
                        			<div class="controls">
                          				<input required class="form-control" type="text" name="notice_name" value="{{ $notice->notice_name }}">
                        			</div>
                      			</div>
                      			<div class="form-group">
                        			<label class="form-label"><strong>Notice Description</strong></label>
                       
                        			<div class="controls">
                          				<textarea required class="form-control" name="notice_content">{{ $notice->notice_content }}</textarea>
                        			</div>
                      			</div>
                      			<div class="form-actions">
				                  <div class="pull-right">
				                    <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
				                   	
				                  </div>
				                </div>
							</form>