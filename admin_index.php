<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FilipinoTutor Admin Page</title>
    
    <!-- Bootstrap -->
    <link href="new_vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="new_vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="new_vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="new_vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="new_vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="new_vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="new_build/css/custom.css" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="new_vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

     <!-- Datatables -->
    <link href="new_vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="new_vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="new_vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="new_vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="new_vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="new_vendors/angular-bootstrap-datetimepicker/src/css/datetimepicker.css" rel="stylesheet">

  </head>

  <body class="nav-md" ng-app="filTutorApp">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="images/ftlogo.png" /></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile">
            <div ui-view="profile_details"></div>
          </div>
          <!-- /menu profile quick info -->

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
            <p>&nbsp;</p>
            <h3>General</h3>
            <ul class="nav side-menu">
              <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a ui-sref="dashboard">Dashboard</a></li>
              </ul>
              </li>
               <li><a><i class="fa fa-envelope"></i> Mailbox <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a ui-sref="mailbox">Compose</a></li>
                <li><a ui-sref="mailbox.inbox">Inbox</a></li>
              </ul>
              </li>
              <li><a><i class="fa fa-cart-plus"></i> Credits <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="credits-new.php">Add New Credit</a></li>
                <li><a ui-sref="credits">Credit List</a></li>
              </ul>
              </li>
               <li><a><i class="fa fa-book"></i> Lessons & Materials <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="materials-new.php">Add New Material</a></li>
                <li><a href="materials-all.php">All Materials</a></li>
                <li><a href="materials-categories.php">Categories</a></li>
              </ul>
              </li>
               <li><a><i class="fa fa-sticky-note"></i> Guide & Resources<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="resources-new.php">Add New Resource</a></li>
                <li><a href="resources-students.php">For Students</a></li>
                <li><a href="resources-tutors.php">For Tutors</a></li>
                <li><a href="resources-admin.php">For Supervisors & Admin</a></li>
              </ul>
              </li>
            </div>
            <div class="menu_section">
            <h3>Reports & Requests</h3>
            <ul class="nav side-menu">
              <li><a href="class-tracker.php"><i class="fa fa-dashboard"></i> Class Tracker</a></li>
              <li><a href="class-reports.php"><i class="fa fa-graduation-cap"></i> Class Reports <span class="badge bg-orange">3</span></a></li>
              <li><a href="students-bookings.php"><i class="fa fa-users"></i> New Bookings <span class="badge bg-orange">12</span></a></li>
              <li><a href="tutors-schedules.php"><i class="fa fa-calendar"></i> Schedule Requests <span class="badge bg-orange">5</span></a></li>
              <li><a href="credits-purchases.php"><i class="fa fa-cc-paypal"></i> Credit Purchases</a></li>
            </ul>
            </div>
            <div class="menu_section">
            <h3>Accounts</h3>
            <ul class="nav side-menu">
              <li><a><i class="fa fa-users"></i> Students <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a ui-sref="students">All Students</a></li>
                <!-- <li><a href="students-bookings.php">Class Bookings</a></li> -->
              </ul>
              </li>
              <li><a><i class="fa fa-graduation-cap"></i> Tutors <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="tutors-new.php">Add New Tutor</a></li>
                <li><a href="#" ui-sref='tutors'>All Tutors</a></li>
                <li><a href="tutors-pending.php">Pending Tutors</a></li>
                <!-- <li><a href="tutors-schedules.php">Schedule Requests</a></li> -->
                <!-- <li><a href="tutors-reports.php">Reports</a></li> -->
                <li><a href="tutors-conversions.php">Conversions</a></li>
              </ul>
              </li>
               <li><a><i class="fa fa-user-secret"></i> Supervisors <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="supervisors-new.php">Add New Supervisor</a></li>
                <li><a href="#" ui-sref="supervisors">All Supervisors</a></li>
                
              </ul>
              </li>
               <li><a><i class="fa fa-user"></i> Applicants <span class="fa fa-chevron-down"></span></a>
               <ul class="nav child_menu">
                <li><a ui-sref="applicants">All Applicants</a></li>
              </ul>
              </li>
               <li>
                 <a ui-sref="admins">
                  <i class="fa fa-user-secret"></i> Admin
                 </a>
              </li>
            </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
  <!-- /menu footer buttons -->
  </div>
  <!-- /left_col scroll-view -->
        </div>

        <!-- top navigation -->

          <div class="top_nav">
            <div class="nav_menu">
              <nav>
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
             
                <div ui-view="top-nav"></div>
             
              </nav>
            </div>
          </div>
       
        <!-- top navigation -->

        <!-- page content -->
          
        <div class="right_col" role="main">
          <div class="">
            <div ui-view="main_content"></div>
          </div>
        </div>
        <!--  -->
       
        <?php
          include('new_sections/footer.php');
        ?>

      </div>
    </div>

    <!-- jQuery -->
    <script src="new_vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="new_vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="new_vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="new_vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="new_vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="new_vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="new_vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="new_vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="new_vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="new_vendors/Flot/jquery.flot.js"></script>
    <script src="new_vendors/Flot/jquery.flot.pie.js"></script>
    <script src="new_vendors/Flot/jquery.flot.time.js"></script>
    <script src="new_vendors/Flot/jquery.flot.stack.js"></script>
    <script src="new_vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="new_vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="new_vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="new_vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="new_vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="new_vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="new_vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="new_vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    
    <!-- bootstrap-daterangepicker -->
    <script src="new_vendors/moment/moment.min.js"></script>
    <script src="new_vendors/datepicker/daterangepicker.js"></script>

     <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    
    <!-- Custom Theme Scripts -->
    <script src="new_build/js/custom.min.js"></script>
    
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <script>
      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };
      var target = document.getElementById('foo'),
          gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
    </script>
    <!-- /gauge.js -->

    <script src="new_vendors/angular/angular.min.js"></script>
    <script src="new_vendors/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="new_vendors/oclazyload/dist/ocLazyLoad.min.js"></script>
    <script src="new_vendors/Smart-Table/dist/smart-table.min.js"></script>
    <script src="new_vendors/angular-bootstrap-datetimepicker/src/js/datetimepicker.js"></script>
    <script src="new_vendors/angular-bootstrap-datetimepicker/src/js/datetimepicker.templates.js"></script>
    <script src="new_vendors/ng-file-upload/dist/ng-file-upload-shim.min.js"></script>
    <script src="new_vendors/ng-file-upload/dist/ng-file-upload.min.js"></script>
    <script src="new_vendors/bindonce/bindonce.min.js"></script>
    <script src="new_vendors/angular-cache/dist/angular-cache.min.js"></script>
    <script src="new_js/app-routes.js"></script>

  </body>
  </html>