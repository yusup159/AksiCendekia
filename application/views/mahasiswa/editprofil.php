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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iKu1r+r8hHxT8ZNTEGN1l8IwQ/YYN/eIQfVAEmD2j/Ht8v5qDkLXssjfs" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
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
                        <a href="<?php echo site_url('AuthMahasiswa/profil_mahasiswa')?>" class="nav-link">
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="mt-2 text-bold">Profile Pengguna</h1>
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
                            <div class="donasi">
                                <div class="row"></div>
                                <form class="form" novalidate="" action="<?php echo site_url('AuthMahasiswa/editprofil_mahasiswa') ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                <img class="profile mb-3" src="<?php echo ($mahasiswa->foto != null) ? base_url('Asset/foto_mahasiswa/' . $mahasiswa->foto) : base_url('aksicendekia/asset/foto/belum_ada_foto.jpg'); ?>" alt="">
                                                    <input type="file" class="sellect-photo mb-4" name="" id="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input class="form-control" type="text" name="username" placeholder="<?php echo $mahasiswa->username?>" value="<?php echo set_value('username', $mahasiswa->username)?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="text" name="email" placeholder="<?php echo $mahasiswa->email?>" value="<?php echo set_value('email', $mahasiswa->email)?>">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Asal Universitas</label>
                                                        <input class="form-control" type="text" name="asal_kampus" placeholder="<?php echo $mahasiswa->asal_kampus?>" value="<?php echo set_value('asal_kampus', $mahasiswa->asal_kampus)?>">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nomor Induk Mahasiswa</label>
                                                        <input class="form-control" type="text" name="nim" placeholder="<?php echo $mahasiswa->nim?>" value="<?php echo set_value('asal_kampus', $mahasiswa->nim)?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Password Saat Ini</label>
                                                        <input class="form-control" type="password" name="asal_kampus" placeholder="<?php echo $mahasiswa->asal_kampus?>" value="<?php echo set_value('asal_kampus', $mahasiswa->asal_kampus)?>">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex mb-3">
                                                <button class="btn btn-simpan" type="submit">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
  

        <!-- Content Wrapper. Contains page content -->
   
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

    <script>
    function togglePassword(inputId, toggleId) {
        const passwordInput = document.getElementById(inputId);
        const togglePassword = document.getElementById(toggleId);

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle ikon mata terbuka/tutup
            togglePassword.classList.toggle('fa-eye-slash');
        });
    }

    // Panggil fungsi togglePassword untuk setiap form input
    togglePassword('password_saat_ini1', 'toggle-password1');
    togglePassword('password_saat_ini2', 'toggle-password2');
    togglePassword('password_saat_ini3', 'toggle-password3');
    </script>

</body>

</html>