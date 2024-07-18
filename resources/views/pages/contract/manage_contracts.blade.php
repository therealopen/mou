@extends('layouts.admin.index')

@section('content')
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!--================================-->
    <!-- Breadcrumb Start -->
    <!--================================-->

    <style>
.link-style {
    color: blue;
    text-decoration: underline;
}

      </style>
    <div class="pageheader pd-t-25 pd-b-35">
        <div class="d-flex justify-content-between">
            <div class="clearfix">
                <div class="pd-t-5 pd-b-5">
                    <h1 class="pd-0 mg-0 tx-20 tx-dark">Logged in As: <b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} ({{ Auth::user()->role }})</b></h1>
                </div>
                <div class="breadcrumb pd-0 mg-0">
                    <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i> Home</a>
                    <a class="breadcrumb-item" href="">Dashboard</a>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <button id="dashboardDate" class="btn btn-default dropdown-toggle mr-2 d-none d-md-block pd-y-8-force"></button>
                <!-- Add the "New Contract" button here -->
             
            </div>
            
        </div>
        
    </div>
    <!--/ Breadcrumb End -->

    <!-- Table and other content here -->

    <div class="row clearfix">
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
                                {{-- <a href="" class="mr-3"><i class="ti-reload"></i></a> --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExtendContractModal">
                                 <i class="fa fa-plus"></i>Extend Duration
                             </button>&nbsp
                                    
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newContractDeliveryModal">
                                 <i class="fa fa-plus"></i>Contract Delivery
                             </button>&nbsp
                               
                                
                                 
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newContractModal">
                                  <i class="fa fa-plus"></i> New Contract
                              </button>
                                
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
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" id="upload-error" style="margin:10px;">    
                
                    <span style="color: darkred; weight: 900;">{{ $error }}</span>
                
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('upload-error').style.display = 'none';
                            }, 10000); // Hide the error message after 5 seconds (5000 milliseconds)
                        </script>
                        @endforeach
                    
                  


                    <table id="compactTable" class="display compact responsive nowrap">
                        <thead>
                            <tr>
                                <th>Consultant Name</th>
                                <th>Contract Name</th>
                              
                                <th>Description</th>
                                <th>Deliverable</th>
                                <th>Remain Day</th>
                                <th>status</th>
                                <th>StartDate</th>
                                <th>EndDate</th>
                             
                                <th>Contract Value</th>
                                <th>Employer</th>
                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $contract)
                                <tr>
                                    <td>
                                       {{-- <a href="" class="link-style"> --}}
                                          <a href="#" class="toggle-details" style="color: rgb(6, 23, 253); text-decoration: underline;">
                                        @if ($contract->consultant)
                                            {{ $contract->consultant->first_name }} {{ $contract->consultant->last_name }}
                                        @else
                                            No Consultant Assigned
                                        @endif
                                    </a>
                                    </td>
                                    <td>{{ $contract->contract_name }}</td>
                                    <td>{!! nl2br(e($contract->contract_description)) !!}</td>
                                    <td style="color: rgb(0, 136, 255); font-weight: bold;">
                                       @foreach ($contract->contractDeliveries as $delivery)
                                       <div>{{ $delivery->contract_delivery_name }}: {{ $delivery->contract_delivery_value }}</div>
                                   @endforeach

                                    </td>
                                    <td>
                                        <span style="color: rgb(255, 60, 0); font-weight: bold;">
                                            @php
                                                $startDate = new DateTime($contract->contract_startDate);
                                                $endDate = new DateTime($contract->contract_endDate);
                                                $diff = $startDate->diff($endDate);
                                            @endphp
                                            Day: {{ $diff->days }}
                                        </span>
                                    </td>
                                    <td style="color: #0a8fe8; font-weight: bold;"> <span style="color: rgb(0, 30, 255); font-weight: bold;">
                                       {{ $contract->approval_status }} ({{ $contract->status_tpc }})
                                    
                                      </span</td>
                                  
                                    <td>{{ $contract->contract_startDate }}</td>
                                    <td>{{ $contract->contract_startDate }}</td>
                                    {{-- <td>{{ $contract->site_delivery }}</td> --}}
                                    <td>{{ $contract->contract_value }}</td>
                                    <td>{{ $contract->employer }}</td>
                                  
                                    <td>
                                        @if(in_array(Auth::user()->role, ['pmu']))
                                            <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm deleteContract">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                            <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Order Active dataTable End -->
    </div>
