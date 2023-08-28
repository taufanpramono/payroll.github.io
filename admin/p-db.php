<?php 

  require 'module/getdata.php';
  $data_karyawan        = counter_data_karyawan();
  $data_karyawan_aktif  = counter_data_karyawan_aktif();
  $data_gaji            = counter_data_gaji();
  $pengumuman           = pengumuman();

  // var_dump($pengumuman);

 
 ?>

         <div class="container-fluid">

            <!-- Page Heading -->

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-5">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Karyawan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                       <div class="timer count-title count-number" data-to="<?= $data_karyawan;  ?>" data-speed="1500"></div>
                                   Karyawan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-5">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Karyawan Aktif </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <div class="timer count-title count-number" data-to="<?= $data_karyawan_aktif; ?>" data-speed="1500"></div> Karyawan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-xl-4 col-md-6 mb-5">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data Gaji </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <div class="timer count-title count-number" data-to=" <?= $data_gaji ?>" data-speed="1500"></div>

                                        Data</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- userguide for admin -->
                <div class="col-xl-12 col-md-6 mb-1">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panduan</h1>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 mb-1" >
                    <div class="card shadow mb-4 ">
                        <div class="card-header" >
                            Halo Admin, Bersiap Menggunakan Sistem ?
                        </div>
                        <div class="card-body">
                            <p>Berikut telah kami lampirkan sebuah panduan penggunakan sistem atau <i>User Guide</i>, untuk memudahkan anda dalam pengoperasian sistem payroll ini. Sistem Payroll ini tidak memiliki fitur automatic callculate terhadap setiap inputan yang anda lakukan, olehnya pastikan data anda telah siap.</p>

                            <a href="https://drive.google.com/drive/folders/19DZYj9uvoU6blAsiTgNHjzwNFFMNj85Q?usp=share_link" class="btn btn-primary btn-icon-split" target="_blank"> 
                                <span class="icon text-white-50"><i class="fas fa-users"></i></span>
                                <span class="text">Cek User Guide</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- informasi -->
                <div class="col-xl-12 col-md-6 mb-1">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Informasi</h1>
                    </div>
                </div>

                <?php foreach ($pengumuman as $row ) : ?>
                <div class="col-xl-6 col-md-6 mb-1">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?= $row['judul_pengumuman']; ?></h6>
                        </div>
                        <div class="card-body">
                            <?= $row['isi_pengumuman']; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
      </div>
