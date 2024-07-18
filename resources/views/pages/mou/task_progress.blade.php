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
                                    <h6 class="card-header-title tx-13 mb-0">Task Progress</h6>
                                 </div>
                                 <div class="text-right">
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TaskReportModal">
                                            <i class="fa fa-plus"></i>Task Report
                                        </button>&nbsp
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUserModal">
                                         <i class="fa fa-plus"></i>Task Status
                                     </button>&nbsp
                                            
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#extendTaskModal">
                                         <i class="fa fa-plus"></i>Extend Duration
                                     </button>&nbsp 
                                       
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
                                    
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>Assign to</th>
                                       <th>Delivery Task</th>
                                       <th>Delivery Report</th>
                                       <th>Remain Day</th>
                                       <th>status</th>
                                   
                                       <th>Start Date</th>
                                       <th>End Date</th>
                                       <th>action</th>
                                
                                
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                      
                                    
                                         <td>{{ $task->Task_title}}</td>
                                         <td>{!! nl2br(e($task->Task_description)) !!}</td>
                                        <td> @foreach ($task->assignedUsers as $user)
                                         {{ $user->first_name }} {{ $user->last_name }}<br>
                                     @endforeach
                                         <td> 
                                             @foreach ($task->taskDeliveries as $index => $delivery)
                                             <div>{{ $index + 1 }}. {{ $delivery->task_delivery_name }}: {{ $delivery->task_delivery_value }}</div>
                                         @endforeach
             
                                         </td>
                                         <td> 
                                            @if($task->taskDeliveries)
        @foreach ($task->taskDeliveries as $delivery)
            @if($delivery->deliveryReports)
                @foreach ($delivery->deliveryReports as $report)
                    <div>
                        <strong>{{ $delivery->task_delivery_name }}</strong>:   <strong>{{ $report->task_report_delivery_value }}</strong>: {{ $report->task_delivery_comment }}
                    </div>
                @endforeach
            @endif
        @endforeach
    @endif

                                         </td>

                                         <td>    
                                             <span style="color: rgb(255, 60, 0); font-weight: bold;">
                                                 @php
                                                     $startDate = new DateTime($task->task_start_date);
                                                     $endDate = new DateTime($task->task_end_date);
                                                     $diff = $startDate->diff($endDate);
             
                          
                                                 @endphp
                                                 Day: {{ $diff->days }}
                                             </span>
                                         </td>
                                         <td>{{ $task->task_status_name}}</td>
                                         {{-- <td>Comment</td> --}}
                                         <td>{{ $task->task_start_date}}</td>
                   
                                         <td>{{ $task->task_end_date}}</td>
                                         
             
                                       
                                         
                                  
                                 
                                       
                                     
                                        
                                         <td>
                                             <div class="d-flex align-items-center">
                                                 {{-- <a href="{{ route('mous.preview', $task->id) }}" class="btn btn-primary btn-sm">
                                                     <i class="fa fa-eye"></i> View PDF
                                                 </a> --}}
                                         
                                                 @if(in_array(Auth::user()->role, ['pmu']))
                                                     <form action="{{ route('tasks.delete', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Task?');">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="btn btn-danger btn-sm ml-2 deleteTask">
                                                             <i class="fa fa-trash"></i> Delete
                                                         </button>
                                                     </form>
                                         
                                                     <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm ml-2">
                                                         <i class="fa fa-edit"></i> Edit
                                                     </a>
                                                 @endif
                                             </div>
                                         </td>
                                         
                                                  
                                                  
                                                   
                                                 </tr>
                                    @endforeach
                                    
                                 </tbody>
                                
                              </table>
                              <!-- Assign Task Modal -->
                    <div class="modal fade" id="assignTaskModal" tabindex="-1" role="dialog" aria-labelledby="assignTaskModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="assignTaskModalLabel">Assign Task To User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('tasks.assign') }}">
                                        @csrf
                                        <input type="hidden" name="task_id" id="task_id">
                                        <div class="form-group">
                                            <label for="user_id" class="form-control-label">User: <span class="tx-danger">*</span></label>
                                            <select class="custom-select" id="user_id" name="user_id" required>
                                                <option selected disabled>Choose User...</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Assign Task</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- model --}}
            <!--New Task Modal -->
            <div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newContractModalLabel">New Task</h5>
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
                                
              
              
                                <form class="needs-validation" method="POST" action="{{ route('save.task') }}" enctype="multipart/form-data">
                                    
                                          @csrf
                                       
                                              <div class="form-layout">
                                                
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Mou: <span
                                                                    class="tx-danger">*</span></label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text"
                                                                        for="inputGroupSelect01">Options</label>
                                                                </div>
                                                                <select class="custom-select" id="inputGroupSelect01" name="mou_id">
            
                                                                    <option selected>Choose Mou...</option>
                                                                    @foreach ($mous as $mou)
                                                                        <option value="{{ $mou->id }}">
                                                                            {{ $mou->mou_title }}
                                                                        </option>
                                                                    @endforeach 
                                                                 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-control-label">Task Title <span
                                                                    class="tx-danger">*</span></label>
                                                            <input class="form-control" type="text" name="Task_title"
                                                                placeholder="Enter Title" required>
                                                        </div>                
                                                        <div class="form-group">
                                                            <label class="form-control-label">Task Description: <span
                                                                    class="tx-danger">*</span></label>
                                                            <textarea rows="5" class="form-control is-valid" name="Task_description" placeholder="Task Description"></textarea>
                                                        </div>
                                                   
                                                
                                                      
                                                      </div>
                                                      <!-- col-4 -->
                                                      <div class="col-md-6 mg-t--1 mg-md-t-0">
                                                         
                                                        <div class="form-group">
                                                            <label class="form-control-label">Start Date: <span
                                                                    class="tx-danger">*</span></label>
                                                            <input class="form-control" type="date" name="task_start_date"
                                                                placeholder="Start Date" required>
                                                         </div> 
                                                         <div class="form-group">
                                                            <label class="form-control-label">End Date: <span
                                                                    class="tx-danger">*</span></label>
                                                            <input class="form-control" type="date" name="task_end_date"
                                                                placeholder="End Date" required>
                                                         </div> 
                                                        
                                                         <div class="form-layout-footer text-center">
                                                            <button class="btn btn-primary" style="width: 200px;">Save Contract</button>
                                                        </div>
                                                      </div>
                                                   
                                                     
                                           
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
  <!--Assign User To task -->
  <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
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
                    
  
  
                    <form method="POST" action="{{ route('update.task.status') }}">
                        @csrf
                        <div class="form-layout">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Task: <span class="tx-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="task_id" required>
                                                <option selected disabled>Choose Task...</option>
                                                @foreach ($tasks as $task)
                                                    <option value="{{ $task->id }}">
                                                        {{ $task->Task_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Progress: <span class="tx-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="task_status_name">Status Progress</label>
                                            </div>
                                            <select class="custom-select" id="task_status_name" name="task_status_name" required>
                                                <option selected disabled>Choose Progress...</option>
                                                <option value="Not Started">Not Started</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Terminated">Terminated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-layout-footer text-center">
                                <button class="btn btn-primary" style="width: 250px;">Update Status</button>
                            </div>
                        </div>
                    </form>
                    
                      </div>

                      
                  
              </div>
            </div>
        </div>
    </div>

    
</div>

{{-- TaskReportModal --}}

<div class="modal fade" id="TaskReportModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newContractModalLabel">Task Report Progress</h5>
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
                    
       
                    <form method="POST" action="{{ route('savetaskDelivery.report') }}">
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
                                            <select class="custom-select" id="contractSelect" name="task_delivery_id" required>
                                                <option value="" disabled selected>Choose Deliverable...</option>
                                                @foreach ($deliverables as $deliverable)
                                                    <option value="{{ $deliverable->id }}">
                                                        {{ $deliverable->task_delivery_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                    
                              
                                    <div class="form-group">
                                        <label class="form-control-label">Delivery Value<span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" name="task_report_delivery_value" placeholder="enter value">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment" class="col-form-label">Comment:</label>
                                        <textarea class="form-control" id="comment" name="task_delivery_comment" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-layout-footer text-center">
                                <button class="btn btn-primary" style="width: 250px;">Save Delivery Progress</button>
                            </div>
                        </div>
                    </form>
                    
                  
                    
                    
                    
                   
                      </div>

                      
                  
              </div>
            </div>
        </div>
    </div>

    
</div>




            <!-- New Extend Task-->
<div class="modal fade" id="extendTaskModal" tabindex="-1" role="dialog" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newContractModalLabel">Extend Duration</h5>
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
  
  
                     <form class="needs-validation" method="POST" action="{{ route('extend.tasks.duration') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-layout">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Task: <span class="tx-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="task_id" required>
                                                <option selected disabled>Choose Task...</option>
                                                @foreach ($tasks as $task)
                                                    <option value="{{ $task->id }}">
                                                        {{ $task->Task_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Extend Task End Date: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="date" name="task_end_date" placeholder="Task End Date" required min="<?php echo date('Y-m-d');?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-layout-footer text-center">
                                <button class="btn btn-primary" style="width: 250px;">Extend</button>
                            </div>
                        </div>
                    </form>
                    
                      </div>
 
                      
                  
              </div>
            </div>
        </div>
    </div>
 
    
 </div>

                    <!-- JavaScript to show modals with task ID -->
                    <script>
                        function showModal(modalId, taskId) {
                            $('#' + modalId).modal('show');
                            $('#' + modalId).find('input[name="task_id"]').val(taskId);
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

            <!--/ Page Inner End -->
            </section>

@endsection
