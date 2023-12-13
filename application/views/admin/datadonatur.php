
<div class="right_col" role="main">
<div class="container-fluid">
<h2>Donatur Data</h2>
    <table class="table table-bordered">
        <tr>
            <th class="text-center" >NO</th>
            <th class="text-center" >Username</th>
            <th class="text-center" >Email</th>
            <th  class="text-center">AKSI</th>
        </tr>
        <?php $no=1; foreach($donatur as $row){ ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->email; ?></td>
              
				<td><a href="<?php echo site_url('AuthAdmin/delete_donatur/'.$row->id);?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger"><div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div> hapus</a></td>
                
            </tr>
            <?php $no++ ;} ?>
    </table>
</div>
</div>
        
