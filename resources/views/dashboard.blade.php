@extends('layouts.admin.index')

@section('content')
  
  <!-- Page Inner Start -->
            <!--================================-->
            <div class="page-inner">
               <!--================================-->
               <!-- Breadcrumb Start -->
               <!--================================-->
               <div class="pageheader pd-t-25 pd-b-35">
                  <div class="d-flex justify-content-between">
                     <div class="clearfix">
                        <div class="pd-t-5 pd-b-5">
             
                           <h1 class="pd-0 mg-0 tx-20 tx-dark">logged in As:<b>{{ Auth::user()->first_name }}
                              {{ Auth::user()->last_name }}  ({{ Auth::user()->role }})</b></h1>
                        </div>
                        <div class="breadcrumb pd-0 mg-0">
                           <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i> Home</a>
                           <a class="breadcrumb-item" href="">Dashboard</a>
                          
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                        <button id="dashboardDate" class="btn btn-default dropdown-toggle mr-2 d-none d-md-block pd-y-8-force"></button>
                        <!-- <button type="button" class="btn btn-default mr-2 d-none d-none d-lg-block pd-t-6-force pd-b-5-force">
                        <i data-feather="log-in" class="wd-16 mr-2"></i>Import</button>
                        <button type="button" class="btn btn-default mr-2 mb-2 mb-md-0 d-none d-lg-block pd-t-6-force pd-b-5-force">
                        <i data-feather="printer" class="wd-16 mr-2"></i>Print</button>
                        <button type="button" class="btn btn-default mb-2 mb-md-0 d-none d-lg-block pd-t-6-force pd-b-5-force">
                        <i data-feather="download" class="wd-16 mr-2"></i>Download Report</button> -->
                     </div>
                  </div>
               </div>
               <!--/ Breadcrumb End -->
               <!--================================-->
               <!--  Start -->
               <!--================================-->
               <div class="row clearfix">
                  <!--================================-->
                  <!-- Heard Card Start -->	
                  <!--================================-->

                  @if(Auth::user()->role === 'admin')
                  <div class="col-md-6 col-lg-6 col-xl-3">
                     
                  <a href="{{route('view_users')}}">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Users</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-primary tx-normal">{{$totalUsers}}</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  </a>
                  @endif
                  @if(Auth::user()->role === 'admin')
                  <div class="col-md-6 col-lg-6 col-xl-3">
                     
                  <a href="{{ route('admin.add_user_page') }}">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Add New Users</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-primary tx-normal">{{$totalUsers}}</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  </a>
                  @endif
                    <!-- Traffic Sources Start -->	
                  <!--================================-->
                  @if(Auth::user()->role === 'staff')
                  <div class="col-xl-12">
                     <div class="card mg-b-30 traffic-source">
                        <div class="card-header d-flex justify-content-between align-items-center">
                           <h6 class="tx-13 mb-0">Task Progress</h6>
                    
                        </div>
                        <div class="card-body pd-0">
                           <div class="tab-content" id="pills-tabContent-1">
                              <div class="tab-pane fade show active " id="pills-1" role="tabpanel" aria-labelledby="pills-1">
                                 <div class="row pd-20">
                                    
                                    <div class="col-md-4 align-items-center">
                                       <a href="{{ route('staff.task')}}">
                                       <label class="mb-0 tx-10 tx-gray-500 tx-uppercase tx-spacing-1"><label style="font-weight: bold; font-size: larger; " class="tx-success">TASK</label></label>
                                       <div class="d-flex align-items-baseline mg-b-5">
                                          <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik  tx-normal">{{$assignedTasksCount}}<span></span></h2>
                                          {{-- <span class="tx-11 tx-success"><i class="ti-arrow-up tx-8 ml-1"></i>57.7%</span> --}}
                                       </div>
                                       <div class="progress ht-3">
                                          <div class="progress-bar bg-primary wd-100p" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="tx-13 tx-dar-500">Total tasks assigned to the user.</p>
                                    </a>
                                    </div>
                            
                                    <div class="col-md-4 align-items-center">
                                       <a href="{{ route('tasks.staff.onprogress')}}">
                                       <label class="mb-0 tx-10 tx-gray-500 tx-uppercase tx-spacing-1"><label style="font-weight: bold; font-size: larger; " class="tx-danger">IN PROGRESS TASK</label></label>
                                       <div class="d-flex align-items-baseline mg-b-5">
                                          <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{$totalInProgressTasks}}<span></span></h2>
                                        
                                       </div>
                                       <div class="progress ht-3">
                                          <div class="progress-bar bg-danger wd-100p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="tx-13 tx-dark-500">Total On Progress Task.</p>
                                    </a>
                                    </div>
                                

                                    <div class="col-md-4 align-items-center">
                                       <a href="{{ route('tasks.staff.complete')}}">
                                       <label class="mb-0 tx-10 tx-gray-500 tx-uppercase tx-spacing-1"><label style="font-weight: bold; font-size: larger; " class="tx-success">COMPLETE TASK</label></label>
                                       <div class="d-flex align-items-baseline mg-b-5">
                                          <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{$totalCompletedTasks}}<span></span></h2>
                                        
                                       </div>
                                       <div class="progress ht-2">
                                          <div class="progress-bar bg-success wd-100p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                       <p class="tx-13 tx-dark-500">Total Complete Task.</p>
                                    </a>
                                    </div>
                                 </div>
                               
                              </div>
                          
                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endif
                  <!--/ Traffic Sources End -->
                  

                
{{--               
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <a href="{{route('manage_contracts')}}">
                  <div class="card mg-b-30">
                     <div class="card-body">
                        <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Mou</h5>
                        <div class="d-flex justify-content-between align-items-center">
                           <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-primary tx-normal">{{$totalContract}}</h2>
                        </div>
                        <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-primary mr-2 d-flex align-items-center"><i class=" ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                     </div>
                  </div>
               </div>
            </a> --}}
            
         
               {{-- @if(in_array(Auth::user()->role, ['stc','hod','pmu','dpi','vc'])) <!-- Check if user has permission to view consultants -->
                  <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Completed Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-success tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  @endif --}}
                 
                  {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Completed Mou</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-success tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div> --}}
                  
           
                  {{-- @if(in_array(Auth::user()->role, ['stc', 'hod', 'pmu','dpi','vc'])) <!-- Check if user has permission to view consultants -->            
                  <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Progress Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-warning tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-warning mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  @endif --}}

                 
                  {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Progress Mou</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-warning tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-warning mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div> --}}
                  {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Progress Mou Task</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-warning tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-warning mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div> --}}
               

                

                  {{-- @if(in_array(Auth::user()->role, ['stc','hod', 'pmu','dpi','vc'])) <!-- Check if user has permission to view consultants -->            
                   <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Extended Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-info tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-info mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  @endif --}}

                
                   {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Extended Mou</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-info tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-info mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div> --}}
                  {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Extended Mou Task</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-info tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-info mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div> --}}
                  

                  {{-- @if(in_array(Auth::user()->role, ['stc', 'hod','pmu','dpi','vc','staff']))
                   <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Terminated Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-danger tx-normal">0</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-danger mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  @endif --}}

                 
                  {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card mg-b-30">
                       <div class="card-body">
                          <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Terminated Mou</h5>
                          <div class="d-flex justify-content-between align-items-center">
                             <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-danger tx-normal">0</h2>
                          </div>
                          <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-danger mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                       </div>
                    </div>
                 </div> --}}
                 

                
                  {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card mg-b-30">
                       <div class="card-body">
                          <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Active Mou</h5>
                          <div class="d-flex justify-content-between align-items-center">
                             <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-danger tx-normal">0</h2>
                          </div>
                          <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-danger mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                       </div>
                    </div>
                 </div> --}}
               

                
                 {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                   <div class="card mg-b-30">
                      <div class="card-body">
                         <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Active Contract</h5>
                         <div class="d-flex justify-content-between align-items-center">
                            <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-danger tx-normal">0</h2>
                         </div>
                         <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-danger mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                      </div>
                   </div>
                </div> --}}
          

                  <!--/ Heard Card End -->               
               </div>
               
               <div class="row">
                  <!--================================-->
                  <!-- Expansions Details Start -->	
                  <!--================================-->
            
                  <!--/ Expansions Details End -->
                  <!--================================-->
                  <!-- Search Result Details Start -->	
                  <!--================================-->
                
                  <!--/ Search Result Details End -->
               </div>
               <!--================================-->
               <!-- Sales Details Start -->	
               <!--================================-->				   
               <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
             
                                        <label class="text-head-bar">
                {{-- Progress --}}
          
              </label>

