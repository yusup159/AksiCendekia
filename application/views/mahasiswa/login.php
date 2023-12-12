<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/loginmahasiswa.css')?>">
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
            <div class="col-lg-8 d-flex flex-column justify-content-center align-self-start mt-5 konten-kanan">
                <div class="d-flex flex-column justify-content-center h-100 p-5">
                    <div class="kalimat">
                        <h3 class="fw-bold">Selamat Datang Kembali</h3>
                        <p>Silahkan masukkan email & kata sandi</p>
                    </div>
                    <form method="post" action="<?php echo site_url('AuthMahasiswa/proses_login');?>">

                    <div class="custom-input-group">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/codicon_mail.svg')?>" alt="Email Icon" class="input-icon">
                        <input type="email" name="email" class="form-control custom-input" placeholder="Alamat Email"
                            aria-label="Alamat Email" aria-describedby="basic-addon2">
                    </div>


                    <div class="custom-input-group">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/bx_bxs-lock-alt.svg')?>" alt="Password Icon" class="input-icon">
                        <input type="password" name="password" class="form-control custom-input" placeholder="Password"
                            aria-label="Password" aria-describedby="basic-addon4">
                    </div>
                    
                        <button type="submit" class="btn btn-daftar mb-3">Masuk</button>
                    
                    <p class="text-center"><a href="#" class="text-decoration-none">Lupa Password</a></p>
                    <p class="text-center">
                        <span>Belum punya akun?</span>
                        <a href="<?php echo site_url('AuthMahasiswa/register');?>" class="fw-bold text-primary link-masuk">Daftar</a>

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