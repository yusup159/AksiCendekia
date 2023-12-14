</div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('Asset/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('Asset/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('Asset/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('Asset/vendors/nprogress/nprogress.js')?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('Asset/vendors/Chart.js/dist/Chart.min.js')?>"></script>
    <!-- gauge.js -->
    <script src="<?php base_url('Asset/vendors/gauge.js/dist/gauge.min.js')?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('Asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('Asset/vendors/iCheck/icheck.min.js')?>"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('Asset/vendors/skycons/skycons.js')?>"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('Asset/vendors/Flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/Flot/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/Flot/jquery.flot.time.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/Flot/jquery.flot.stack.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/Flot/jquery.flot.resize.js')?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('Asset/vendors/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/flot.curvedlines/curvedLines.js')?>"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('Asset/vendors/DateJS/build/date.js')?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('Asset/vendors/jqvmap/dist/jquery.vmap.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('Asset/vendors/moment/min/moment.min.js')?>"></script>
    <script src="<?php echo base_url('Asset/vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('Asset/build/js/custom.min.js')?>"></script>
	<!-- Posisikan script ini di bawah jQuery -->
    <script>
    $(document).ready(function () {
        // Ketika opsi judul dipilih
        $('select[name="judul"]').change(function () {
            // Ambil nilai judul yang dipilih
            var selectedJudul = $(this).val();

            // Ambil data dari array pengajuan sesuai dengan judul yang dipilih
            var selectedData = <?php echo json_encode($pengajuan); ?>.find(item => item.nama_kegiatan === selectedJudul);

            // Isi formulir sesuai dengan data yang diambil
            $('select[name="deskripsi"]').val(selectedData.deskripsi);
            $('select[name="ukm"]').val(selectedData.UKM);
            $('select[name="danadonasi"]').val(selectedData.Donasi);
            $('select[name="id_pengajuan"]').val(selectedData.id);
        });

        // Ketika opsi deskripsi dipilih
        $('select[name="deskripsi"]').change(function () {
            // Ambil nilai deskripsi yang dipilih
            var selectedDeskripsi = $(this).val();

            // Ambil data dari array pengajuan sesuai dengan deskripsi yang dipilih
            var selectedData = <?php echo json_encode($pengajuan); ?>.find(item => item.deskripsi === selectedDeskripsi);

            // Isi formulir sesuai dengan data yang diambil
            $('select[name="judul"]').val(selectedData.nama_kegiatan);
            $('select[name="ukm"]').val(selectedData.UKM);
            $('select[name="danadonasi"]').val(selectedData.Donasi);
            $('select[name="id_pengajuan"]').val(selectedData.id);
        });

        // Ketika opsi UKM dipilih
        $('select[name="ukm"]').change(function () {
            // Ambil nilai UKM yang dipilih
            var selectedUKM = $(this).val();

            // Ambil data dari array pengajuan sesuai dengan UKM yang dipilih
            var selectedData = <?php echo json_encode($pengajuan); ?>.find(item => item.UKM === selectedUKM);

            // Isi formulir sesuai dengan data yang diambil
            $('select[name="judul"]').val(selectedData.nama_kegiatan);
            $('select[name="deskripsi"]').val(selectedData.deskripsi);
            $('select[name="danadonasi"]').val(selectedData.Donasi);
            $('select[name="id_pengajuan"]').val(selectedData.id);
        });

        // Ketika opsi danadonasi dipilih
        $('select[name="danadonasi"]').change(function () {
            // Ambil nilai danadonasi yang dipilih
            var selectedDanaDonasi = $(this).val();

            // Ambil data dari array pengajuan sesuai dengan danadonasi yang dipilih
            var selectedData = <?php echo json_encode($pengajuan); ?>.find(item => item.Donasi === selectedDanaDonasi);

            // Isi formulir sesuai dengan data yang diambil
            $('select[name="judul"]').val(selectedData.nama_kegiatan);
            $('select[name="deskripsi"]').val(selectedData.deskripsi);
            $('select[name="ukm"]').val(selectedData.UKM);
            $('select[name="id_pengajuan"]').val(selectedData.id);
        });
    });
</script>



  </body>
</html>
