  <!-- Page Sidebar Start -->
  <!--================================-->
  <div class="page-sidebar">
      <div class="logo">

          <a class="logo-img" href="#">
              <br> <br>
              <p style="color:white;font-size: 20px;">UDOM-CAMS</p>

          </a>
          <a id="sidebar-toggle-button-close"><i class="wd-20" data-feather="x"></i> </a>
      </div>
      <!--================================-->
      <!-- Sidebar Menu Start -->
      <!--================================-->
      <div class="page-sidebar-inner">
          <div class="page-sidebar-menu">
              <ul class="accordion-menu">
                  <!-- <li class="mg-l-20-force mg-t-25-force menu-navigation">Navigation</li> -->


                  <li class="open active">
                      <a href="{{ route('dashboard') }}"><i data-feather="home"></i>
                          <span>Dashboard</span><i class=""></i></a>

                  </li>




                  @if(Auth::user()->role === 'admin')
                  <li class="" style="color: white">
                      <a href="#"><i data-feather="user"></i>
                          <span>User Management</span><i class="accordion-icon fa fa-angle-left"></i></a>
                      <ul class="sub-menu" style="display: block;">
                          <!-- Active Page -->
                          <li class="active"><a href="{{ route('admin.add_user_page') }}">New User</a></li>
                          <li><a href="{{ route('view_users') }}">View User</a></li>
                          <li><a href="{{ route('admin.roles.index') }}">Role</a></li>
                          {{-- <li><a href="#">Permission</a></li>
                          <li><a href="#">Project</a></li> --}}
                      </ul>
                  </li>
                  @endif
      
                 

                  <li>
                    @if(in_array(Auth::user()->role, ['stc', 'pmu','hod','dem']))
                      <a href=""><i data-feather="mail"></i>
                        
                          <span  style="color: white">Contract</span><i class="accordion-icon fa fa-angle-left"></i></a>
                          @endif
                      <ul class="sub-menu">

                        @if(in_array(Auth::user()->role, ['coordinator','pmu']))
                         
                          <li><a href="{{ route('manage_contracts') }}"  style="color: white">Manage Contract</a></li>
                        
                        @endif
                     
                        @if(in_array(Auth::user()->role, ['dem']))
                        <li><a href="{{ route('add_consultants') }}">Add Consultant</a></li>
                        <li><a href="{{ route('viewconsultants') }}">View Consultant</a></li>
                        @endif
      
                        @if(in_array(Auth::user()->role, ['stc','hod','director', 'pmu']))
                        {{-- <li><a href="{{ route('viewcontracts') }}">View Contract</a></li> --}}
                        <li><a href="{{ route('contract.documents') }}">Contract Document</a></li>
                       
                      @endif




                        
                        @if(in_array(Auth::user()->role, ['hod', 'director']))
                          <li><a href="{{ route('displayaprovedcontracts') }}">view Contract</a></li>
                        @endif
                            {{-- <li><a href="#">Dpi Request</a></li> --}}
                            @if(Auth::user()->role === 'stc' or 'hod')
                            <li><a href="{{ route('approvecontracts') }}">Resend Contract</a></li>
                            <li><a href="{{ route('approvecontractss') }}">Approve Contract</a></li>
                             @endif 

                        @if(in_array(Auth::user()->role, ['stc','hod', 'pmu','director']))
                          <li><a href="{{ route('displayaprovedcontracts') }}">Approved Contract</a></li>
                        @endif
                          
                      
                           @if(Auth::user()->role === 'hod')
                           <li><a href="{{ route('progresscontracts') }}">Contract Progress</a></li>
                      
                         
                          @endif 
                          
                      </ul>
                  </li>
               
                 
                  @if(in_array(Auth::user()->role, ['pmu', 'coordinator']))
                  <li>
                      <a href=""><i data-feather="feather"></i>
                          <span>Mous</span><i class="accordion-icon fa fa-angle-left"></i></a>
                      <ul class="sub-menu">
                        {{-- <li><a href="{{ route('add.partners')}}">Add Partner’s</a></li> --}}
                        <li><a href="{{ route('manage.partners')}}">Manage Partner’s</a></li>
                          {{-- <li><a href="{{ route('addmous')}}">Add Mou</a></li> --}}
                          <li><a href="{{route('manage.mous')}}">Manage Mou</a></li>
                          <li><a href="{{route('mou.document')}}">Mou Document</a></li>
                          {{-- <li><a href="{{ route('add.task')}}">Add Task</a></li> --}}
                          <li><a href="{{ route('manage.task')}}">Manage Task</a></li>
                          <li><a href="{{ route('task.progress')}}">Task Progress</a></li>
                          
                      </ul>
                  </li>
                  @endif

                
                  @if(in_array(Auth::user()->role, ['stc','director','hod','staff']))
                  <li>
                      <a href=""><i data-feather="feather"></i>
                          <span>Mous</span><i class="accordion-icon fa fa-angle-left"></i></a>
                      <ul class="sub-menu">
                      
                        {{-- <li><a href="{{ route('view.partners')}}">view Partner’s</a></li> --}}
                     
                          {{-- <li><a href="{{route('mous.view')}}">View Mou</a></li> --}}
                      
          
                          <li><a href="{{ route('staff.task')}}">Task Progress</a></li>
{{--                         
                          <li><a href="">view Mou Document</a></li> --}}
                      </ul>
                  </li>
                  @endif



              
                  {{-- for other part company --}}
                  @if(in_array(Auth::user()->role, ['company']))
                  <li>
                      <a href=""><i data-feather="feather"></i>
                          <span>Mous</span><i class="accordion-icon fa fa-angle-left"></i></a>
                      <ul class="sub-menu">
                          <li><a href="{{ route('loadmou.invitation')}}">Load Mou Invitation</a></li>
                          <li><a href="{{route('mous.view')}}">View Mou</a></li>
                          <li><a href="{{route('mous.view')}}">Saved Mou</a></li>
                          {{-- <li><a href="">Mou Document</a></li> --}}
                      </ul>
                  </li>
                  @endif
                  {{-- end for other part company --}}





                  @if(in_array(Auth::user()->role, ['director','hod', 'coordinator']))
                  <li>
                      <a href=""><i data-feather="feather"></i>
                          <span>Report</span><i class="accordion-icon fa fa-angle-left"></i></a>
                      <ul class="sub-menu">
                          <li><a href="{{route('contract.report')}}">Contract</a></li>
                          <li><a href="{{route('mou.report')}}">Mou</a></li>
                          
                    
                      </ul>
                  </li>
                  @endif
                  @if(in_array(Auth::user()->role, ['admin']))
                  <li class="">
                    <a href="{{ route('audit.trailler') }}"><i data-feather="user"></i>
                        <span>Audit Trailler</span><i class="fa fa-setting"></i></a>
                </li>
                @endif

                  <li class="">
                      <a href="{{ route('password.change') }}"><i data-feather="user"></i>
                          <span>Profile</span><i class=""></i></a>

                  </li>

                  {{-- <li class="">
                      <a href="pages-profile.html"><i data-feather="user"></i>
                          <span>Profile</span><i class=""></i></a>

                  </li> --}}


              </ul>
          </div>
      </div>
      <!--/ Sidebar Menu End -->
      <!--================================-->
      <!-- Sidebar Footer Start -->
      <!--================================-->
      <div class="sidebar-footer">
          <a class="pull-left" href="pages-profile.html" data-toggle="tooltip" data-placement="top"
              data-original-title="Profile">
              <i data-feather="user" class="wd-16"></i></a>
          <a class="pull-left " href="mailbox.html" data-toggle="tooltip" data-placement="top"
              data-original-title="Mailbox">
              <i data-feather="mail" class="wd-16"></i></a>
          <a class="pull-left" href="aut-unlock.html" data-toggle="tooltip" data-placement="top"
              data-original-title="Lockscreen">
              <i data-feather="lock" class="wd-16"></i></a>
          <a class="pull-left" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip"
              data-placement="top" data-original-title="Sign Out">
              <i data-feather="log-out" class="wd-16"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
      <!--/ Sidebar Footer End -->
  </div>
  <!--/ Page Sidebar End -->
