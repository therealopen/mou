

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
                                
                                    <h6 class="card-header-title tx-13 mb-0">User Detail</h6>
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
                                <th>No</th>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Role</th>
                                 <th>Verify</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                               @php
                                   $index = 1;
                               @endphp
                               @foreach ($users as $user)
                               <tr>
                                  <td>{{ $index++ }}</td>
                                   <td>{{ strtoupper($user->first_name) }}</td>
                                   <td>{{ strtoupper($user->last_name) }}</td>
                                   <td>{{ $user->email }}</td>
                                   <td>{{ strtoupper($user->phone_number) }}</td>
                                   <td>{{ $user->role }}</td>
                                   <td>
                                       @if ($user->email_verified_at)
                                           <i class="fas fa-check-circle text-success"></i> Verified
                                       @else
                                           <i class="fas fa-times-circle text-danger"></i> Not Verified
                                       @endif
                                   </td>
                                   <td>{{ $user->status }}</td>
                                   <td>
                                    <div class="btn-group" role="group">
                                      
                                       <button type="button" class="btn btn-info btn-sm" onclick="editUser({{ $user }})">
                                          <i class="fa fa-edit"></i>
                                      </button>
                                      
                                      <button type="button" class="btn btn-dark btn-sm" onclick="showChangeStatusModal({{ $user->id }}, '{{ $user->status }}')">
                                       <i class="fa fa-money"></i>
                                   </button>
                                   </td>
                                 </div>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                       
                           </div>
                        </div>
                     </div>


                   <!-- Change Status Modal -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="changeStatusModalLabel">Change User Status</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <form id="changeStatusForm" method="POST" action="{{ route('change.status') }}">
               @csrf
               @method('PUT')
               <div class="modal-body">
                   <input type="hidden" name="user_id" id="changeStatusUserId">
                   <div class="form-group">
                       <label for="status" class="form-control-label">Status: <span class="tx-danger">*</span></label>
                       <select class="custom-select" id="status" name="status" required>
                           <option value="active">Active</option>
                           <option value="deactivate">Deactivate</option>
                       </select>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Change Status</button>
               </div>
           </form>
       </div>
   </div>
</div>
                <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <form id="editUserForm" action="" method="POST">
               @csrf
               @method('PUT')
               <div class="modal-body">
                   <input type="hidden" name="user_id" id="editUserId">
                   <div class="form-group">
                       <label for="editFirstName">First Name</label>
                       <input type="text" class="form-control" id="editFirstName" name="first_name" required>
                   </div>
                   <div class="form-group">
                       <label for="editLastName">Last Name</label>
                       <input type="text" class="form-control" id="editLastName" name="last_name" required>
                   </div>
                   <div class="form-group">
                       <label for="editEmail">Email</label>
                       <input type="email" class="form-control" id="editEmail" name="email" required>
                   </div>
                   <div class="form-group">
                       <label for="editPhoneNumber">Phone Number</label>
                       <input type="text" class="form-control" id="editPhoneNumber" name="phone_number" required>
                   </div>
                   <div class="form-group">
                       <label for="editRole">Role</label>
                       <select class="form-control" id="editRole" name="role" required>
                       @foreach ($roles as $role)
                       <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>   
                       @endforeach
                      
                       </select>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
           </form>
       </div>
   </div>
</div>
<script>
   function editUser(user) {
       $('#editUserId').val(user.id);
       $('#editFirstName').val(user.first_name);
       $('#editLastName').val(user.last_name);
       $('#editEmail').val(user.email);
       $('#editPhoneNumber').val(user.phone_number);
       $('#editRole').val(user.role);

       // Set the form action to the update route with the user's ID
       $('#editUserForm').attr('action', '/admin/users/' + user.id);

       // Show the modal
       $('#editUserModal').modal('show');
   }
</script>

<script>
   function showChangeStatusModal(userId, currentStatus) {
       $('#changeStatusUserId').val(userId);
       $('#status').val(currentStatus);
       $('#changeStatusModal').modal('show');
   }
</script>


                 <!-- JavaScript to show modals with task ID -->
                 <script>
                     function showModal(modalId, taskId) {
                         $('#' + modalId).modal('show');
                         $('#' + modalId).find('input[name="task_id"]').val(taskId);
                     }
                 </script>

                     <!--/  Order Active dataTable End -->	
                     <!--================================-->
                     <!-- Scrollable Table Start -->
                     <!--================================-->


                  
                  <!--/ Heard Card End -->               
            
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
