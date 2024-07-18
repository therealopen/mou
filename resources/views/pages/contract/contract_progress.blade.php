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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <h6 class="card-header-title tx-13 mb-0">Progress Page</h6>
                        </div>
                        <div class="text-right">
                            <div class="d-flex">
                                {{-- <a href="" class="mr-3"><i class="ti-reload"></i></a> --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExtendContractModal">
                                 <i class="fa fa-plus"></i>Status Progress
                             </button>&nbsp
                                    
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reportDeliveryModal">
                                 <i class="fa fa-plus"></i>Delivery Progress
                             </button>&nbsp
                               
                                
                                 
                              
                                
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
                             
                                <th>Contract Name</th>
                              
                          
                                <th>Deliverable</th>
                                <th>Deliverable Report</th>
                                {{-- <th>Progress Bar</th> --}}
                                <th>Progress Status</th>
                             
                              
                              
                          
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $contract)
                                <tr>
                                    <td>
                                       {{-- <a href="" class="link-style"> --}}
                                          <a href="#" class="toggle-details" style="color: rgb(6, 23, 253); text-decoration: underline;">
                                             {{ $contract->contract_name }}
                                    </a>
                                    </td>
                                 
                                  
                                    <td style="color: rgb(0, 136, 255); font-weight: bold;">
                                       @foreach ($contract->contractDeliveries as $delivery)
                                       <div>{{ $delivery->contract_delivery_name }}: {{ $delivery->contract_delivery_value }}</div>
                                   @endforeach

                                    </td>
                                    <td> @foreach ($contract->contractDeliveries as $delivery)
                                        @foreach ($delivery->reports as $report)
                                            <div>
                                                {{ $delivery->contract_delivery_name }} {{ $report->report_delivery_value }}: 
                                                {{ $report->contract_delivery_comment }}
                                            </div>
                                        @endforeach
                                    @endforeach</td>
                                  
                              
                                    <td style="color: #0a8fe8; font-weight: bold;"> <span style="color: rgb(0, 30, 255); font-weight: bold;">
                                       {{ $contract->status_tpc }}
                                    
                                      </span</td>
                                
                                  
                                   
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

<!-- Report Delivery Modal -->
<div class="modal fade" id="reportDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newContractModalLabel">Delivery Report Progress</h5>
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
                    
       
                    <form method="POST" action="{{ route('saveProgressDeliveryreport') }}">
                        @csrf
                        <div class="form-layout">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Deliverable: <span class="tx-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="contractSelect">Options</label>
                                            </div>
                                            <select class="custom-select" id="contractSelect" name="contract_delivery_id" required>
                                                <option value="" disabled selected>Choose Deliverable...</option>
                                                @foreach ($deliverables as $deliverable)
                                                    <option value="{{ $deliverable->id }}">
                                                        {{ $deliverable->contract_delivery_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                    
                              
                                    <div class="form-group">
                                        <label class="form-control-label">Delivery Value<span class="tx-danger">*</span></label>
        <input type="text" class="form-control" name="report_delivery_value" placeholder="Enter Value" required
         pattern="\d+" title="Character you enter are not allowed!">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment" class="col-form-label">Comment:</label>
                                        <textarea class="form-control" id="comment" name="contract_delivery_comment" required
          oninput="validateComment(this)" title="Please enter at least 3 alphabetic characters. Special characters are not allowed."></textarea>

<script>
function validateComment(textarea) {
    const value = textarea.value.trim();  // for whitespace
    const pattern = /^[A-Za-z\s]{3,}$/;   // for alphabetic characters and spaces

    if (!pattern.test(value)) {
        textarea.setCustomValidity("Special characters or number are not allowed.");
    } else {
        textarea.setCustomValidity("");
    }
}
</script>

                                    </div>
                                </div>
                            </div>
                            <div class="form-layout-footer text-center">
                                <button class="btn btn-primary" style="width: 100px;">Save</button>
                            </div>
                        </div>
                    </form>
                    
                  
                    
                    
                    
                   
                      </div>

                      
                  
              </div>
            </div>
        </div>
    </div>

    
</div>





<!-- Status Progress Modal -->
<div class="modal fade" id="ExtendContractModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="newContractModalLabel">Status Progress</h5>
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


                  <form method="POST" action="{{ route('processProgresscontracts') }}">
                     

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
                                    <label class="form-control-label">Progress: Type<span
                                            class="tx-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"
                                                for="inputGroupSelect01">status Progress</label>
                                        </div>
                                        <select class="custom-select" id="status_tpc"
                                            name="status_tpc">
                                            <option selected>Choose Contract Progress...</option>
                                            <option value="terminate">terminate</option>
                                            <option value="progress">In progress</option>
                                            <option value="complete">complete</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                
            
                                 <label for="comment" class="col-form-label">Comment(reason):</label>
                                 <textarea class="form-control" id="comment" name="comment" required
          oninput="validateComment(this)" title="Please enter alphabetic characters and spaces only."></textarea>

<script>
function validateComment(textarea) {
    const value = textarea.value.trim();  // for whitespace
    const pattern = /^[A-Za-z\s]+$/;      //alphabetic characters and spaces

    if (!pattern.test(value)) {
        textarea.setCustomValidity("Please enter alphabetic characters only allowed!");
    } else {
        textarea.setCustomValidity("");
    }
}
</script>
                             </div>
                             </div>
                         </div>
                         <div class="form-layout-footer text-center">
                             <button class="btn btn-primary" style="width: 100px;">Save</button>
                         </div>
                     </div>
                 </form>
                 
                   </div>

                   
               
           </div>
         </div>
       </div>
   </div>
</div>

<!--End  Status Progress Modal -->
@endsection
