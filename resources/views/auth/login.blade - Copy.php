<?php 

$temp = env("APP_THEME");

$theme = $temp.'.layouts.app';

$shop = \DB::table('settings')->first();

$template = $temp;
?>
@extends($theme)

@section('content')

    <div class="row">
                      <div class="span12">
                     
                         <div class="logreg-page">
                            <h3>Inloggen naar <span class="color">Zakelijk Paneel</span></h3>   
                                           
                            <hr>
                                        <div class="form">
                                          <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                              <!-- Username -->
                                                {{ csrf_field() }}
                                              <div class="control-group">
                                                <label class="control-label" for="username">E-Mail Address</label>
                                                <div class="controls">
                                                   <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                              </div>
                                              <!-- Password -->
                                              <div class="control-group">
                                                <label class="control-label"><?php echo PASSWORD; ?></label>
                                                <div class="controls">
                                                  <input id="password" type="password" class="form-control" name="password" required>
                                                   @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                              </div>
                                              <div class="control-group">
                                                 <div class="controls">
                                                    <label class="checkbox">

                                                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><?php echo REMEMBER; ?></label>
                                                 </div>
                                              </div>                                                                               
                                              <!-- Buttons -->
                                              <div class="form-actions">
                                                 <!-- Buttons -->
                                                <button type="submit" name="submit"  class="btn">Login</button>
                                                <button type="reset" class="btn"><?php echo RESET; ?></button>
                                              </div>
                                          </form>
                                        <!--  <hr>
                                              <div class="lregister">
                                                 Don't have Account? <a href="register.html">Register</a>
                                              </div> -->
                                        </div>                           
                         </div>
                      </div>
                   </div>
@endsection
