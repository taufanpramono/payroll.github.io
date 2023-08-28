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
            
              <form action="action/upload-data-karyawan.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">


                  <?php if (isset($_SESSION['upload_data_karyawan']) == true) : ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Informasi Upload Terbaru !</strong><br> 


                    <table border="0">
                      <tr>
                        <td style="padding-right: 30px;">Total Data Berhasil Upload ke DB</td>
                        <td style="padding-right: 30px;">:</td>
                        <td><?= @$_SESSION['data_karyawan_berhasil_upload']; ?>&nbsp Data</td>
                      <tr>
                      <tr>
                        <td style="padding-right: 30px;">Gagal Karena Karyawan Telah Terdaftar </td>
                        <td style="padding-right: 30px;">:</td>
                        <td><?= @$_SESSION['data-karyawan_gagal_upload'] ; ?>&nbsp Data</td>
                      <tr>
                      <tr>
                        <td style="padding-right: 30px;"><strong>Total Data Dari Files</storng></td>
                        <td style="padding-right: 30px;"><strong>:</storng></td>
                        <td><strong><?= @$_SESSION['total_data_karyawan_terupload']; ?>&nbsp Data</storng></center></td>
                      <tr>    
                      
                    </table>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>



                  <?php 

                  $timeout = 300;
                  $elapsed_time = time()-$_SESSION['upload_data_karyawan'];
                  if($elapsed_time >= $timeout){
                    unset($_SESSION['upload_data_karyawan']);
                    unset($_SESSION['data_karyawan_berhasil_upload']);
                    unset($_SESSION['data-karyawan_gagal_upload'] );
                    unset($_SESSION['total_data_karyawan_terupload']);      
                  }
                  
                  ?>

                <?php endif; ?>


                  <div class="form-group">
                    <label><strong>Upload Data Karyawan</strong></label>
                     <p>pastikan data anda berbentuk file .xls .xlsx, unduh <a href="../asset/files/TEMPLAT - DATA KARYAWAN - PAYROLL V.1.xlsx">templat disini</a></p>
                    <input type="file" name="upload_excel" id="upload_excel" class="form-control" required="" accept=".xlsx, .xls">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="upload-excel-karyawan" class="btn btn-primary"><i class="fas fa-fw fa-upload"></i>    Upload</button>
                </div>
              </form>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </section>
    <!-- /.content -->