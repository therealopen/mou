@extends('layouts.admin.index')

@section('content')
    <!-- Page Inner Start -->
    <div class="page-inner">
        <!-- Breadcrumb Start -->
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pd-t-5 pd-b-5">
                        <h1 class="pd-0 mg-0 tx-20 tx-dark">logged in As:<b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}  ({{ Auth::user()->role }})</b></h1>
                    </div>
                    <div class="breadcrumb pd-0 mg-0">
                        <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i> Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button id="dashboardDate" class="btn btn-default dropdown-toggle mr-2 d-none d-md-block pd-y-8-force"></button>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="row clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-30">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-header-title tx-13 mb-0">Consultant Forms</h6>
                            </div>
                            <div class="text-right">
                                <div class="d-flex">
                                    <a href="" class="mr-3"><i class="ti-reload"></i></a>
                                    <div class="dropdown" data-toggle="dropdown">
                                        <a href=""><i class="ti-more-alt"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 mr-2"></i>View Consultant Details</a>
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

                        <form class="needs-validation" method="POST" action="{{ route('consultants.update', $consultant->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip01">First name</label>
                                    <input type="text" class="form-control" name="first_name" id="validationTooltip01" placeholder="First name" value="{{ $consultant->first_name }}" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip02">Last name</label>
                                    <input type="text" name="last_name" class="form-control" id="validationTooltip02" placeholder="Last name" value="{{ $consultant->last_name }}" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip03">Email</label>
                                    <input type="text" name="email" class="form-control" id="validationTooltip03" placeholder="Email" value="{{ $consultant->email }}" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip04">Mobile Number</label>
                                    <input type="number" name="phone_number" class="form-control" id="validationTooltip04" placeholder="Mobile Number" value="{{ $consultant->phone_number }}" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip05">Address</label>
                                    <input type="text" name="address" class="form-control" id="validationTooltip05" placeholder="Address" value="{{ $consultant->address }}" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip06">Licence</label>
                                    <input type="text" name="licence" class="form-control" id="validationTooltip06" placeholder="Licence Number" value="{{ $consultant->licence }}" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Consultant</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
