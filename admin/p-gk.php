<?php 


require 'module/getdata.php';
$row                = data_gaji();
$data_gaji_kosong   = data_gaji_kosong();
// var_dump($row);
// var_dump($data_gaji_kosong);
?>



 <div class="container-fluid">
    <!-- DataTales Example -->
    <form action="action/delete-gaji.php" method="POST">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?pages=tambah-gaji-karyawan" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-money-bill-wave"></i></span><span class="text" >Tambah Data Gaji</span></a>
            <?php if ($data_gaji_kosong > 0) : ?>
            <button type="submit" name="hapus-gaji" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-trash"></i></span><span class="text" >Hapus Gaji</span></button>
            <?php endif; ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="pilih-semua"></th>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>NIP</th>
                            <th>Total Gaji</th>
                            <th>Tanggal Gajian</th>
                            <th>Aksi</th>

                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="pilih-semua-bottom"></th>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>NIP</th>
                            <th>Total Gaji</th>
                            <th>Tanggal Gajian</th>
                            <th>Aksi</th>
                    </tfoot>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($row as $r ) : ?>
                        <tr>
                            <td><input type="checkbox" name="id_gaji[]" value="<?= $r['id_gaji']; ?>"></td>
                            <td><?= $i; ?></td>
                            <td><?= $r['nama_karyawan']; ?></td>
                            <td><?= $r['nip']; ?></td>
                            <td><?= $r['total_gaji']; ?></td>
                            <td><?= $r['tanggal_gajian']; ?></td>
                            <td>

                             <a href="?pages=edit-data-gaji&id=<?= $r['id_gaji']; ?>&from=list" class="btn btn-info btn-circle btn-sm"><i class="fas fa-pen">
                            </i></a>
                             <a href="?pages=lihat-slip&id=<?= $r['id_gaji']; ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye">
                            </i></a>
                            </td>
                            <?php $i++ ?>
                            <?php endforeach; ?>
                            <?php if ($data_gaji_kosong == 0) { 
                            echo "<tr><td colspan='7'><center>Data Gaji Kosong<center></td></tr>"; }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
</div>

