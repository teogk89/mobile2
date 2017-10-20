
  <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              Menu
            </a>
            <div class="nav-collapse collapse">
            @if(!Auth::check())
              <ul class="nav pull-right shareme hidden-phone hidden-tablet">
              <li>
                <a href="<?php echo $shop->facebook  ?>"><i class="icon-facebook"></i> <br/>Follow </a> 
              </li>
              <li>
                <a href="<?php echo $shop->twitter  ?>"><i class="icon-twitter"></i> <br/>Follow </a> 
              </li>
              <li>
                <a href="<?php echo $shop->googleplus  ?>"><i class="icon-google-plus"></i> <br/>Follow </a> 
              </li>
              </ul>
            @endif
            <!-- Navigation links starts here -->
              <ul class="nav">
                <!-- Main menu -->
                <li class="hidden-phone hidden-tablet"> 
  	             <a href="#" class="nav-brand" id="view-fullscreen"><i class="icon-fullscreen"></i></a>
  	            </li>
                @if(!Auth::check())

                <li>
                  <a href="/offlineticket">Reparatie Order Aanmelden</a>

                </li>
                <li><a href="{{ route("guest-check-ticket") }}">{{ CHECK_TICKET }}</a> </li>
                <li>
                  <a href="{{ route('guest-query-price')}}">Prijzen</a>
                </li>
                <li><a href="{{ route('login') }}">{{ INTERN }}</a></li>
                @else
              
                @endif


                @if(Auth::check())

                  @if(Auth::user()->isAdmin())
                   <li><a href="/admin/type/0/per/15">{{ CHECK_TICKET }}</a> </li>
                   <li><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<b class="caret"></b></a>
                    <!-- Submenus -->
                    <ul class="dropdown-menu">
                      <li><a href="/intern/adcprice">{{ PRICES_M }}</a></li>
                      <li><a href="/intern/settings">{{SETTINGS }}</a></li>
                      <li><a href="/intern/backup">{{BACKUP }}</a></li>
                      <li><a href="/intern/technicians">{{TECHNICIANS }}</a></li>
                      <li><a href="/intern/users">{{USERS }}</a></li>
                      <li><a href="/intern/customers">{{CUSTOMERS }}</a></li>
                    </ul>
                  </li>
                  <li><a href="/stock_bind">Stock</a></li>
                  @endif

                  @if(Auth::user()->isTech())

                  <li><a href="/intern/customers">{{CUSTOMERS }}</a></li>


                  @endif

                  @if(Auth::user()->isSubShop())
                  <li><a href="/subshop/newticket">{{ NEW_TICKET }}</a> </li>
                  <li><a href="/subshop/ticket">{{ CHECK_TICKET }}</a> </li>
                  <li><a href="/intern/notices">Notices</a></li>
                  <li><a href="/intern/orders_list">Orders</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">E-mail<b class="caret"></b></a>
                    <!-- Submenus -->
                    <ul class="dropdown-menu">
                      <li><a href="/intern/mail_system">View e-mails</a></li>
                      <li><a href="/intern/mail_system.php?mail">{{SEND_MAIL }}</a></li>
                    </ul>
                  </li>
                  @endif
                  <li><a href="/intern/logout">{{ LOGOUT }}</a></li>  
                @endif

              
              </ul> 

          </div> 
        </div>
      </div> 
  </div>