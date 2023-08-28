 <!-- Main content -->
  <section class="content">
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

              <form action="action/add-karyawan.php" method="POST" id="FormKaryawan">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Lengkap Karyawan</label>
                    <input type="text" name="nama_karyawan" id="nama_karyawan" value="<?= @$_SESSION['nama_karyawan']; ?>" class="form-control" required>
                  </div>

                   <div class="form-group">
                    <label>Nomor Induk Pegawai (NIP)</label>
                    <input type="number" name="nip" id="nip" value="<?= @$_SESSION['nip'];?>" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Unit Kerja</label>
                    <input type="text" name="unit_kerja" id="unit_kerja" value="<?= @$_SESSION['unit_kerja'];?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Divisi</label>
                    <input type="text" name="divisi" id="divisi" value="<?= @$_SESSION['divisi'];?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label >Konfirm Password Baru</label>
                    <input type="password" name="konfirm_password" id="konfirm_password" class="form-control" required>
                  </div>

                   <div class="form-group">
                    <input type="hidden" name="status" id="status" value="nonaktif" class="form-control" >
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="tambah" class="btn btn-primary">+ Tambah Data Karyawan</button>
                  <a href="action/reset-karyawan.php" class="btn btn-secondary"> Reset </a>
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