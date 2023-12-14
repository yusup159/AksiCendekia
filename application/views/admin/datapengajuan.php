
<div class="right_col" role="main">
<div class="container-fluid">
<h2>Donatur Data</h2>
    <table class="table table-bordered">
        <tr>
            <th class="text-center" >NO</th>
            <th class="text-center" >Nama Kegiatan</th>
            <th class="text-center" >Tanggal Kegiatan</th>
            <th class="text-center" >Dokumen Pengajuan</th>
            <th class="text-center" >Status Pengajuan</th>
            <th  colspan="3" class="text-center">AKSI</th>
        </tr>
        <?php $no=1; foreach($pengajuan as $row){ ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row->nama_kegiatan; ?></td>
                <?php 
                                    $originalDate = $row->tanggal; 
                                    $formattedDate = date("d F Y", strtotime($originalDate));
                                ?>
                <td><?php echo $formattedDate; ?></td>
                <td><a href="<?php echo base_url('dokumen_pengajuan/' .$row->dokumen); ?>" download>
                    <img src="<?php echo base_url('aksicendekia/asset/icon/folder.svg'); ?>" class="mr-1" alt="">File Pengajuan</a></td>
                <td><?php echo $row->status; ?></td>
                <td><a href="<?php echo site_url('AuthAdmin/delete_pengajuan/'.$row->id);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger"><div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div> hapus</a></td>
                <td><a href="<?php echo site_url('AuthAdmin/tolak/'.$row->id);?>" onclick="return confirm('Yakin untuk menolak Data Ini?')" class="btn btn-warning"><div class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></div> Tolak</a></td>
                <td><a href="<?php echo site_url('AuthAdmin/terima/'.$row->id);?>" onclick="return confirm('Yakin untuk menerima  Data Ini?')" class="btn btn-primary"><div class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></div> Terima</a></td>
                
            </tr>
            <?php $no++ ;} ?>
    </table>
</div>
</div>
        
