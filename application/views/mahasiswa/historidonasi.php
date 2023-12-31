<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/adminlte.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('aksicendekia/fontawesome-free/css/all.min.css')?>">
  <!-- My Style -->
  <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/historidonasi.css')?>">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav p-4">
            </ul>
        </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo site_url('AuthMahasiswa/dashboard')?>" class="brand-link">
        <img src="<?php echo base_url('aksicendekia/asset/foto/aksilogo.png')?>" class="ml-2" alt="">
      </a>

      <div class="sidebar">



        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open active">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="<?php echo site_url('AuthMahasiswa/histori_penggalangan')?>" class="nav-link">
                      <img src="<?php echo base_url('aksicendekia/asset/icon/docs.svg')?>" alt="">
                      <p>Histori Penggalangan</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo site_url('AuthMahasiswa/histori_donasi')?>" class="nav-link">
                      <img src="<?php echo base_url('aksicendekia/asset/icon/docs.svg')?>" alt="">
                      <p>Histori Donasi</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo site_url('AuthMahasiswa/profil_mahasiswa')?>" class="nav-link">
                      <img src="<?php echo base_url('aksicendekia/asset/icon/orang.svg')?>" alt="">
                      <p>Profil Pengguna</p>
                  </a>
              </li>
          </ul>
            </li>
            <!-- <li class="nav-item"> -->
            <a href="<?php echo site_url('AuthMahasiswa/penggalangan')?>" class="nav-link">
                <button class="btn-galang">
                    Galang Dana
                </button>
            </a>
            <a href="<?php echo site_url('AuthMahasiswa/logout')?>" class="nav-link">
                <button class="btn-galang">
                    Logout
                </button>
            </a>
            <!-- </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="mt-2 text-bold">Histori Donasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <!-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <?php if (!empty($result)): ?>
              <?php foreach ($result as $row): ?>
                  <div class="row">
                      <div class="col-lg">
                          <div class="donasi">
                              <p class="judul">Nama Kegiatan</p>
                              <p class="point"><?php echo $row->judul; ?></p>
                              <p class="judul">Jumlah Donasi</p>
                              <p class="point"><?php echo $row->jumlah_donasi; ?></p>
                              <p class="judul">Tanggal Donasi</p>
                              <p class="point"><?php echo $row->tanggal; ?></p>
                              <p class="judul">Status Pembayaran</p>
                              <p class="point">
                                  <?php if ($row->status == 200): ?>
                                      <span class="badge rounded-pill bg-primary">Berhasil</span>
                                  <?php elseif ($row->status == 201): ?>
                                      <span class="badge rounded-pill bg-warning">Pending</span>
                                  <?php else: ?>
                                      <span class="badge rounded-pill bg-danger">Expired</span>
                                  <?php endif; ?>
                              </p>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          <?php else: ?>
              <p style="text-align: center;">Tidak ada histori donasi.</p>
          <?php endif; ?>
  </div>
  <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <!-- <footer class="main-footer"> -->
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
        Anything you want
      </div> -->
    <!-- Default to the left -->
    <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer> -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="./js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./js/adminlte.min.js"></script>
</body>

</html>