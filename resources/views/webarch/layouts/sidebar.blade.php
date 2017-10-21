<div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
            <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
              
              <!-- END MINI-PROFILE -->
              <!-- BEGIN SIDEBAR MENU -->
              <p class="menu-title sm">BROWSE <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>
              <ul>
                 <li>
                  <a href="{{ route('admin-dashboard') }}">  <span class="title">Dashboard</span> </a>
                </li>
                <li>
                  <a href="{{ route('admin-monitor') }}">  <span class="title">Monitor</span> </a>
                </li>
                 
                <li>
                  <a href="{{route('admin-ticket-by-type',['type'=>0,'per'=>15]) }}">  <span class="title">All tickets</span> </a>
                </li>
                 <li>
                  <a href="{{route('admin-ticket-status-list') }}">  <span class="title">Ticket status </span> </a>
                </li>
               
                <li>
                  <a href="javascript:;">  <span class="title">User </span> <span class=" arrow"></span>
                    <ul class="sub-menu">
                      <li> <a href="{{route('admin-subshop-list')}}"> Subshop </a> </li>
                      <li> <a href="{{route('admin-tech-list')}}"> Tech </a> </li>
                   
                      <li> <a href="{{route('admin-new-user')}}"> New User </a> </li>
                    </ul>
                </li>
                <li>
                  <a href="">  <span class="title">Mail</span> </a>
                </li>
                <li>
                  <a href="javascript:;">  <span class="title">{{ PRICES_M }}</span> <span class=" arrow"></span>
                 
                  <ul class="sub-menu">
                    <li> <a href="{{route('admin-addprice')}}"> {{ PRICES_M }} </a> </li>
                    <li> <a href="{{route('admin-queryprice')}}"> {{ QUERY_PRICE }} </a> </li>
                   
                    <li> <a href="{{route('admin-addmodel')}}"> {{ADD_MODEL}} </a> </li>
                    
                    <li><a href="{{ route('admin-add-brand') }}">{{ADD_BRAND}}</a></li>
               
                  </ul>
                </li>
                <li>
                  <a href="{{ route('admin-setting')}}">  <span class="title">{{ SETTINGS }}</span> </a>
                </li>
                
                  <li>
                  <a href="{{ route('admin-notice')}}">  <span class="title">Notices</span> </a>
                </li>
                
                <li>
                  <a href="{{ route('admin-order')}}">  <span class="title">Order</span> </a>
                </li>
          
                <li>
                  <a href="{{ route('admin-email-create')}}">  <span class="title">Email</span> </a>
                </li>
                
                 <li>
                  <a href="{{ route('admin-profile')}}">  <span class="title">Profile</span> </a>
                </li>
                <li>
                  <a href="{{ route('my-logout')}}">  <span class="title">Logout</span> </a>
                </li>
               
               
              </ul>
              <div class="side-bar-widgets"></div>
              <div class="clearfix"></div>
              <!-- END SIDEBAR MENU -->
            </div>
      </div>