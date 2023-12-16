





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AksiCendekia</title>

    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/mainpage.css')?>">
</head>

<body>

    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url('AuthDonatur/dashboard')?>">
                <img src="<?php echo base_url('aksicendekia/asset/foto/logoAksiCendekia.svg')?>" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="row g-3 mt-1 search-bar" method="get" action="<?php echo site_url('AuthDonatur/search'); ?>">
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden"></label>
                    <input type="text" class="form-control search" id="inputPassword2" name="query" placeholder="Lagi mau cari topik apa?">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-search mb-3">
                        <img src="<?php echo base_url('aksicendekia/asset/foto/search.svg')?>" alt="">
                    </button>
                </div>
            </form>

                </div>
                <!-- <a href="#" class="profile-link">
                    <img src="./asset/icon/simpan.svg" alt="">
                </a> -->
                <a href="<?php echo site_url('AuthDonatur/profil_donatur')?>">
                
                    <img class="profile" src="<?php echo ($donatur->foto != null) ? base_url('Asset/foto_donatur/' . $donatur->foto) : base_url('aksicendekia/asset/foto/belum_ada_foto.jpg'); ?>" alt="">
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navigasi -->

    <!-- Hero -->
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 hero-kiri">
                    <h1>
                        Sendiri Kita Setetes <span>Bersama Kita Lautan</span>
                    </h1>
                    <p>Plarform penggalangan dana untuk berbagai kreativitas mahasiswa dalam rangka untuk berkontribusi
                        untuk bangsa.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Hero -->
    <!-- Card 2-->
    <div class="container">
    <div class="galang">
            <h3 class="mt-5">Kegiatan yang memerlukan dana segera,<br><span>bantu kawan cendekia lain nya</span></h3>
        </div>
    <!-- search_results.php -->

<div class="bungkus-galang">
    <div class="row">
        <?php foreach ($result as $row) { ?>
            <div class="card col-lg-4 mb-3">
                <!-- Kode tampilan kartu untuk hasil pencarian -->
                <img src="<?php echo base_url('foto1_pengajuan/'.$row->foto1); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="<?php echo site_url('AuthDonatur/detail_donasi/'.$row->id_penggalangan) ?>">
                        <p class="penyelenggara"><?= $row->UKM ?></p>
                        <h5 class="card-title"><?= $row->judul ?></h5>
                        <p class="nominal"><span>Rp. <?= number_format($row->jumlahdonasi) ?> </span> Dana Terkumpul</p>
                    </a>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?= ($row->jumlahdonasi / $row->donasi) * 100 ?>%" aria-valuenow="<?= ($row->jumlahdonasi / $row->donasi) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</div>
    <!-- Card -->

    <!-- Banner -->
    <div class="container mt-5">
        <div class="banner">
        </div>
    </div>
    <!-- End Banner -->

    <!-- Card 2 -->
    <div class="container mt-5">
        <div class="galang">
            <h3 class="mt-5">Kegiatan Yang Baru Ditambahkan</h3>
        </div>
        <div class="bungkus-galang">
            <div class="row">
                
                <div class="card col-lg-4 mb-3">
                    <img src="<?php echo base_url('aksicendekia/asset/foto/konser.png')?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="<?php echo site_url('AuthDonatur/detail_donasi') ?>" class="link">
                            <p class="penyelenggara">BEM Universitas Amikom Yogyakarta.</p>
                            <h5 class="card-title">Festival Pentas Seni Akhir Tahun
                                Universitas Amikom Yogyakarta</h5>
                            <p class="nominal"><span>Rp. 130.000.000 </span> Dana Terkumpul</p>
                        </a>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 mb-3">
                    <img src="<?php echo base_url('aksicendekia/asset/foto/konser.png')?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="<?php echo site_url('AuthDonatur/detail_donasi') ?>" class="link">
                            <p class="penyelenggara">BEM Universitas Amikom Yogyakarta.</p>
                            <h5 class="card-title">Festival Pentas Seni Akhir Tahun
                                Universitas Amikom Yogyakarta</h5>
                            <p class="nominal"><span>Rp. 130.000.000 </span> Dana Terkumpul</p>
                        </a>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card 2 -->
    <div class="container mt-5">
        <div class="seeall text-center">
            <a href="#">
                <button class="btn btn-seeall"> Lihat Semua</button>
            </a>
        </div>
    </div>

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

    <!-- Bootstrap -->
    <script src="./copy.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tambahkan link Bootstrap Icons (BI) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
</body>

</html>
