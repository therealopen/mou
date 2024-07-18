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
                                        <th>Partner</th>
                                       <th>Title</th>
                                       <th>Description</th>
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
                            <td>{{ $mou->start_date}}</td>
      
                            <td>{{ $mou->end_date}}</td>
                            

                          
                            
                     
                    
                          
                        
                           
                                       <td>
                                          @if(in_array(Auth::user()->role, ['pmu']))
                                      
                                          <form action="{{ route('mou.delete', $mou->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this partners?');">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                         </form>
                                         <a href="{{ route('contracts.edit', $mou->id) }}" class="btn btn-primary btn-sm">
                                             <i class="fa fa-edit"></i> Edit
                                         </a>
                                         @endif

                                         <a href="{{ route('mous.preview', $mou->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye">view pdf</i> 
                                        </a>

                                        {{-- <a href="{{ route('other.mou', $mou->id) }}" class="btn btn-primary btn-sm">
                                          <i class="fa fa-edit"></i> update
                                      </a> --}}

                                    
                                 

                                
                                    </td>
                                     
                                     
                                      
                                    </tr>
                                    @endforeach
                                    
                                 </tbody>
                                
                              </table>
                              <div class="modal fade" id="varyingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalVarying" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalVarying">Invite Other Part</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <div class="modal-body">
                                             <form method="POST" action="{{ route('process.invitation') }}">
                                                 @csrf
         
                                                 <div class="form-group">
                                                   <label class="form-control-label">Mobile Number +255 <span
                                                           class="tx-danger">*</span></label>
                                                   <input class="form-control" type="text" name="contact_number"
                                                       placeholder="Enter Number eg +255 748544555" required>
                                               </div>
         
                                                 <div class="form-group">
                                                     <input type="hidden" id="id" name="mou_id" required>
                                                   
                                                    
                                                     
                                                 </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <!-- Add onclick event to trigger the form submission -->
                                             <button type="submit" class="btn btn-primary">Generate Token</button>
                                         </div>
                                             </form>
                                     </div>
                                 </div>
                             </div>
                             
         
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

            <!--/ Page Inner End -->
            </section>

@endsection