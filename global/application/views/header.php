<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. Global Integrasi Data</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-select/css/select.bootstrap4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Sweet Alert -->
  <!-- Sweet Alert -->
  <!-- <script src="<?php //echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script> -->
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url() ?>assets/index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/logo-mini-gid.png" alt="GID Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Global Integrasi Data</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?php echo base_url() ?>admin/profile" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php if($this->session->userdata('level_user') == '4' || $this->session->userdata('level_user') == '5' || $this->session->userdata('level_user') == '6'){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/project" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>
                  Project
                </p>
              </a>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('level_user') != '3' || $this->session->userdata('level_user') != '5' ){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/claim" class="nav-link">
                <i class="nav-icon fa fa-plane"></i>
                <p>
                  Claim Kunjungan Kerja
                </p>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?php echo base_url()?>admin/form_cuti" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  Formulir Cuti
                </p>
              </a>
            </li>
            <?php if($this->session->userdata('level_user') == '2'){ ?>
            <li class="nav-header">Data Karyawan</li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/data_karyawan" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Data Karyawan
                </p>
              </a>
            <?php } ?>
            </li>
            <?php if($this->session->userdata('level_user') == '2' || $this->session->userdata('level_user') == '3'){ ?>
            <li class="nav-header">Laporan</li>
            <?php } ?>
            <?php if($this->session->userdata('level_user') == '2'){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/laporan_cuti" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Cuti
                </p>
              </a>
            </li>
            <?php };
            if($this->session->userdata('level_user') == '3'){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/laporan_reimburstment" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                Reimburstment
                </p>
              </a>
            </li>
            <?php }?>
            <li class="nav-header">Ganti Akun</li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>welcome/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>