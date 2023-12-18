
<div class="right_col" role="main">
<div class="container-fluid">
<h2>Donatur Data</h2>
    <table class="table table-bordered">
        <tr>
            <th class="text-center" >NO</th>
            <th class="text-center" >Nama</th>
            <th class="text-center" >Nama Kegiatan</th>
            <th class="text-center" >Tipe Pembayaran</th>
            <th class="text-center" >Jumlah Donasi</th>
            <th class="text-center" >Status</th>
            <th  class="text-center">AKSI</th>
        </tr>
        <?php $no=1; foreach($fullData as $row){ ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->nama_kegiatan; ?></td>
                <td><?php echo $row->tipe_pembayaran; ?></td>
                <td><?php echo $row->jumlah_donasi; ?></td>
                <td><p class="point">
                  <?php if ($row->status == 200){?>
                    <span class="badge rounded-pill bg-primary"> Berhasil</span>
                    <?php }elseif ($row->status == 201) {?>
                    <span class="badge rounded-pill bg-warning"> Pending</span>
                    <?php }else  {?>
                    <span class="badge rounded-pill bg-danger"> Expired</span>
                    <?php }?>
                    

                </p></td>
              
				<td><a href="<?php echo site_url('AuthAdmin/delete_transaksimhs/'.$row->id_transaksi);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger"><div class="btn btn-danger btn-sm"><img src="<?php echo base_url('aksicendekia/asset/icon/sampah.png    ')?>"></div> hapus</a></td>
                
            </tr>
            <?php $no++ ;} ?>
    </table>
</div>
</div>
        
