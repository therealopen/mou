<!-- Page Header Start -->
            <!--================================-->
            <div class="page-header">
                <div class="search-form">
                   <form action="#" method="GET">
                      <div class="input-group">
                         <input class="form-control search-input typeahead" name="search" placeholder="Type something..." type="text"/>
                         <span class="input-group-btn"><span id="close-search"><i data-feather="x" class="wd-16"></i></span></span>
                      </div>
                   </form>
                </div>
                <nav class="navbar navbar-default">
                   <!--================================-->
                   <!-- Brand and Logo Start -->
                   <!--================================-->
                   <div class="navbar-header">
                      <div class="navbar-brand">
                         <ul class="list-inline">
                            <!-- Mobile Toggle and Logo -->
                            <li class="list-inline-item"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>
                            <!-- PC Toggle and Logo -->
                            <li class="list-inline-item"><a class=" hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>
                            <li class="list-inline-item mg-l-10"><a  href="#" id="search-button"><i data-feather="search" class="wd-20"></i></a></li>
                         </ul>
                      </div>
                   </div>
                   <!--/ Brand and Logo End -->
                   <!--================================-->
                   <!-- Header Right Start -->
                   <!--================================-->
                   <div class="header-right pull-right">
                      <ul class="list-inline justify-content-end">
                         <!--================================-->
                         <!-- Languages Dropdown Start -->
                         <!--================================-->
                        <!--  <li class="list-inline-item dropdown hidden-xs">
                            <a  href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us"></i>
                            </a>
                            <ul class="dropdown-menu languages-dropdown">
                               <li>
                                  <a href="" data-lang="en"><i class="flag-icon flag-icon-us mr-2"></i><span>English-US</span></a>
                               </li>
                               <li>
                                  <a href="" data-lang="es"><i class="flag-icon flag-icon-es mr-2"></i><span>Spanish</span></a>
                               </li>
                               <li>
                                  <a href="" data-lang="fr"><i class="flag-icon flag-icon-fr mr-2"></i><span>French</span></a>
                               </li>
                               <li>
                                  <a href="" data-lang="gr"><i class="flag-icon flag-icon-de mr-2"></i><span>German</span></a>
                               </li>
                               <li>
                                  <a href="" data-lang="ru"><i class="flag-icon flag-icon-ru mr-2"></i><span>Russian</span></a>
                               </li>
                               <li>
                                  <a href="" data-lang="ru"><i class="flag-icon flag-icon-gb mr-2"></i><span>English-UK</span></a>
                               </li>
                            </ul>
                         </li> -->
                         <!--/ Languages Dropdown End -->
                         <!--================================-->
                         <!-- Notifications Dropdown Start -->
                         <!--================================-->
                        <!-- Notifications Dropdown Start -->

                        <li class="list-inline-item dropdown hidden-xs">
                           <a class=" notification-icon" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i data-feather="bell" class="wd-20"></i>
                           <span class="notification-count wave in" style="color:rgb(220, 18, 18)">{{ $notifications->count() }}</span>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <!-- Top Notifications Area -->
                              <div class="top-notifications-area">
                                 <!-- Heading -->
                                 <div class="notifications-heading">

               <div class="heading-title">
                   <h6>Notifications</h6>
               </div>
               <span>{{ $notifications->count() }} New Notifications</span>
           </div>
           <div class="notifications-box" id="notificationsBox">
               @foreach ($notifications as $notification)
                   <a href="#" class="dropdown-item list-group-item">
                       <div class="d-flex justify-content-between">
                           <div class="wd-35 ht-35 mg-r-10 d-flex align-items-center justify-content-center rounded-circle card-icon-success">
                               <i data-feather="smile" class="wd-20"></i>
                           </div>
                       </div>
                       <div class="wd-100p">
                           <div class="d-flex justify-content-between">
                               <h3 class="tx-13 tx-semibold mb-0">{{ $notification->title }}</h3>
                               <span class="small tx-gray-500 ft-right">{{ $notification->created_at->format('M d, h:ia') }}</span>
                           </div>
                           <div class="tx-gray-700">{{ $notification->content }}</div>
                       </div>
                   </a>
               @endforeach
           </div>
           <div class="notifications-footer">
               <a href="#">View all Notifications</a>
           </div>
       </div>
   </div>
