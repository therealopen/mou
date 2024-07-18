@extends('layouts.admin.index')

@section('content')
    <div class="page-inner">
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
        <div class="row clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-30">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-header-title tx-13 mb-0">Editing Task</h6>
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

                        <form class="needs-validation" method="POST" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-layout form-layout-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Mou: <span class="tx-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01" name="mou_id">
                                                    <option value="" selected disabled>Choose Mou...</option>
                                                    @foreach ($mous as $mou)
                                                        <option value="{{ $mou->id }}" {{ $mou->id == $task->mou_id ? 'selected' : '' }}>
                                                            {{ $mou->mou_title }}
                                                        </option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Task Title <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="Task_title" value="{{ $task->Task_title }}" placeholder="Enter Title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mg-t--1 mg-md-t-0">
                                        <div class="form-group">
                                            <label class="form-control-label">Task Description: <span class="tx-danger">*</span></label>
                                            <textarea rows="8" class="form-control is-valid" name="Task_description" placeholder="Task Description">{{ $task->Task_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mg-t--1 mg-md-t-0">
                                        <div class="form-group">
                                            <label class="form-control-label">Start Date: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="date" name="task_start_date" value="{{ $task->task_start_date }}" placeholder="Start Date" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">End Date: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="date" name="task_end_date" value="{{ $task->task_end_date }}" placeholder="End Date" required>
                                        </div>
                                        <div class="form-layout-footer">
                                            <button class="btn btn-primary">Update Task</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
