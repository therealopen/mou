@extends('layouts.admin.index')

@section('content')
  <head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>
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
                           <h1 class="pd-0 mg-0 tx-20 tx-dark">You Login As:<b>{{ Auth::user()->first_name }} </b></h1>
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

                  <div class="col-md-6 col-lg-6 col-xl-3">
                     
                  <a href="{{route('view_users')}}">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Users</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-primary tx-normal">{{$totalUsers}}</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  </a>

                  <div class="col-md-6 col-lg-6 col-xl-3">
                     <a href="{{route('viewconsultants')}}">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Consultant</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-primary tx-normal">{{$totalConsultants}}</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-primary mr-2 d-flex align-items-center"><i class=" ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
               </a>


                  <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-primary tx-normal">41</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-primary mr-2 d-flex align-items-center"><i class=" ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Completed Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-success tx-normal">22</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Progress Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-warning tx-normal">54</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-warning mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>

                   <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Extended Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-info tx-normal">54</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-info mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  


                   <div class="col-md-6 col-lg-6 col-xl-3">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Terminated Contract</h5>
                           <div class="d-flex justify-content-between align-items-center">
                              <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-danger tx-normal">54</h2>
                           </div>
                           <div class="d-flex align-items-center tx-gray-500 tx-11"><span class="tx-danger mr-2 d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>.</span></div>
                        </div>
                     </div>
                  </div>
                  <!--/ Heard Card End -->               
               </div>
               
               <div class="row">
                  <!--================================-->
                  <!-- Expansions Details Start -->	
                  <!--================================-->
            
                  <!--/ Expansions Details End -->
                  <!--================================-->
                  <!-- Search Result Details Start -->	
                  <!--================================-->
                
                  <!--/ Search Result Details End -->
               </div>
               <!--================================-->
               <!-- Sales Details Start -->	
               <!--================================-->
               <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style>
    canvas{
      width: auto;
    }
    .styled-canvas {
            width: 100%;  /* Responsive width */
            height: 400px;  /* Fixed height */
            #background-color: #f3f3f3;  /* Light gray background */
            border: 1px solid #ccc;  /* Dark gray border */
            border-radius: 4px;  /* Rounded corners */
            #box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Subtle shadow */
        }
</style>
               <div class="row clearfix">
                  <div class="col-lg-6">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <div class="row">
                              
                              <div class="col-md-7 col-lg-8 col-xl-12">
                                 <div class="pd-0">
                                    
                                 <!-- Bar Chart -->
                                 <canvas id="barChart" class="styled-canvas"></canvas>
                              </div>
                           
                              </div>
                           </div>
                           <!-- row -->
                        </div>
                     </div>
                     <!-- card -->
                  </div>
                  
                  <div class="col-lg-6">
                     <div class="card mg-b-30">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-5 col-lg-4 col-xl-12 order-1 order-sm-0 mg-t-20 mg-sm-t-0">
                              <canvas id="bar2Chart" class="styled-canvas"></canvas>

                              </div>
                             
                           </div>
                           <!-- row -->
                        </div>
                     </div>
                     <!-- card -->
                  </div>
               </div>
               <!-- start visualization -->
               <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/dashboard/data')
                .then(response => response.json())
                .then(data => {
                    // Bar Chart
                    const ctxBar = document.getElementById('barChart').getContext('2d');
                    const barChart = new Chart(ctxBar, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data.usersPerMonth),
                            datasets: [{
                                label: 'Users per Month',
                                data: Object.values(data.usersPerMonth),
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    const ctxBar2 = document.getElementById('bar2Chart').getContext('2d');
                    const bar2Chart = new Chart(ctxBar2, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data.usersPerMonth),
                            datasets: [{
                                label: 'Users per Month',
                                data: Object.values(data.usersPerMonth),
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Pie Chart
                    const ctxPie = document.getElementById('pieChart').getContext('2d');
                    const pieChart = new Chart(ctxPie, {
                        type: 'pie',
                        data: {
                            labels: Object.keys(data.usersByGender),
                            datasets: [{
                                label: 'Users by Gender',
                                data: Object.values(data.usersByGender),
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)'
                                ],
                                borderWidth: 1
                            }]
                        }
                    });

                    // Line Chart
                    const ctxLine = document.getElementById('lineChart').getContext('2d');
                    const lineChart = new Chart(ctxLine, {
                        type: 'line',
                        data: {
                            labels: Object.keys(data.usersPerMonth),
                            datasets: [{
                                label: 'Users per Month',
                                data: Object.values(data.usersPerMonth),
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                fill: false
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Histogram (styled as Bar Chart)
                    const ctxHistogram = document.getElementById('histogramChart').getContext('2d');
                    const histogramChart = new Chart(ctxHistogram, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data.usersPerMonth),
                            datasets: [{
                                label: 'Users per Month',
                                data: Object.values(data.usersPerMonth),
                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Doughnut Chart
                    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
                    const doughnutChart = new Chart(ctxDoughnut, {
                        type: 'doughnut',
                        data: {
                            labels: Object.keys(data.usersByGender),
                            datasets: [{
                                label: 'Users by Gender',
                                data: Object.values(data.usersByGender),
                                backgroundColor: [
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderWidth: 1
                            }]
                        }
                    });
                });
        });
    </script>

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
