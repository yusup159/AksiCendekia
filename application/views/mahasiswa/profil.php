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
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/profilmahasiswa.css')?>">
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
            <a href="<?php echo site_url('AuthMahasiswa/dashboard')?>" class="brand-link">
                <img src="<?php echo base_url('aksicendekia/asset/foto/aksilogo.png')?>" class="ml-2" alt="">
                
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
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
                            <h1 class="mt-2 text-bold">Profile Pengguna</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
          
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class=" row">
                        <div class="col-lg">
                            <div class="donasi">
                                <div class="row"></div>
                                <form class="form" novalidate="">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                <img class="profile mb-3" src="<?php echo ($mahasiswa->foto != null) ? base_url('Asset/foto_mahasiswa/' . $mahasiswa->foto) : base_url('aksicendekia/asset/foto/belum_ada_foto.jpg'); ?>" alt="">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <p class="form-control"><?php echo $mahasiswa->username; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <p class="form-control"><?php echo $mahasiswa->email; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Asal Universitas</label>
                                                        <p class="form-control"><?php echo $mahasiswa->asal_kampus; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nomor Induk Mahasiswa</label>
                                                        <p class="form-control"><?php echo $mahasiswa->nim; ?></p>
                                                    </div>
                                                   
                                                    <a class="btn btn-simpan" href="<?php echo site_url('AuthMahasiswa/edit_profil_mahasiswa/'. $mahasiswa->id)?>">Edit Data</a>

                                                 
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