<?php 

require 'module/getdata.php';

if (isset($_GET['nip'])) {

  $nip  =  $_GET['nip'];
  $from =  $_GET['from'];
  $row  = view_data_kr($nip);
   // var_dump($row);

  if ($row == NULL) {
    echo '<script> location.replace("?pages=404"); </script>';
  }
  
  } else {

    echo '<script> location.replace("?pages=404"); </script>';
    exit;

  }

 ?>


 <!-- Main content -->

      <div class="container-fluid" style="padding-bottom: 100px;">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary" >
              <!-- <div class="card-header">
                <h3 class="card-title">Profil Admin</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->

              <form action="action/update-karyawan.php" method="POST" id="FormKaryawan">
                <div class="card-body">
                  <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $row['id_karyawan']; ?>" class="form-control" >
                  <input type="hidden" name="from"  value="<?= $from ?>" class="form-control" >
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_karyawan" id="nama_karyawan" value="<?= $row['nama_karyawan'];?>" class="form-control" placeholder="Masukan Nama Lengkap Admin">
                  </div>

                   <div class="form-group">
                    <label>Nomor Induk Pegawai (NIP)</label>
                    <input type="number" name="nip" id="nip" value="<?= $row['nip']; ?>" class="form-control" placeholder="Nomor Induk Pegawai">
                  </div>

                  <div class="form-group">
                    <label>Unit Kerja</label>
                    <input type="text" name="unit_kerja" id="unit_kerja" value="<?= $row['unit_kerja']; ?>" class="form-control" placeholder="Unit Kerja">
                  </div>

                  <div class="form-group">
                    <label>Divisi</label>
                    <input type="text" name="divisi" id="divisi" value="<?= $row['divisi']; ?>" class="form-control" placeholder="Unit Kerja">
                  </div>

                  <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control"  placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label >Konfirm Password Baru</label>
                    <input type="password" name="konfirm_password" id="konfirm_password" class="form-control" placeholder="Password">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                </div>
              </form>
              <div>
              </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


 
    <!-- /.content -->