</div>
<!--/ Page Inner End -->

<!-- New Contract Modal -->
<div class="modal fade" id="newContractModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newContractModalLabel">New Contract</h5>
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
                    
  
  
                          <form class="needs-validation" method="POST" action="{{ route('savecontracts') }}" enctype="multipart/form-data">
                              @csrf
                           
                                  <div class="form-layout">
                                    
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="form-control-label">Consultant: <span
                                                          class="tx-danger">*</span></label>
                                                  <div class="input-group mb-3">
                                                      <div class="input-group-prepend">
                                                          <label class="input-group-text"
                                                              for="inputGroupSelect01">Options</label>
                                                      </div>
                                                      <select class="custom-select" id="inputGroupSelect01"
                                                          name="consultant_id">
  
                                                          <option selected>Choose Consultant...</option>
                                                          @foreach ($consultants as $consultant)
                                                              <option value="{{ $consultant->id }}">
                                                                  {{ $consultant->first_name }} {{ $consultant->last_name }}
                                                              </option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                <label class="form-control-label">Contract: Type<span
                                                        class="tx-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"
                                                            for="inputGroupSelect01">Options</label>
                                                    </div>
                                                    <select class="custom-select" id="inputGroupSelect01"
                                                        name="contract_type">
                                                        <option selected>Choose Contract type...</option>
                                                        <option value="1">Building</option>
                                                        <option value="2">Contract</option>
                                                        <option value="3">Construction</option>
                                                    </select>
                                                </div>
                                            </div>
  
                                              <div class="form-group">
  
                                                  <label class="form-control-label">Contract name: <span
                                                          class="tx-danger">*</span></label>
                                                          <input class="form-control" type="text" name="contract_name"
       placeholder="Enter Contract name" required
       pattern="[A-Za-z\s]{3,}" title="At least 3 alphabetic characters are required, and special characters are not allowed.">

                                              </div>
                                              <div class="form-group">
                                                  <label class="form-control-label">Description: <span
                                                          class="tx-danger">*</span></label>
                                                          <textarea rows="5" class="form-control is-valid" name="contract_description" placeholder="Description" required
          pattern="[A-Za-z\s]+" title="Only alphabetic characters and spaces are allowed." oninput="this.setCustomValidity(''); if(!this.checkValidity()) this.setCustomValidity('Only alphabetic characters and spaces are allowed.');"></textarea>
                                              </div>
                                          
                                          </div>
                                          <!-- col-4 -->
                                          <div class="col-md-6 mg-t--1 mg-md-t-0">
                                      
                                              <div class="form-group">
                                                  <label class="form-control-label">Start Date: <span
                                                          class="tx-danger">*</span></label>
                                                  <input class="form-control" type="date" name="contract_startDate"
                                                      placeholder="Enter StartDate" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="form-control-label">End Date: <span
                                                          class="tx-danger">*</span></label>
                                                  <input class="form-control" type="date" name="contract_endDate"
                                                      placeholder="Enter EndDate" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="form-control-label">Upload Contract Document: <span class="tx-danger">*</span></label>
                                                  <input class="form-control" type="file" name="contract_document" placeholder="Upload document" required>
                                                   
                                              </div>
                                              {{-- <div class="form-group">
                                                <label class="form-control-label">Contract Delivery: <span
                                                        class="tx-danger">*</span></label>
                                                <input class="form-control" type="text" name="site_delivery"
                                                    placeholder="Enter Contract Delivery" required>
                                            </div> --}}
                                            <div class="form-group">
                                             <label class="form-control-label">Contract Value: <span
                                                     class="tx-danger">*</span></label>
                                                     <input class="form-control" type="number" name="contract_value"
                                                         placeholder="Enter Contract Value" min="0" required
                                                        title="The character you enter are not allowed!">
                                         </div>

                                            <div class="form-group">
                                             <label class="form-control-label">Employer: <span
                                                     class="tx-danger">*</span></label>
                                             <input class="form-control" type="text" name="employer"
                                                 placeholder="Enter firstname" value="udom" required>
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