</li>
<!--/ Notifications Dropdown End -->

                         <!--/ Notifications Dropdown End -->
                         <!--================================-->
                         <!-- Messages Dropdown Start -->
                         <!--================================-->
                         {{-- <li class="list-inline-item dropdown hidden-xs">
                            <a class=" message-icon" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="message-square" class="wd-20"></i>
                            <span class="messages-count wave in" style="color:rgb(220, 18, 18)">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <div class="top-message-area">
                                  <div class="top-message-heading">
                                     <div class="heading-title">
                                        <h6>Messages</h6>
                                     </div>
                                     <span>5+ New Messages</span>
                                  </div>
                                  <div class="message-box" id="messageBox">
                                     <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                        <div class="d-flex justify-content-between">
                                           <div class="pd-r-10">
                                              <span class="avatar avatar-online">
                                              <img src="assets/images/users-face/1.png" class="img-fluid" alt="">
                                              <i></i>
                                              </span>
                                           </div>
                                           <div>
                                              <span class="tx-semibold">Mary Adams</span>
                                              <span class="small tx-gray-500 ft-right">Mar 20, 22:21pm</span>
                                              <div class="tx-gray-700">Congratulate! Socrates Itumayfor work anniversaries</div>
                                           </div>
                                        </div>
                                     </a>
                                     <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                        <div class="d-flex justify-content-between">
                                           <div class="pd-r-10">
                                              <span class="avatar avatar-online">
                                              <img src="assets/images/users-face/2.png" class="img-fluid" alt="">
                                              <i></i>
                                              </span>
                                           </div>
                                           <div>
                                              <span class="tx-semibold">Richards Caleb</span>
                                              <span class="small tx-gray-500 ft-right">Mar 2, 22:21pm</span>
                                              <div class="tx-gray-700">Richards Caleb, just created a new blog post</div>
                                           </div>
                                        </div>
                                     </a>
                                     <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                        <div class="d-flex justify-content-between">
                                           <div class="pd-r-10">
                                              <span class="avatar avatar-busy">
                                              <img src="assets/images/users-face/3.png" class="img-fluid" alt="">
                                              <i></i>
                                              </span>
                                           </div>
                                           <div>
                                              <span class="tx-semibold">Lane Richards</span>
                                              <span class="small tx-gray-500 ft-right">Mar 12, 22:21pm</span>
                                              <div class="tx-gray-700">Richards Caleb, just created a new blog post</div>
                                           </div>
                                        </div>
                                     </a>
                                     <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                        <div class="d-flex justify-content-between">
                                           <div class="pd-r-10">
                                              <span class="avatar avatar-busy">
                                              <img src="assets/images/users-face/4.png" class="img-fluid" alt="">
                                              <i></i>
                                              </span>
                                           </div>
                                           <div>
                                              <span class="tx-semibold">Edward Lane</span>
                                              <span class="small tx-gray-500 ft-right">Mar 15, 02:21pm</span>
                                              <div class="tx-gray-700">Adrian Monino, added new comment on your photo</div>
                                           </div>
                                        </div>
                                     </a>
                                     <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                        <div class="d-flex justify-content-between">
                                           <div class="pd-r-10">
                                              <span class="avatar avatar-offline">
                                              <img src="assets/images/users-face/5.png" class="img-fluid" alt="">
                                              <i></i>
                                              </span>
                                           </div>
                                           <div>
                                              <span class="tx-semibold">Lane Richards</span>
                                              <span class="small tx-gray-500 ft-right">Mar 20, 08:28pm</span>
                                              <div class="tx-gray-700">Edward Lane, added new comment on your photo</div>
                                           </div>
                                        </div>
                                     </a>
                                     <a class="dropdown-item list-group-item" href="javascript:void(0)">
                                        <div class="d-flex justify-content-between">
                                           <div class="pd-r-10">
                                              <span class="avatar avatar-offline">
                                              <img src="assets/images/users-face/6.png" class="img-fluid" alt="">
                                              <i></i>
                                              </span>
                                           </div>
                                           <div>
                                              <span class="tx-semibold">Edward Lane</span>
                                              <span class="small tx-gray-500 ft-right">Mar 21, 22:21pm</span>
                                              <div class="tx-gray-700">Edward Lane, just created a new blog post</div>
                                           </div>
                                        </div>
                                     </a>
                                  </div>
                                  <div class="top-message-footer">
                                     <a href="">View all Messages</a>
                                  </div>
                               </div>
                            </div>
                         </li> --}}
                         <!--/ Messages Dropdown End -->
                         <!--================================-->
                         <!-- Profile Dropdown Start -->
                         <!--================================-->
                         <li class="list-inline-item dropdown">
                            <a  href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="{{ asset('admin-assets/images/users-face/profile.png') }}" class="img-fluid wd-30 ht-30 rounded-circle" alt="">
                          
                            </a>
                            <span class="messages-count wave in">.</span>
                            <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                               <div class="user-profile-area">
                                  <div class="user-profile-heading">
                                     <div class="profile-thumbnail">
                                        <img src="assets/images/users-face/1.png" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                     </div>
                                     <div class="profile-text">
                                        <h6 style="text-transform:capitalize;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                                        <span>({{ Auth::user()->role }})</span>
                                     </div>
                                  </div>
                                  <a href="" class="dropdown-item"><i data-feather="user" class="wd-16 mr-2"></i> My profile</a>
                                  <a href="" class="dropdown-item"><i data-feather="message-square" class="wd-16 mr-2"></i> Messages</a>
                                  <a href="" class="dropdown-item"><i data-feather="settings" class="wd-16 mr-2"></i> Settings</a>
                                  <a href="" class="dropdown-item"><i data-feather="activity" class="wd-16 mr-2"></i> My Activity</a>
                                      <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                           @csrf

                           <x-dropdown-link class="dropdown-item" :href="route('logout')"
                                   onclick="event.preventDefault();
                                               this.closest('form').submit();">
                               {{ __('Log Out') }}
                                  {{-- <a href="aut-logign-register.html" class="dropdown-item"><i data-feather="power" class="wd-16 mr-2"></i> Sign-out</a> --}}
                           </x-dropdown-link>
                        
                       </form>
                               
                               </div>
                            </div>
                         </li>
                         <!-- Profile Dropdown End -->
                      </ul>
                   </div>
                   <!--/ Header Right End -->
                </nav>
             </div>
             <!--/ Page Header End -->  