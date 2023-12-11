<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/signupmahasiswa.css')?>">
    <title>AksiCendekia</title>
    <style>
.sisi-kanan {
    background: url('<?php echo base_url('aksicendekia/asset/foto/sidelog.png');?>') no-repeat center center;
    background-size: cover;
}

    </style>
</head>

<body>

    <div class="container-fluid konten-kiri">
        <div class="row">
            <div class="col-lg-4 sisi-kanan">
                <div class="position-relative text-kiri">
                </div>
            </div>
            <div class="col-lg-8 d-flex flex-column justify-content-center align-self-start konten-kanan">
                <div class="d-flex flex-column justify-content-center h-100 p-5">
                    <div class="kalimat">
                        <h3 class="fw-bold">Selamat Datang</h3>
                        <p>Silahkan masukkan asal universitas, NIM, username, email & kata sandi</p>
                    </div>
                    <form method="post" action="<?php echo site_url('authmahasiswa/proses_register');?>">
                    <div class="custom-input-group">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/kampus.svg')?>" alt="Email Icon" class="input-icon">
                        <input type="text" name="asal_kampus" class="form-control custom-input" placeholder="Asal Kampus">
                    </div>
                    <div class="custom-input-group">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/nim.svg')?>" alt="Email Icon" class="input-icon">
                        <input type="text" name="nim" class="form-control custom-input" placeholder="Nomor Induk Mahasiswa">
                    </div>
                    <div class="custom-input-group">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/codicon_mail-1.svg')?>" alt="Email Icon" class="input-icon">
                        <input type="text" name="username" class="form-control custom-input" placeholder="Username">
                    </div>

                    <div class="custom-input-group">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/codicon_mail.svg')?>" alt="Email Icon" class="input-icon">
                        <input type="email" name="email" class="form-control custom-input" placeholder="Alamat Email">
                    </div>


                    <div class="custom-input-group">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/bx_bxs-lock-alt.svg')?>" alt="Password Icon" class="input-icon">
                        <input type="password" name="password" class="form-control custom-input" placeholder="Password">
                    </div>
                    <div class="d-grid gap-2">
                    <button class="btn btn-daftar mb-3" type="submit">Daftar</button>
                    </div>
                  
                    <p class="text-center">
                        <span>Suda punya akun?</span>
                        <a href="<?php echo site_url('authmahasiswa/index');?>" class="fw-bold text-primary link-masuk">Masuk</a>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan link Bootstrap JS -->
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tambahkan link Bootstrap Icons (BI) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
</body>

</html>