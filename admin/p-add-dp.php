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

              <form action="action/add-pengumuman.php" method="POST" id="FormKaryawan">
                <div class="card-body">

                  <div class="alert alert2 alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                    <strong>Perhatian!</strong><br>Hindari Penggunaan tanda petik satu ' pada isian pengumuman. Gunakan karakter lainnya.
                  </div> 


                  <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" name="judul_pengumuman" id="judul_pengumuman" class="form-control" placeholder="Judul Pengumuman" value="<?= @$_SESSION['judul-pengumuman']; ?>" required>
                  </div>

                   <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <textarea class="form-control" name="isi_pengumuman" id="isi_pengumuman" rows="15" placeholder="Isi Pengumuman ..." maxlength="200" required><?= @$_SESSION['isi_pengumuman']; ?></textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add-pengumuman" class="btn btn-primary">Tambah Pengumuman</button>
                  <a href="action/reset-pengumuman.php" class="btn btn-secondary"> Reset </a>
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