 <div class="bar" style="position:relative;margin-top:0px">
          <div class="container">
            <div class="bar-inner">
              <ul>

                @if(!Auth::check())
                <li>
                  <a href="/offlineticket">Reparatie Order Aanmelden</a>

                </li>
              
                <li>
                  <a href="{{ route("guest-check-ticket") }}">Status Bekijken</a>
                </li>
                <li>
                  <a href="{{ route('login') }}">  Zakelijk</a>
                </li>
                
                <li>
                  <a href="{{ route('guest-query-price')}}">Prijzen</a>
                </li>


                @endif
                

                @if(Auth::check())
                
                <?php
                  $user = \Auth::user();

                ?>

                  @if($user->isSubShop())
                  <li>
                      <a href="{{ route('shop-ticket') }}">All Tickets</a>
                  </li>
                  <li>
                    <a href="{{ route('shop-new-ticket')}}">Reparatie Order Aanmelden</a>
                  </li>

                  @endif

                     @if($user->isAdmin())
                  <li>
                      <a href="{{ route('admin-dashboard') }}">Admin Dashboard</a>
                  </li>
                  

                  @endif



                  @if($user->isTech())
                   <li>
                    <a href="{{ route('tech-ticket-list')}}">All Tickets</a>
                  </li>


                  @endif


                <li>
                  <a href="{{ route('guest-query-price')}}">Prijzen</a>
                </li>
                
              
                
                
                <li>
                  <a href="{{ route('shop-profile') }}">Profile</a>
                </li>
                 <li>
                  <a href="{{ route('my-logout') }}">Logout</a>
                </li>
             

                @endif
              </ul>
            </div>
           </div>
</div>