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
                            <h6 class="card-header-title tx-13 mb-0">Edit Partner</h6>
                        </div>
                        <div class="text-right">
                            <div class="d-flex">
                                <a href="" class="mr-3"><i class="ti-reload"></i></a>
                                <div class="dropdown" data-toggle="dropdown">
                                    <a href=""><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
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

                    <form class="needs-validation" method="POST" action="{{ route('partners.update', $partner->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $partner->company_name }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="company_address">Company Address</label>
                                <input type="text" class="form-control" name="company_address" id="company_address" value="{{ $partner->company_address }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="company_contact_number">Company Contact Number</label>
                                <input type="text" class="form-control" name="company_contact_number" id="company_contact_number" value="{{ $partner->company_contact_number }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="company_email">Company Email</label>
                                <input type="email" class="form-control" name="company_email" id="company_email" value="{{ $partner->company_email }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="representation_name">Representation Name</label>
                                <input type="text" class="form-control" name="representation_name" id="representation_name" value="{{ $partner->representation_name }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="representative_title">Representative Title</label>
                                <input type="text" class="form-control" name="representative_title" id="representative_title" value="{{ $partner->representative_title }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="representative_email">Representative Email</label>
                                <input type="email" class="form-control" name="representative_email" id="representative_email" value="{{ $partner->representative_email }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="representative_number">Representative Number</label>
                                <input type="text" class="form-control" name="representative_number" id="representative_number" value="{{ $partner->representative_number }}">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Partner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
