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
                  
    <!--/ Hoverable dataTable End -->	
                     <!--================================-->
                     <!-- Order Active dataTable Start -->
                     <!--================================-->
                     <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-30">
                           <div class="card-header">
                              <div class="d-flex justify-content-between align-items-center">
                                 <div>
                                    <h6 class="card-header-title tx-13 mb-0">Contracts Detail</h6>
                                 </div>
                                 <div class="text-right">
                                    <div class="d-flex">
                                       <a href="" class="mr-3"><i class="ti-reload"></i></a>
                                       <div class="dropdown" data-toggle="dropdown">
                                          <a href=""><i class="ti-more-alt"></i></a>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             {{-- <a href="{{ route('add_users') }}" class="dropdown-item"><i data-feather="info" class="wd-16 mr-2"></i>New User</a>
                                             <a href="index.html" class="dropdown-item"><i data-feather="share" class="wd-16 mr-2"></i>Share</a>
                                             <a href="download.html" class="dropdown-item"><i data-feather="download" class="wd-16 mr-2"></i>Download</a>
                                             <a href="copy.html" class="dropdown-item"><i data-feather="copy" class="wd-16 mr-2"></i>Copy to</a>
                                             <a href="move.html" class="dropdown-item"><i data-feather="folder" class="wd-16 mr-2"></i>Move to</a>
                                             <a href="rename.html" class="dropdown-item"><i data-feather="edit" class="wd-16 mr-2"></i>Rename</a>
                                             <a href="delete.html" class="dropdown-item"><i data-feather="trash" class="wd-16 mr-2"></i>Delete</a> --}}
                                         </div>
                                         
                                         
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-body pd-0">
                            @if (session()->has('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 5000); // Hide the message after 5 seconds (5000 milliseconds)
    </script>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger" id="error-message">
        {{ session('error') }}
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 5000); // Hide the error message after 5 seconds (5000 milliseconds)
    </script>
@endif
<table id="compactTable" class="display compact responsive nowrap">
                                 <thead>
                                  
                                    <tr>
                                       <th>contract Name</th>
                                       <th>action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($contracts as $contract)
                                    <tr>
                                 
                            <td>{{$contract->contract_name }}</td>  
                          
                            
                           
                         
                                       <td>
                                       <a href="{{ route('contracts.document', $contract->id) }}" class="btn btn-primary btn-sm">
                                             <i class="fa fa-eye"></i>View Document
                                        </a> 
                                    </td>
                                     
                                     
                                      
                                    </tr>
                                    @endforeach
                                    
                                 </tbody>
                                
                              </table>

                           
                           </div>
                        </div>
                     </div>
                     <!--/  Order Active dataTable End -->	
                     <!--================================-->
                     <!-- Scrollable Table Start -->
                     <!--================================-->


                  
                  <!--/ Heard Card End -->               
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