<!-- Count Card Start -->
               <!--================================-->
               <div class="row clearfix">
                  @if(in_array(Auth::user()->role, ['stc', 'hod','pmu','dpi','vc'])) <!-- Check if user has permission to view consultants -->
                  <div class="col-lg-12 col-xl-6">
                     <div class="row row-xs">
                        <div class="col-sm-6">
                           <a href="{{route('manage_contracts')}}">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Contract</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$totalContracts}}</span></h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total Contract</span> 
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-primary wd-100p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>

                        <div class="col-sm-6">
                           <a href="{{route('manage_contracts')}}">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Complete Contract</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$totalCompletedContracts}}</span> </h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total Completed Contract</span> 
                                    <span class="float-right">

                                    </span>
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-warning wd-100p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="10"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>

                        <div class="col-sm-6">
                           <a href="{{route('manage_contracts')}}">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Progres Contract</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$totalCompletedContracts}}</span> </h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total In Progress Contract</span> 
                                    <span class="float-right">

                                    </span>
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-teal wd-100p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="10"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>
                        <div class="col-sm-6">
                           <a href="{{route('manage_contracts')}}">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Terminated Contract</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$totalCompletedContracts}}</span> </h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total Terminated Contract</span> 
                                    <span class="float-right">

                                    </span>
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-danger wd-100p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="10"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>
                       

                        
                     </div>
                  </div>
                
                  {{-- //new card for overview --}}
                  <div class="col-lg-12 col-xl-6">
                     <div class="row row-xs">
                        <div class="col-sm-6">
                           <a href="{{route('manage.mous')}}">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Mou</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$totalMous}}</span></h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total Mou</span> 
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-gray wd-100p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>

                        <div class="col-sm-6">
                           <a href="{{route('manage.task')}}">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Mou Task</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$totalTasks}}</span> </h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total  Mou Task</span> 
                                    <span class="float-right">

                                    </span>
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-warning wd-100p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="10"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>

                        <div class="col-sm-6">
                           <a href="">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Progres Mou</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{$totalCompletedContracts}}</span> </h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total In Progress Mou</span> 
                                    <span class="float-right">

                                    </span>
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-teal wd-100p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="10"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>
                        <div class="col-sm-6">
                           <a href="">
                           <div class="card mg-b-30">
                              <div class="card-body">
                                 <div class="media d-inline-flex">
                                    <div>
                                       <span class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Complete Mou</span>					  
                                       <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">1</span> </h2>
                                    </div>
                                 </div>
                                 <div class="clearfix"> 
                                    <span class="float-left tx-11 tx-gray-500">Total Complete Mou</span> 
                                    <span class="float-right">

                                    </span>
                                 </div>
                                 <div class="progress ht-3">
                                    <div class="progress-bar bg-warning wd-100p" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="10"></div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        </div>
                       

                        
                     </div>
                  </div>
               </div>
               @endif
               @if(in_array(Auth::user()->role, ['pmu','hod','dem','vc'])) <!-- Check if user has permission to view consultants -->
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <a href="{{route('viewconsultants')}}">
                  <div class="card mg-b-30">
                     <div class="card-body">
                        <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Consultant</h5>
                        <div class="d-flex justify-content-between align-items-center">
                           <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-primary tx-normal">{{$totalConsultants}}</h2>
                        </div>
                        <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-primary mr-2 d-flex align-items-center"><i class=" ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                     </div>
                  </div>
               </div>
            </a>
            @endif
              
                                     <div class="row clearfix">
                                      
                                      

          
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


        

            
        </div>
          
                     
                
                      
               <!--/ Sales Details End -->
               <div class="row">
                  <!--================================-->
                  <!-- New Customers Start -->	
                  <!--================================-->			   
                  <div class="col-lg-6 col-xl-4">
                     
                  </div>
                  <!--/ New Customers End -->
                  <!--================================-->
                  <!-- Transaction History Start -->	
                  <!--================================-->
                  <div class="col-lg-6 col-xl-4">
                    
                  </div>
                  <!--/ Transaction History End -->
                  <!--================================-->
                  <!-- Customer Satisfaction Start -->	
                  <!--================================-->			  
                  <div class="col-xl-4">
                     <div class="card mg-b-30">
                       
                       <!--  <div class="card-body">
                    
                    
                          
                        </div> -->
                     </div>
                  </div>
                  <!--/ Customer Satisfaction End -->
               </div>
            </div>

            <!--/ Page Inner End -->
            </section>

@endsection
