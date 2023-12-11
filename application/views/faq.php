<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AksiCendekia</title>

    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/faq.css')?>">
</head>

<body>

    <!-- Navigasi -->
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
    <div class="hero text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg hero-kiri">
                    <div class="stempel mx-auto">
                        <p>#berkarya&berdaya</p>
                    </div>
                    <h1>
                        Frequently Asked <span>Questions</span>
                    </h1>
                    <p>Datar pertanyaan yang sering ditanyakan user lain</p>
                    <a href="#">
                        <button class="btn-ppdb">
                            <img src="<?php echo base_url('aksicendekia/asset/icon/arrow.svg')?>" alt="">Lihat FAQ
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- End Hero -->

    <!-- FAQ -->

    <div class="container mt-5">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Pertanyaan 1
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                        the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Pertanyaan 2
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                        the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine
                        this being filled with some actual content.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Pertanyaan 3
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                        the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more
                        exciting happening here in terms of content, but just filling up the space to make it look, at
                        least at first glance, a bit more representative of how this would look in a real-world
                        application.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- End FAQ -->

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tambahkan link Bootstrap Icons (BI) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
</body>

</html>