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
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/ajukanpenggalangan.css')?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav p-4">
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="./mainpage.html" class="brand-link">
                <img src="<?php echo base_url('aksicendekia/asset/foto/aksilogo.png')?>" class="ml-2" alt="">
                <span class="brand-text font-weight-light">.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
      

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
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
                                Batal
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
                            <h1 class="mt-2 text-bold"></h1>
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
                    <div class=" row">
                        <!-- /.col-md-6 -->
                        <div class="col-lg">
                            <form action="<?php echo site_url('AuthMahasiswa/inputpengajuan')?>" method="post" enctype="multipart/form-data">
                            <div class="banner-galang">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Nama Kegiatan</label>
                                <input class="form-control" type="text" id="formFile" name="namakegiatan" >
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Deskripsi Kegiatan</label>
                                <input class="form-control" type="text" id="formFile" name="deskripsi" >
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Nama UKM</label>
                                <input class="form-control" type="text" id="formFile" name="ukm" >
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Donasi Dibutuhkan</label>
                                <input class="form-control" type="number" id="formFile" name="donasi" min="0" >
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Tanggal Kegiatan</label>
                                <input class="form-control" type="date" id="formFile" name="tanggal">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Dokumen Penggalangan</label>
                                <input class="form-control" type="file" id="formFile" name="dokumen">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Thumbnail Kegiatan 1</label>
                                <input class="form-control" type="file" id="formFile" name="foto1">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Thumbnail Kegiatan 2</label>
                                <input class="form-control" type="file" id="formFile" name="foto2">
                            </div>
                            <div>
                                <label for="formFile" class="form-label">Thumbnail Kegiatan 3</label>
                                <input class="form-control" type="file" id="formFile" name="foto3">
                            </div>
                            <p>*Agar tampilan terlihat lebih menarik, disarankan menggunakan ukuran 400 * 600 </p>

                                <button class="btn-penggalagan mb-5" onclick="return confirm('Pastikan Mengisi Data Dengan Benar.!')" type="submit">
                                    Lakukan Penggalangan
                                </button>
                            <!-- /.col-md-6 -->
                            </form>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
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

        </div>

        <script src="./js/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="./js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="./js/adminlte.min.js"></script>
</body>

</html>