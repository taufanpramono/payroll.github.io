
<?php 

require 'module/getdata.php';
if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $row = edit_pengumuman($id);
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

              <form action="action/update-pengumuman.php" method="POST" id="FormKaryawan">
                <div class="card-body">

                 <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                  <strong>Perhatian!</strong><br>Hindari Penggunaan tanda petik satu ' pada isian pengumuman. Gunakan karakter lainnya.
                </div> 
                  
                  <input type="hidden" name="id_pengumuman" id="id_pengumuman" value="<?= $row['id_pengumuman']; ?>" class="form-control" >
                  <input type="hidden" name="admin_id" id="admin_id" value="<?= $row['admin_id']; ?>" class="form-control" >
                  <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" name="judul_pengumuman" id="judul_pengumuman" value="<?= $row['judul_pengumuman']; ?>" class="form-control" placeholder="Judul Pengumuman">
                  </div>

                   <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <textarea class="form-control" name="isi_pengumuman" id="isi_pengumuman" rows="15" placeholder="Isi Pengumuman ..." ><?= $row['isi_pengumuman']; ?></textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-pengumuman" class="btn btn-primary">Update Pengumuman</button>
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