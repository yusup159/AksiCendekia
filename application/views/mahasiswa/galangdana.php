<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('aksicendekia/css/nominal.css')?>">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-Nh5EfqImNoLEk6zu"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
      <div class="container">
          <div class="nominal">
              <h5>Masukan Nominal Donasi</h3>
              <form id="payment-form" method="post" action="<?=site_url('/snap/finish')?>">
              <input type="hidden" name="alluser_id" value="<?php echo $alluser_id ?>">
              <?php foreach ($danadonasi as $row) { ?>
                  <input type="hidden" name="result_type" id="result-type" value="">
                  <input type="hidden" name="result_data" id="result-data" value="">
                  <input name="id_penggalangan" type="hidden" value="<?php echo $row->id_penggalangan ?>" id="id_penggalangan">
                  <input name="judul" type="hidden" value="<?php echo $row->judul ?>" id="judul">
                  <input name="nominal" type="number" placeholder="Cth : Rp. 10.000" id="nominal" required>
                  <?php }?>
                  <p class="mt-3">*Minimal donasi Rp. 5.000</p>
                  <p>*5% dari nominal akan dimasukan sebagai donasi untuk operasional AksiCendekia</p>
                  <button class="btn btn-submit mt-4" id="pay-button"><img src="<?php echo base_url('aksicendekia/asset/icon/arrow.svg')?>" alt=""> Lanjutkan Pembayaran</button>

                  </a>
                  </form>
          </div>
      </div>
  


    <script type="text/javascript">
  
  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
  
    var id_penggalangan = $("#id_penggalangan").val();
    var judul = $("#judul").val();
    var nominal = $("#nominal").val();
    var username = $("#username").val();
    var email = $("#email").val();

  $.ajax({
    type : 'POST',
    url: '<?=site_url()?>/snap/token',
    data : {nominal:nominal,judul:judul,id_penggalangan:id_penggalangan},
    cache: false,

    success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
        //resultType.innerHTML = type;
        //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {
        
        onSuccess: function(result){
          changeResult('success', result);
          console.log(result.status_message);
          console.log(result);
          $("#payment-form").submit();
        },
        onPending: function(result){
          changeResult('pending', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        },
        onError: function(result){
          changeResult('error', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        }
      });
    }
  });
});

</script>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>