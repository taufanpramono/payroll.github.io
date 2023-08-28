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
   
            
              <form action="action/upload-data-gaji.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <?php if (isset($_SESSION['uploadberhasil']) == true) : ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Informasi Upload Terbaru !</strong><br> 


                    <table border="0">
                      <tr>
                        <td style="padding-right: 30px;">Total Data Berhasil Upload Ke DB </td>
                        <td style="padding-right: 30px;">:</td>
                        <td><?= @$_SESSION['total_data']; ?>&nbsp Data</td>
                      <tr>
                      <tr>
                        <td style="padding-right: 30px;">Gagal Karena Karyawan Belum Terdaftar </td>
                        <td style="padding-right: 30px;">:</td>
                        <td><?= @$_SESSION['NIK Tidak Terdaftar']; ?>&nbsp Data</td>
                      <tr>
                      <tr>
                        <td style="padding-right: 30px;">Gagal Karena Status Karyawan Nonaktif</td>
                        <td style="padding-right: 30px;">:</td>
                        <td><?= @$_SESSION['gagal_upload_nonaktif']; ?>&nbsp Data</center></td>
                      <tr>
                      <tr>
                        <td style="padding-right: 30px;"><strong>Total Data Dari File</storng></td>
                        <td style="padding-right: 30px;"><strong>:</storng></td>
                        <td><strong><?= @$_SESSION['total_data_gaji']; ?>&nbsp Data</storng></center></td>
                      <tr>    
                      
                    </table>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>



                  <?php 

                  $timeout = 300;
                  $elapsed_time = time()-$_SESSION['uploadberhasil'];
                  if($elapsed_time >= $timeout){
                    unset($_SESSION['uploadberhasil']);
                    unset($_SESSION['total_data']);
                    unset($_SESSION['gagal_upload_nonaktif']);
                    unset($_SESSION['NIK Tidak Terdaftar']);
                    unset($_SESSION['total_data_gaji']);
      
                  }
                  
                  ?>

                <?php endif; ?>


                  <div class="form-group">
                    <label><strong>Upload Data Gaji</strong></label>
                     <p>pastikan data anda berbentuk file .xls .xlsx, unduh <a href="../asset/files/TEMPLAT - DATA GAJI - PAYROLL V.1.xlsx">templat disini</a></p>
                    <input type="file" name="upload_excel" id="upload_excel" class="form-control" required="" accept=".xlsx, .xls">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="upload-data-gaji" class="btn btn-primary"><i class="fas fa-fw fa-upload"></i>    Upload</button>
                </div>
              </form>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </section>
    <!-- /.content -->