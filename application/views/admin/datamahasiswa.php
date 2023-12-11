
<div class="right_col" role="main">
<div class="container-fluid">
<h2>Donatur Data</h2>
    <table class="table table-bordered">
        <tr>
            <th class="text-center" >ID</th>
            <th class="text-center" >Username</th>
            <th class="text-center" >Email</th>
            <th colspan="2" class="text-center">AKSI</th>
        </tr>
        <?php foreach($mahasiswa as $row): ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div> edit</td>
				<td><div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div> hapus</td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
        
