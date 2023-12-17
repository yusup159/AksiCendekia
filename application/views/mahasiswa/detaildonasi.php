<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AksiCendekia</title>

    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/detaildonasi.css')?>">
</head>

<body>

    <!-- Navigasi -->
    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url('AuthMahasiswa/dashboard')?>">
                <img src="<?php echo base_url('aksicendekia/asset/foto/logoAksiCendekia.svg')?>" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <form class="row g-3 mt-1 search-bar">
                        <div class="col-auto">
                            <label for="inputPassword2" class="visually-hidden"></label>
                            <input type="text" class="form-control search" id="inputPassword2"
                                placeholder="Lagi mau cari topik apa ?">
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
                <a href="<?php echo site_url('AuthMahasiswa/profil_mahasiswa')?>">
                
                <img class="profile" src="<?php echo ($mahasiswa->foto != null) ? base_url('Asset/foto_mahasiswa/' . $mahasiswa->foto) : base_url('aksicendekia/asset/foto/belum_ada_foto.jpg'); ?>" alt="">
            </a>
            </div>
        </div>
    </nav>
    <!-- End Navigasi -->

    <div class="detail-donasi mt-5">
        <div class="container">
            <div class="row">
            <?php foreach ($dana as $row) { ?>
                <div class="col-lg-7 donasi-kiri">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php if (!empty($row->foto1)): ?>
                            <div class="carousel-item active satu">
                                <img src="<?php echo base_url('foto1_pengajuan/' . $row->foto1); ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($row->foto2)): ?>
                            <div class="carousel-item dua">
                                <img src="<?php echo base_url('foto2_pengajuan/' . $row->foto2); ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($row->foto3)): ?>
                            <div class="carousel-item tiga">
                                <img src="<?php echo base_url('foto3_pengajuan/' . $row->foto3); ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php endif; ?>
                    </div>
                        
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                        
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                        
                    <div class="text">
                        <h2><?php echo $row->judul ?></h2>
                        <p><?php echo $row->deskripsi ?></p>
                    </div>
                </div>
                <div class="col-lg-5 donasi-kanan mt-6">
                    <div class="deskripsi-kegiatan">
                        <h4>Informasi Umum</h4>
                        
                        
                        <p class="judul">Pendanaan Dimulai : </p>
                        <p class="kegiatan"><?php echo $row->tanggal_mulai ?> </p>
                        <p class="judul">Pendanaan Berakhir : </p>
                        <p class="kegiatan"><?php echo $row->tanggal_berakhir ?> </p>
                        <p class="judul">Penyelenggara : </p>
                        <p class="kegiatan"><?php echo $row->UKM ?> </p>
                        <p class="judul">Dana Yang Dibutuhkan : </p>
                        <p class="kegiatan"><?php echo $row->donasi ?> </p>
                        <p class="judul">Dana Terkumpul : </p>
                        <p class="kegiatan"><?php echo $row->jumlahdonasi ?> </p>
                        
                    </div>
                    
                    <a href="<?php echo site_url('AuthMahasiswa/galangdana/'.$row->id_penggalangan) ?>">
                        <button onclick="return confirm('Ingin Melakukan Donasi?')" class="btn btn-light btn-bayar mt-4">
                            <img src="./asset/icon/arrow.svg" alt="">
                            Lakukan Donasi</button></a>
                </div>
                <?php }?>
            </div>
            <div class="row">
                <div class="col-lg">
                    <!-- Card -->
                    <div class="container">
                        <div class="galang mt-5">
                            <h1>Kegiatan Serupa</h1>
                        </div>
                        <div class="bungkus-galang">
                            <div class="row">
                                <div class="card col-lg-4 mb-3">
                                    <img src="./asset/foto/konser.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="penyelenggara">BEM Universitas Amikom Yogyakarta.</p>
                                        <h5 class="card-title">Festival Pentas Seni Akhir Tahun
                                            Universitas Amikom Yogyakarta</h5>
                                        <p class="nominal"><span>Rp. 130.000.000 </span> Dana Terkumpul</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-lg-4 mb-3">
                                    <img src=" ./asset/foto/konser.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="penyelenggara">BEM Universitas Amikom Yogyakarta.</p>
                                        <h5 class="card-title">Festival Pentas Seni Akhir Tahun
                                            Universitas Amikom Yogyakarta</h5>
                                        <p class="nominal"><span>Rp. 130.000.000 </span> Dana Terkumpul</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-lg-4 mb-3">
                                    <img src=" ./asset/foto/konser.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="penyelenggara">BEM Universitas Amikom Yogyakarta.</p>
                                        <h5 class="card-title">Festival Pentas Seni Akhir Tahun
                                            Universitas Amikom Yogyakarta</h5>
                                        <p class="nominal"><span>Rp. 130.000.000 </span> Dana Terkumpul</p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->

                </div>
            </div>
        </div>
    </div>

    <!-- End Hero -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-4">
                    <h5>Menu</h5>
                    <p><a class="link-opacity-100" href="#">Beranda</a></p>
                    <p><a class="link-opacity-100" href="#">Profil Sekolah</a></p>
                    <p><a class="link-opacity-100" href="#">Portal Berita</a></p>
                    <p><a class="link-opacity-100" href="#">Event Sekolah</a></p>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./copy.js"></script>
    <!-- Tambahkan link Bootstrap Icons (BI) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">

</body>

</html>