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
                                    <h6 class="card-header-title tx-13 mb-0">Partners Detail</h6>
                                 </div>
                                 <div class="text-right">
                                    <div class="d-flex">
                                        {{-- <a href="" class="mr-3"><i class="ti-reload"></i></a> --}}
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExtendContractModal">
                                         <i class="fa fa-plus"></i>Extend Duration
                                     </button>&nbsp
                                            
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newContractDeliveryModal">
                                         <i class="fa fa-plus"></i>Contract Delivery
                                     </button>&nbsp --}}
                                       
                                        
                                         
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newPartnersModal">
                                          <i class="fa fa-plus"></i> New Prtner's
                                      </button>
                                        
                                    </div>
                                </div>
                              </div>
                           </div>
                           <div class="card-body pd-0">
                            
 

@if (session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- <img src="{{ asset('assets/signature/signature.png') }}" alt="Header Logo" class="header-image"> --}}


                        <table id="compactTable" class="display compact responsive nowrap">
                                 <thead>
                                  
                                    <tr>
                                        <th>company name</th>
                                       <th>company Address</th>
                                       <th>company number</th>
                                       <th>company email</th>
                                       <th>representation name</th>
                                       <th>representative title</th>
                                    
                                       <th>representative email</th>
                                     
                                    
                                 
                                       <th>action</th>
                                
                                
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($partners as $partner)
                                    <tr>
                                      
                            <td>{{ $partner->company_name }}</td>            
                            <td>{{ $partner->company_address }}</td>
                            
                         
                            <td>{{ $partner->company_contact_number }}</td>
                            <td>{{ $partner->company_email }}</td>
      
                            <td>{{ $partner->representation_name }}</td>
                            
                            <td>{{ $partner->representative_title }}</td>
                            <td>{{ $partner->representative_email }}</td>
                            
                            
                           
                                       <td>
                                          @if(in_array(Auth::user()->role, ['pmu']))
                                          <div class="d-inline">
                                        <form action="{{ route('partners.delete', $partner->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this partners?');">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                      </form>
                                      
                                         <a href="{{ route('partner.edit', $partner->id) }}" class="btn btn-primary btn-sm">
                                             <i class="fa fa-edit"></i> Edit
                                         </a>
                                       </div>
                                         @endif 
                                        
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

            {{-- model --}}
            !--New Partners Modal -->
<div class="modal fade" id="newPartnersModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newContractModalLabel">New Partners</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
              
               <div class="">
                
                     
                      <div class="card-bod">
  
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
                    
  
  
                    <form class="needs-validation" method="POST" action="{{ route('save.partners') }}" enctype="multipart/form-data">
                              @csrf
                           
                                  <div class="form-layout">
                                    
                                      <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group">

                                                <label class="form-control-label">Company Name:<span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="company_name"
                                                    placeholder="Enter Company Name" required 
                                                    pattern="[A-Za-z\s]{3,}" title="Atleast 3 or more special characters are not allowed.">
                                            </div>
                            
                                            <div class="form-group">

                                                <label class="form-control-label">Company Address:<span
                                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="company_address"
                                    placeholder="Enter Company Address" required
                                    minlength="5" maxlength="15" title="Atleast 5 or more character allowed">

                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Company Number <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="company_contact_number"
                                                    placeholder="Enter contact Number" required pattern="\d+" title="Only  phone number are allowed!" minlength="10" maxlength="12">
                                            </div>
                                           
                                            <div class="form-group">
                                             <label class="form-control-label">Company Email<span
                                                     class="tx-danger">*</span></label>
                                             <input class="form-control" type="email" name="company_email"
                                                 placeholder="Enter Email" required>
                                         </div>
                                          
                                          </div>
                                          <!-- col-4 -->
                                          <div class="col-md-6 mg-t--1 mg-md-t-0">
                                             
                                            <div class="form-group">
                                                <label class="form-control-label">Representative Name: <span
                                                        class="tx-danger">*</span></label>
                                                        <input class="form-control" type="text" name="representation_name"
       placeholder="Representative Name" required
       pattern="[A-Za-z\s]{3,}" title="atleast 3 or more special characters are not allowed.">

                                             </div> 
                                             <div class="form-group">
                                                <label class="form-control-label">Representative Title: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="representative_title"
                                                    placeholder="Representative Title" required 
                                                    pattern="[A-Za-z\s]{3,}" title="atleast 3 or more special characters are not allowed.">
                                             </div> 
                                             <div class="form-group">
                                                <label class="form-control-label">Representative Email: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="email" name="representative_email"
                                                    placeholder="Representative Email" required>
                                             </div> 
                                             <div class="form-group">
                                                <label class="form-control-label">Representative Number: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="representative_number"
                                                    placeholder="eg 255657193660"  required pattern="\d+" title="Only  phone number are allowed!" minlength="10" maxlength="12">
                                             </div> 
                                      
                                         
                                          </div>
                                       
                                         
                               
                                      </div>
                                     
                                   <div class="form-layout-footer text-center">
                                    <button class="btn btn-primary" style="width: 250px;">Save Contract</button>
                                </div>
                                
                                   
                                      <!-- row -->
  
                                      <!-- form-group -->
                                      
                                  </div>
                                  <!-- form-layout -->
                                 
                              
                              </form>
                      </div>

                      
                  
              </div>
            </div>
        </div>
    </div>

    
</div>


            <!--/ Page Inner End -->
            </section>

@endsection
