<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>UCAMS</title>
      <!-- Datepicket CSS -->
      <link type="text/css" rel="stylesheet" href="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.css')}}"/>
      <!-- Chart CSS -->      
      <link type="text/css" rel="stylesheet" href="{{asset('admin-assets/plugins/chartist/chartist.css')}}">
      <!-- Map CSS --> 
      <link type="text/css" rel="stylesheet" href="{{asset('admin-assets/plugins/jqvmap/jquery-jvectormap-2.0.2.css')}}">
      <!-- Main CSS -->	  
      <link type="text/css" rel="stylesheet" href="{{asset('admin-assets/css/style.css')}}"/>
      <!-- dataTables CSS -->
      <link type="text/css" rel="stylesheet" href="{{asset('admin-assets/plugins/dataTable/datatables.min.css')}}">
      <link type="text/css" rel="stylesheet" href="{{asset('admin-assets/plugins/dataTable/extensions/dataTables.jqueryui.min.css')}}">
      <!-- Favicon -->	
      <link rel="icon" href="{{asset('admin-assets/images/favicon.ico" type="image/x-icon')}}">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
         <!--================================-->
         <!-- Page Sidebar Start -->
         <!--================================-->
         @include('layouts.admin.sidebar')
         <!--/ Page Sidebar End -->
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            @include('layouts.admin.header')

            <!--/ Page Header End -->  
            

            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
            @yield('content')

            <!--/ Page Inner End -->
            <!--================================-->
            <!-- Page Footer Start -->	
            <!--================================-->
            @include('layouts.admin.footer')
            <!--/ Page Footer End -->	


         </div>
         <!--/ Page Content End -->
      </div>
      <!--/ Page Container End -->
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->	
      <a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      <!--/ Scroll To Top End -->
      <!--================================-->
      <!-- Template Customizer Start-->
      <!--================================-->		  
      
      <!--/ Template Customizer End -->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/jquery-ui/jquery-ui.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/moment/moment.min.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/popper/popper.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/feather/feather.min.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/typeahead/typeahead.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/typeahead/typeahead-active.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/pace/pace.min.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/highlight/highlight.min.js')}}"></script>
      <!-- Dashboard Script -->
      <script src="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/jqvmap/jquery-jvectormap-2.0.2.min.js')}}"></script>	
      <script src="{{asset('admin-assets/plugins/jqvmap/gdp-data.js')}}"></script>	
      <script src="{{asset('admin-assets/plugins/jqvmap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>	
      <script src="{{asset('admin-assets/plugins/chartist/chartist.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/apex-chart/apexcharts.min.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/apex-chart/irregular-data-series.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/flot/jquery.flot.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/flot/jquery.flot.pie.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/flot/jquery.flot.resize.js')}}"></script>
      <script src="{{asset('admin-assets/plugins/flot/sampledata.js')}}"></script>  
      <script src="{{asset('admin-assets/js/dashboard/sales-dashboard-init.js')}}"></script>
      <!-- Required Script -->
      <script src="{{asset('admin-assets/js/app.js')}}"></script>
      <script src="{{asset('admin-assets/js/avesta.js')}}"></script>
      <script src="{{asset('admin-assets/js/avesta-customizer.js')}}"></script>

      
      <!-- Javascript -->
      <script>
         //World Map
         "use strict";
         $(document).ready(function () {
         	// World Map
         	$('#world-map').vectorMap({
         		map: 'world_mill_en',
         		backgroundColor: 'transparent',
         		markerStyle: {
         			initial: {
         				fill: '#2e2e2e',
         				stroke: '#2e2e2e',
         				"fill-opacity": 1,
         				"stroke-width": 15,
         				"stroke-opacity": 0.2
         			}
         		},
         		markers: [{
         				latLng: [37.18, -93.35],
         				name: 'United States'
         			},
         			{
         				latLng: [20.59, 78.96],
         				name: 'India'
         			},
         			{
         				latLng: [-25.27, 133.77],
         				name: 'Australia'
         			},
         			{
         				latLng: [-38.41, -63.61],
         				name: 'Argentina'
         			},
         			{
         				latLng: [61.52, 105.31],
         				name: 'Russia'
         			},
         			{
         				latLng: [-30.55, 22.93],
         				name: 'South Africa'
         			},
         		],
         		focusOn: {
         			x: 0,
         			y: 0,
         			scale: 1
         		},
         		series: {
         			regions: [{
         				values: {
         					US: 'rgba(148, 77, 255, 0.3)',
         					AU: 'rgba(255, 228, 17, 0.3)',
         					IN: 'rgba(8, 210, 111, 0.3)',
         					AR: 'rgba(252, 79, 104, 0.3)',
         					RU: 'rgba(129, 206, 246, 0.3)',
         					ZA: 'rgba(252, 79, 104, 0.3)',
         				}
         			}]
         		},
         		regionStyle: {
         			initial: {
         				fill: '#e9eff9'
         			}
         		}
         	});
         
         });
         
         // Dashboard DateTimePicker
         $(function() {
         var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
         
         // Button         
         var start = moment().subtract(29, 'days');
         var end = moment();
         
         function cb(start, end) {
         $('#dashboardDate').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         }         
         $('#dashboardDate').daterangepicker({
         startDate: start,
         endDate: end,
         ranges: {
         'Today': [moment(), moment()],
         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
         'This Month': [moment().startOf('month'), moment().endOf('month')],
         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         },
         opens: (isRtl ? 'left' : 'right')
         }, cb);         
         cb(start, end);         
         
         // Replace icons         
         $('#dashboardDate').each(function() {
         var obj = $(this).data('daterangepicker');
         var _updateCalendars = obj.updateCalendars;         
         obj.updateCalendars = function() {
         // Call original function
         _updateCalendars.call(obj)         
         // Replace icons
         obj.container.find('.prev > i').each(function() { this.className = 'ion ion-ios-arrow-back' });
         obj.container.find('.next > i').each(function() { this.className = 'ion ion-ios-arrow-forward' });
         obj.container.find('.daterangepicker_input > i').each(function() { this.className = 'ion ion-md-calendar' });
         obj.container.find('.calendar-time > i').each(function() { this.className = 'ion ion-md-time' });
         };
         });
         });
      </script>
      <!-- / Javascript -->

      <!-- dataTables Script -->
       <script src="{{asset('admin-assets/plugins/dataTable/datatables.min.js')}}"></script> 
      <script src="{{asset('admin-assets/plugins/dataTable/responsive/dataTables.responsive.js')}}"></script>
     
    
      <script>
         // Basic DataTable	
          $('#basicDataTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // No Style DataTable	
          $('#noStyleedTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Cell Border DataTable	
          $('#cellBorder').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Compact DataTable	
          $('#compactTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
        
           
         // Hoverable DataTable	
          $('#orderActiveTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	},
         	"order": [[ 1, "desc" ]]
           });
         
    
      </script>
   </body>
</html>