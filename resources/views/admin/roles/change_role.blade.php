



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
                                {{ Auth::user()->last_name }}</b></h1>
                    </div>
                    <div class="breadcrumb pd-0 mg-0">
                        <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i> Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>

                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button id="dashboardDate"
                        class="btn btn-default dropdown-toggle mr-2 d-none d-md-block pd-y-8-force"></button>
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

            <!--/ Validation Custom Forms End -->
            <!--================================-->
            <!-- Validation Tooltips Forms Start -->
            <!--================================-->
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-30">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-header-title tx-13 mb-0">Change User Role</h6>
                            </div>
                            <div class="text-right">
                                <div class="d-flex">
                                    <a href="" class="mr-3"><i class="ti-reload"></i></a>
                                    <div class="dropdown" data-toggle="dropdown">
                                        <a href=""><i class="ti-more-alt"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="" class="dropdown-item"><i data-feather="info"
                                                    class="wd-16 mr-2"></i>View Consultant Details</a>
                                            {{-- <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 mr-2"></i>Share</a>
											  <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 mr-2"></i>Download</a>
											  <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 mr-2"></i>Copy to</a>
											  <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 mr-2"></i>Move to</a>
											  <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 mr-2"></i>Rename</a>
											  <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 mr-2"></i>Delete</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

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


             

                        <form action="{{ route('admin.update_user_roles') }}" method="POST">
                            @csrf
                           
                                <div class="form-layout form-layout-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">select Email: <span
                                                        class="tx-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"
                                                            for="inputGroupSelect01">Options</label>
                                                    </div>
                                                    <select class="form-control" id="change_user_id" name="user_id" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                    

                                           
                                        </div>
                                        <!-- col-4 -->
                                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                                            <div class="form-group">
                                                <label class="form-control-label">Role Type: <span
                                                        class="tx-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"
                                                            for="inputGroupSelect01">Options</label>
                                                    </div>
                                                    <select class="form-control" id="change_role_id" name="role_id" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->role }}">{{ $user->role}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>             
                                     
                                     
                                          

                                        </div>
                                        <!-- col-4 -->
                                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                                            
                                        
                                       

                                            <div class="form-layout-footer">
                                                .........
                                                <br>
                                              
                                                <button type="submit" class="btn btn-primary">Change Role</button>
                                            </div>
                                        </form>
                                        </div>
                                        <!-- col-4 -->
                                    </div>
                                    <!-- row -->

                                    <!-- form-group -->
                                </div>
                                <!-- form-layout -->

                          
                    </div>
                </div>




               
            </div>
            <!--/ Validation Tooltips Forms End -->



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

