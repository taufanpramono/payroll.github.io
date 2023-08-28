
<?php 
require 'module/getdata.php';
$row = get_data_admin();
?>


 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Profil Admin</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              
              
              <form action="action/update-admin.php" method="POST">
                
                
                <div class="card-body">
                  <input type="hidden" name="id_admin" id="id_admin" value=" <?= $row['admin_id']; ?> " class="form-control" placeholder="Masukan Nama Lengkap Admin">
                  <div class="form-group">
                    <label>Nama Admin</label>
                    <input type="text" name="nama_admin" id="nama_admin" value="<?= $row['nama_admin']; ?>" class="form-control" placeholder="Masukan Nama Lengkap Admin">
                  </div>

                  <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $row['username']; ?>" placeholder="User Name">
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
                  <button type="submit" name="update-admin" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </section>
    <!-- /.content -->