<!-- New Contract Delivery -->
<div class="modal fade" id="newContractDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="newContractModalLabel">Contract Delivery</h5>
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
 
 
                    <form class="needs-validation" method="POST" action="{{ route('savedeliverycontracts') }}" enctype="multipart/form-data">
                             @csrf
                          
                                 <div class="form-layout">
                                   
                                     <div class="row">
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                 <label class="form-control-label">Contract: <span
                                                         class="tx-danger">*</span></label>
                                                 <div class="input-group mb-3">
                                                     <div class="input-group-prepend">
                                                         <label class="input-group-text"
                                                             for="inputGroupSelect01">Options</label>
                                                     </div>
                                                     <select class="custom-select" id="inputGroupSelect01" name="contract_id" required>
                                                      <option value="" disabled selected>Choose Contract...</option>
                                                      @foreach ($contracts as $contract)
                                                          <option value="{{ $contract->id }}">
                                                              {{ $contract->contract_name }} {{ $contract->contract_name }}
                                                          </option>
                                                      @endforeach
                                                  </select>
                                                  
                                                 </div>
                                             </div>

                                             <div class="form-group">
 
                                                 <label class="form-control-label">Contract Delivery name: <span
                                                         class="tx-danger">*</span></label>
                                                         <input class="form-control" type="text" name="contract_delivery_name"
       placeholder="Enter Contract Delivery Name" required
       pattern="[A-Za-z\s]{3,}" title="Please enter at least 3 alphabetic characters. Special characters or numbers are not allowed.">

                                             </div>

                                             <div class="form-group">
 
                                                <label class="form-control-label">Contract Delivery Value: <span
                                                        class="tx-danger">*</span></label>
                                                        <input class="form-control" type="text" name="contract_delivery_value"
                                                         placeholder="Enter Contract Delivery Value" required
                                                        pattern="\d+" title="Character you enter are not allowed!.">

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


<!-- Extend Duration Modal -->
<div class="modal fade" id="ExtendContractModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="newContractModalLabel">Extend Contract Duration</h5>
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


                  <form class="needs-validation" method="POST" action="{{ route('avecontractextended') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-layout">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group">
                                     <label class="form-control-label">Contract: <span class="tx-danger">*</span></label>
                                     <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                             <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                         </div>
                                         <select class="custom-select" id="inputGroupSelect01" name="contract_id" required>
                                             <option value="" disabled selected>Choose Contract...</option>
                                             @foreach ($contracts as $contract)
                                                 <option value="{{ $contract->id }}">
                                                     {{ $contract->contract_name }}
                                                 </option>
                                             @endforeach
                                         </select>
                                     </div>
                                 </div>
                            
                                 <div class="form-group">
                                    <label class="form-control-label">Extend End Date: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="extend_end_date"
                                    placeholder="Contract End Date" required
                                    min="<?php echo date('Y-m-d'); ?>">
                                </div>
                             </div>
                         </div>
                         <div class="form-layout-footer text-center">
                             <button class="btn btn-primary" style="width: 250px;">Save Contract</button>
                         </div>
                     </div>
                 </form>
                 
                   </div>

                   
               
           </div>
         </div>
       </div>
   </div>

   
</div>
@endsection
