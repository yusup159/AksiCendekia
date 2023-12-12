<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/metodepembayaran.css')?>">
</head>

<body>
    <div class="container">
        <div class="nominal">
            <h5>Pilih Metode Pembayaran</h3>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih Metode Pembayaran</option>
                    <option value="1">Shoope Pay</option>
                    <option value="2">Gopay</option>
                    <option value="3">BCA Virtual Account</option>
                </select>

                <a href="<?php echo site_url('AuthMahasiswa/dashboard')?>">
                    <button class="btn btn-submit mt-4">
                        <img src="<?php echo base_url('aksicendekia/asset/icon/arrow.svg')?>" alt=""> Lanjutkan Pembayaran</button>
                </a>
        </div>
    </div>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>