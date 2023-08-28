 <?php 
   
   require 'module/getdata.php';
   $data_karyawan        = data_karyawan_aktif();
   $data_karyawan_kosong = data_karyawan_kosong();
   // var_dump($data_karyawan);
   // var_dump($data_karyawan_kosong);

  ?>

 <div class="container-fluid">
    <!-- DataTales Example -->

    <form action="action/del-aktif.php" method="POST">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?pages=tambah-data-karyawan" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-users"></i></span><span class="text" >Tambah Data Karyawan</span></a>

            <?php if ($data_karyawan_kosong > 0) : ?> 
            <button type="submit" name="hapus-karyawan" class="btn btn-danger btn-icon-split delete-form"><span class="icon text-white-50"><i class="fas fa-trash"></i></span><span class="text" >Delete Karyawan</span></button>
            <?php endif; ?>
      

            <?php if ($data_karyawan_kosong > 0) : ?> 
            <button type="submit" name="nonaktifkan-karyawan" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-eye"></i></span><span class="text" >Non Aktifkan Karyawan</span></button>
            <?php endif; ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>NIP</th>
                            <th>Unit Kerja</th>
                            <th>Status</th>
                            <th>Aksi</th>

                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="select-all-bottom"></th>    
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>NIP</th>
                            <th>Unit Kerja</th>
                            <th>Status</th>
                            <th>Aksi</th>
                    </tfoot>
                    <tbody>
                         <?php $i=1; ?>
                         <?php foreach ($data_karyawan as $r) : ?>
                        <tr>
                            <td><input type="checkbox" name="nip-karyawan[]" value="<?= $r['nip']; ?>"></td>
                            <td><?= $i; ?></td>
                            <td><?= $r['nama_karyawan']; ?></td>
                            <td><?= $r['nip']; ?></td>
                            <td><?= $r['unit_kerja']; ?></td>
                            <td>

                                <?php if($r['status'] == 'aktif') :  ?>
                                <a class="btn btn-info btn-icon-split btn-sm"><span class="text"><i class="fas fa-eye"></i></span></a>
                                <?php endif; ?>
                                <?php  $cek_data_gaji = connecting_sallary($r['nip']); ?>
                                <?php if ($cek_data_gaji > 0) : ?>
                                <a class="btn btn-success btn-icon-split btn-sm"> 
                                <span class="text">
                                <?php echo '<i class="fas fa-lock"></i>';  ?>
                                </span></a>
                                <?php endif; ?>
                            </td>
                            <td>                            
                            <a href="?pages=edit-data-karyawan&nip=<?= $r['nip']; ?>&from=aktif" class="btn btn-info btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                            
                            

                            </i></a>
                            </td>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                            <?php if ($data_karyawan_kosong == 0) { 
                            echo "<tr><td colspan='8'><center>Data Karyawan Aktif Kosong<center></td></tr>"; }
                            ?>
                        </tr>                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
</div>
   
