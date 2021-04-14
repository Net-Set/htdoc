<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['Email']))
{
    header("Location: Admin.php");
}
else
{
    $uname=$_SESSION['Email'];
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Samaj Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="header.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/Samaj.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Padmashali Samaj</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transaction
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="basic form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Registration </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project details.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Marriage Registration.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Supervision </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="course details.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course details </p>
                </a>
              </li>
                  
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master Transaction
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Member_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="marriage_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marriage Member Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="credit_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Society Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="loanapply_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Updation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="approve_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Approvel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="installment_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan Installment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fees_type_View.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fees Type Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="donationmember_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Donation Member  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="distribute_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Donation Distribute</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="donationitem_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Donation Item Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="event_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Event Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fund_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="committee_view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Committee Member </p>
                </a>
              </li>
            </ul>
          </li>  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-receipt"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="basic form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member Registration </p>
                </a>
              </li> 
            </ul>
          </li>        
            </ul>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
