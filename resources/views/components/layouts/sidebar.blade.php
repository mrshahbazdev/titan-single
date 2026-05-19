<!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
          <div class="logo-wrapper" style="padding: 8px 0;"><a href="#"><img class="img-fluid" src="{{ asset('assets/uploads/img/new_logo.png') }}" alt="logo" style="max-width: 180px; height: auto;"></a>
            <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="index-2.html"><img class="img-fluid" src="backend/images/logo/logo-icon.png" alt=""></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                
                <li class="pin-title sidebar-main-title show">
                  <div> 
                    <h6>Menus</h6>
                  </div>
                </li>
                
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title active" href="#">
                    
                  <span class="">Member Setting</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ url('member') }}">Members List</a></li>
                    <li><a href="{{ url('member/agent') }}">Agents List</a></li>
                    <li><a href="{{ url('member/grade') }}">Levels</a></li>
                    
                  </ul>
                </li>
                
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title active" href="#">
                    
                  <span class="">Product Setting</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ url('mall/product') }}">Products List</a></li>
                    <li><a href="{{ url('mall/text') }}">Pages List</a></li>
                  </ul>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title active" href="#">
                    
                  <span class="">Systems Setting</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ url('systems/role') }}">Roles List</a></li>
                    <li><a href="{{ url('systems/users') }}">System Users</a></li>
                    <li><a href="{{ url('systems/bank') }}">Banks Details</a></li>
                    <li><a href="{{ url('systems/trialperiod') }}">Trial Period</a></li>
                  </ul>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title active" href="#">
                    
                  <span class="">Trade Lists</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ url('trade/rechargelist') }}">Recharges Lists</a></li>
                    <li><a href="{{ url('trade/withdrawlist  ') }}">Withdraw Lists</a></li>
                    <li><a href="{{ url('/trade/rechargerequest') }}">Recharge Requests</a></li>
                  </ul>
                </li>
                
               
                
                
               
                
               
                
                
                
                
              
              </ul>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </div>
        <!-- Page Sidebar Ends-->
        <style>
          .fa-angle-right{
            color: white !important;
          }
        </style>