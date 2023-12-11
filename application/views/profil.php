<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil AksiCendekia</title>

    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/profil.css')?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('aksicendekia/asset/foto/logoAksiCendekia.svg')?>" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                    <!-- Tambahkan class text-center di sini -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo site_url('Dashboard');?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Dashboard/profil');?>">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Dashboard/portal_berita');?>">Portal Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Dashboard/FAQ');?>">FAQ</a>
                    </li>

                </ul>
                <a href="<?php echo site_url('Dashboard/option');?>">
                    <button class="btn btn-light btn-masuk">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/user.svg')?>" alt="Password Icon" class="input-icon">
                        Masuk ke Akun</button></a>
            </div>
        </div>
    </nav>
    <!-- End Navigasi -->


    <!-- Hero -->
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 hero-kiri">
                    <div class="stempel">
                        <p>#berkarya&berdaya</p>
                    </div>
                    <h1>
                        Sendiri Kita Setetes<span> Bersama Kita Lautan</span>
                    </h1>
                    <p>Plarform penggalangan dana untuk berbagai kreativitas mahasiswa dalam rangka untuk berkontribusi
                        untuk bangsa.</p>
                    <a href="#">
                        <button class="btn-ppdb">
                            <img src="<?php echo base_url('aksicendekia/asset/icon/arrow.svg')?>" alt="">Kenali Kami
                        </button>
                    </a>
                </div>
                <div class="col-lg-5 hero-kanan mt-6">
                    <img src="<?php echo base_url('aksicendekia/asset/foto/herokananprofile.png')?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Content  -->
    <div class="container content">
        <div class="header text-center">
            <h1>Menjadi Wadah Mahasiswa Dalam Membangun Semangat Gotong Royong</h1>
        </div>
        <div class="content-1">
            <div class="row">
                <div class="col-lg-6 content-kiri">
                    <img src="<?php echo base_url('aksicendekia/asset/foto/content1.png')?>" alt="">
                </div>
                <div class="col-lg-6 content-kanan mt-5">
                    <h1>
                        Wadah mahasiswa dalam membangun semangat gotong royong
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus sequi eum earum delectus,
                        atque maiores iure voluptatem quaerat adipisci tempore illum, repudiandae iste? Magnam possimus
                        voluptatum ducimus vitae aut esse!</p>
                </div>
            </div>
        </div>
        <div class="content-2">
            <div class="row flex-container">
                <div class="col-lg-6 content-kiri">
                    <h1>
                        Menjadi wadah mahasiswa untuk selalu bertumbuh
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus sequi eum earum delectus,
                        atque maiores iure voluptatem quaerat adipisci tempore illum, repudiandae iste? Magnam possimus
                        voluptatum ducimus vitae aut esse!</p>
                </div>
                <div class="col-lg-6 content-kanan mt-5 order-xs-first">
                    <img src="<?php echo base_url('aksicendekia/asset/foto/content2.png')?>" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Content  -->

    <!-- Pilar Utama -->
    <div class="pilar-utama">
        <div class="container">
            <div class="header text-center">
                <h3>Berkarya & Berdaya</h3>
                <h1>3 Pilar utama dalam Gerakan
                    <span>AksiCendekia</span></h1>
                <p>Fondasi penting dalam rangka membangun semangat setiap aksi mahasiswa</p>
            </div>
            <div class="content-pilar text-center">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<?php echo base_url('aksicendekia/asset/foto/star2.svg')?>" alt="">
                        <h3>Gotong Royong</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. In, similique.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="<?php echo base_url('aksicendekia/asset/foto/star2.svg')?>" alt="">
                        <h3>Berkarya</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. In, similique.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="<?php echo base_url('aksicendekia/asset/foto/star2.svg')?>" alt="">
                        <h3>Berdaya</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. In, similique.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pilar Utama -->

    <!-- News -->
    <div class="container">
        <div class="news">
            <h1>Informasi Seputar Aksi Cendekia</h1>
            <p>Kamu Bisa mendapatkan informasi lebih lanjut dengan menuliskan email mu dibawah</p>
            <form class="row g-3">
                <div class="col-auto">
                    <label for="inputemail" class="visually-hidden">Password</label>
                    <input type="email" class="form-control" id="inputemail" placeholder="Masukan Email Anda">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-dark mb-3">Submit Email</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End News -->

    <!-- Footer -->
    <!-- Footer -->
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-4">
                    <h5>Menu</h5>
                    <p><a class="link-opacity-100" href="./index.html">Beranda</a></p>
                    <p><a class="link-opacity-100" href="./profil.html">Profil</a></p>
                    <p><a class="link-opacity-100" href="./news.html">Portal Berita</a></p>
                    <p><a class="link-opacity-100" href="./faq.html">FAQ</a></p>

                </div>

                <!-- Column 2 -->
                <div class="col-md-4">
                    <h5>Sosial Media</h5>
                    <p><a class="link-opacity-100" href="#">Instagram</a></p>
                    <p><a class="link-opacity-100" href="#">Tiktok</a></p>
                </div>

                <!-- Column 3 -->
                <div class="col-md-4">
                    <h5>AksiCendekia</h5>
                    <p>0272 - 897237</p>
                    <p>aksicendekia@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
    <!-- End Footer -->
    <!-- Tambahkan link Bootstrap JS di akhir dokumen -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tambahkan link Bootstrap Icons (BI) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
</body>

</html>