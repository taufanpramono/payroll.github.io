<?php 


require 'module/getdata.php';
$row = pengumuman();
// var_dump($row);

?>
 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?pages=tambah-pengumuman" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-bullhorn"></i></span><span class="text" >Tambah Pengumuman</span></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Pengumuman</th>
                            <th width="500px">Isi Pengumuman</th>
                            <th>Aksi</th>

                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul Pengumuman</th>
                            <th width="500px">Isi Pengumuman</th>
                            <th>Aksi</th>
                    </tfoot>
                    <tbody>
                        
                        <?php $i = 1; ?>
                        <?php foreach($row as $r) : ?>
                        <tr>
                            <td><?= $i; ?> </td>
                            <td><?= $r['judul_pengumuman']; ?></td>
                            <td><?= substr($r['isi_pengumuman'], 0, 250); echo '....'; ?></td>
                            <td>

                            <a href="action/delete-pengumuman.php?id=<?= $r['id_pengumuman']; ?>" class="btn-sm btn-danger btn-circle delete-data"><i class="fas fa-trash"></i></a>
                             <a href="?pages=edit-pengumuman&id=<?= $r['id_pengumuman']; ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-pen">
                            </i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                    <?php if ($row == Array ()) { 
                    echo "<tr><td colspan='6'><center>Data Pengumuman Kosong<center></td></tr>"; }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
