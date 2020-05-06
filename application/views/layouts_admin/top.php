<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Dentist</title>


  <!-- Custom fonts for this template-->
  <link rel="icon" type="image/png" href="<?php echo base_url().'assets/login1/images/icons/gigi.png'?>"/>
  <link href="<?php echo base_url().'assets/backend/vendor/fontawesome-free/css/all.min.css'?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url().'assets/backend/css/sb-admin-2.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/backend/vendor/datatables/dataTables.bootstrap4.min.css'?>" rel="stylesheet">
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> -->


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url()?>">
        <div class="sidebar-brand-icon">
           <img src="<?php echo base_url().'assets/login1/images/icons/gigi.png'?>" class="img-circle"  height="42" width="42">
        </div>
        <div class="sidebar-brand-text mx-3">E - DENTIST</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin'?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Home Admin</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'admin/show_diagnosa'?>">
         <i class="fas fa-diagnoses"></i>
          <span>Diagnosa</span></a>
           <hr class="sidebar-divider">
        <a class="nav-link" href="<?php echo base_url().'admin/show_dosen'?>">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Data Dosen</span></a>
           <hr class="sidebar-divider">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
         <i class="fas fa-user-graduate"></i>
          <span>Data Mahasiswa</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu :</h6>
            <a class="collapse-item" href="<?php echo base_url().'admin/show_mahasiswa'?>">Mahasiswa D3</a>
            <a class="collapse-item" href="<?php echo base_url().'admin/show_mahasiswa_d4'?>">Mahasiswa D4</a>
          </div>
        </div>
      </li>


     <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Log Out</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('ses_nama');?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/profile/dosen/'.$this->session->userdata('ses_gambar')); ?>">
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('admin/show_profile'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        

      