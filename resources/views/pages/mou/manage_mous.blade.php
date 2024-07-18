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
                                    <h6 class="card-header-title tx-13 mb-0">Mou Detail</h6>
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
                                       
                                        
                                         
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newMouModal">
                                          <i class="fa fa-plus"></i> New Mou
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
@endif
{{-- <img src="{{ asset('assets/signature/signature.png') }}" alt="Header Logo" class="header-image"> --}}


                        <table id="compactTable" class="display compact responsive nowrap">
                                 <thead>
                                  
                                    <tr>
                                        <th>Partner</th>
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>Task</th>
                                       <th>Deliverable Task</th>
                                       <th>Start Date</th>
                                       <th>End Date</th>
                                  

                                     
                                       <th>action</th>
                                
                                
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($mous as $mou)
                                    <tr>
                                      
                           <td>{{ $mou->Partner->company_name }}</td>         
                            <td>{{ $mou->mou_title}}</td>
                            <td>{!! nl2br(e($mou->mou_description)) !!}</td>
                            <td> @foreach ($mou->tasks as $index => $task)
                                <div>{{ $index + 1 }}.{{ $task->Task_title }}</div>
                            @endforeach</td>
                            <td>
                                @if ($mou->taskDeliveries)
                        @foreach ($mou->taskDeliveries as $index => $delivery)
                            <div>{{ $index + 1 }}. {{ $delivery->task_delivery_name }}: {{ $delivery->task_delivery_value }}</div>
                        @endforeach
                    @endif
                            </td>
                            <td>{{ $mou->start_date}}</td>
      
                            <td>{{ $mou->end_date}}</td>
                            

                          
                            
                     
                    
                          
                        
                           
                                       <td>
                                          @if(in_array(Auth::user()->role, ['pmu']))
                                      
                                          <div class="d-inline">
                                             <form action="{{ route('mou.delete', $mou->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this partner?');" class="d-inline">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                             </form>
                                             <a href="{{ route('contracts.edit', $mou->id) }}" class="btn btn-primary btn-sm">
                                                 <i class="fa fa-edit"></i> Edit
                                             </a>
                                         </div>
                                         
                                         @endif

                                         {{-- <a href="{{ route('mous.preview', $mou->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye">view pdf</i> 
                                        </a> --}}

                                        {{-- <a href="{{ route('other.mou', $mou->id) }}" class="btn btn-primary btn-sm">
                                          <i class="fa fa-edit"></i> update
                                      </a> --}}

                                    
                                 

                                
                                    </td>
                                     
                                     
                                      
                                    </tr>
                                    @endforeach
                                    
                                 </tbody>
                                
                              </table>
                            
                             
         
         <!-- JavaScript code -->
     

<script>
   function openModal(id,) {
       $('#id').val(id);
       $('#varyingModal').modal('show');
   }

   function saveInvitation() {
       var id = $('#id').val();
       var contact_number = $('#contact_number').val();
    
   }
</script>


                           
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
                        <!--New Mou Modal -->
                        <div class="modal fade" id="newMouModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newContractModalLabel">New Mou</h5>
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
                                            
                                            
                   
                          
                                            <form class="needs-validation" method="POST" action="{{ route('mous.save') }}" enctype="multipart/form-data">
                                                      @csrf
                                                   
                                                          <div class="form-layout">
                                                            
                                                              <div class="row">
                                                                  <div class="col-md-6">
                                                                     <div class="form-group">
                                                                        <label class="form-control-label">Partner: <span
                                                                                class="tx-danger">*</span></label>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <label class="input-group-text"
                                                                                    for="inputGroupSelect01">Options</label>
                                                                            </div>
                                                                            <select class="custom-select" id="inputGroupSelect01"
                                                                                name="partner_id">
                        
                                                                                <option selected>Choose Partners...</option>
                                                                                 @foreach ($partners as $partner)
                                                                                    <option value="{{ $partner->id }}">
                                                                                        {{ $partner->company_name }} 
                                                                                    </option>
                                                                                @endforeach 
                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                    
                                                                    <div class="form-group">
                                                                     <label class="form-control-label">Title <span
                                                                             class="tx-danger">*</span></label>
                                                                     <input class="form-control" type="text" name="mou_title"
                                                                         placeholder="Enter Title" required 
                                                                         pattern="[A-Za-z\s]{3,}" title="At least 3 alphabetic, special characters are not allowed.">
                                                                 </div>
                                                                
                                                                 <div class="form-group">
                                                                  <label class="form-control-label">Mou Description: <span
                                                                          class="tx-danger">*</span></label>
                                                                          <textarea rows="8" class="form-control is-valid" name="mou_description"
          placeholder="MoU Description" required
          oninput="validateMouDescription(this)"
          title="Please enter alphanumeric characters only."></textarea>

<script>
function validateMouDescription(textarea) {
    const value = textarea.value.trim();  //  whitespace
    const pattern = /^[a-zA-Z0-9\s]*$/;   // characters and spaces

    if (!pattern.test(value)) {
        textarea.setCustomValidity("Please enter alphanumeric characters only.");
    } else {
        textarea.setCustomValidity("");
    }
}
</script>
                                                              </div>
                                                                  
                                                                  </div>
                                                                  <!-- col-4 -->
                                                                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                                                                     
                                                                   
                                            <div class="form-group">
                                             <label class="form-control-label">Start Date: <span
                                                     class="tx-danger">*</span></label>
                                             <input class="form-control" type="date" name="start_date"
                                                 placeholder="Start Date" required>
                                          </div> 
                                          <div class="form-group">
                                             <label class="form-control-label">End Date: <span
                                                     class="tx-danger">*</span></label>
                                             <input class="form-control" type="date" name="end_date"
                                                 placeholder="End Date" required>
                                          </div> 
                                          <div class="form-group">
                                             <label class="form-control-label">Upload Mou Document: <span class="tx-danger">*</span></label>
                                             <input class="form-control" type="file" name="mou_document" placeholder="Upload document" required>
                                              
                                         </div>

                                         
                                                              
                                                                 
                                                                  </div>
                                                               
                                                                 
                                                       
                                                              </div>
                                                             
                                                           <div class="form-layout-footer text-center">
                                                            <button class="btn btn-primary" style="width: 250px;">Save Mou</button>
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
