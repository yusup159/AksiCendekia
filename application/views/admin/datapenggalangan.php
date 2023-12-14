
<div class="right_col" role="main">
<div class="container-fluid">
<h2>Donatur Data</h2>
<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_penggalangan"><i class="fas fa-plus fa-sm"></i>Tambah Barang</button>

    <table class="table table-bordered">
        <tr>
            <th class="text-center" >NO</th>
            <th class="text-center" >judul</th>
            <th class="text-center" >Deskripsi</th>
            <th  class="text-center">donasi</th>
            <th  class="text-center">UKM</th>
            <th  class="text-center">jumlahdonasi</th>
            <th  class="text-center">Tanggal Mulai</th>
            <th  class="text-center">Tanggal Berakhir</th>
            
        </tr>
        <?php $no=1; foreach($penggalangan as $row){ ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row->judul; ?></td>
                <td><?php echo $row->deskripsi; ?></td>
                <td align="right">Rp. <?php echo number_format($row->donasi, 0, ',', '.'); ?></td>
                <td><?php echo $row->UKM; ?></td>
                <td align="right">Rp. <?php echo number_format( $row->jumlahdonasi, 0, ',', '.'); ?></td>
                <?php 
                    $originalDate = $row->tanggal_mulai; 
                    $formattedDate = date("d F Y", strtotime($originalDate));?>
                <td><?php echo $formattedDate; ?></td> 
                <?php 
                    $originalDate = $row->tanggal_berakhir; 
                    $formattedDate1 = date("d F Y", strtotime($originalDate));?>
                <td><?php echo $formattedDate1; ?></td>
              
				<td>
    <a href="<?php echo site_url('AuthAdmin/delete_penggalangan/'.$row->id);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger btn-sm">
        <i class="fa fa-trash"></i> hapus
    </a>
</td>

            </tr>
            <?php $no++ ;} ?>
    </table>
</div>
</div>
        



<div class="modal fade" id="tambah_penggalangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form action="<?php echo site_url('AuthAdmin/input_penggalangan')?>" method="post" enctype="multipart/form-data">
       	<div class="form-group">
       		<label>Judul</label>
       		<select name="judul"  class="form-control">
                <?php foreach($pengajuan as $val) {?>
                    <option><?php echo $val->nama_kegiatan;  ?></option>
                <?php }?>
            </select>
       	</div>
       	<div class="form-group">
       		<label>Deskripsi</label>
       		<select name="deskripsi"  class="form-control">
                <?php foreach($pengajuan as $val) {?>
                    <option ><?php echo $val->deskripsi;  ?></option>
                <?php }?>
            </select>
       	</div>
       	<div class="form-group">
            <label>Penyelenggara</label>
            
            <select name="ukm" class="form-control">
                <?php foreach($pengajuan as $val) {?>
                    <option selected><?php echo $val->UKM; ?></option>
                <?php }?>
            </select>
        </div>
                
       
       	<div class="form-group">
       		<label>Dana Yang Dibutuhkan</label>
       		<select name="danadonasi"  class="form-control">
                <?php foreach($pengajuan as $val) {?>
                    <option ><?php echo $val->Donasi;  ?></option>
                <?php }?>
            </select>
       	</div>
         <div class="form-group">
       		<label>id pengajuan</label>
       		<select name="id_pengajuan"  class="form-control">
                <?php foreach($pengajuan as $val) {?>
                    <option ><?php echo $val->id;  ?></option>
                <?php }?>
            </select>
       	</div>
       	

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div>