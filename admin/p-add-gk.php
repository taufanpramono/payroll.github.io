<?php 

require 'module/getdata.php';
$data = data_karyawan_add_to_gk();

// var_dump($data);
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid" style="padding-bottom: 100px">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary" >

          <div class="card-body" >
            <div class="alert alert2 alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
              <strong>Perhatian!</strong><br>Sistem Payrol ini tidak melakukan penjumlahan secara otomatis, Mohon melakukan input secara hati-hati agar seluruh data valid dan benar.
            </div>   
            <!-- Form buat tambah gaji -->
            <form class="row g-3 p-4" method="POST" action="action/add-gaji.php">
              <table cellpadding="10" style="font-weight: bold;">
                <hr>

                <!-- Identitas Karyawan -->
                <div class="col-md-12">
                  <label><h5><strong>Identitas Karyawan</strong></h5></label> 
                </div>
                <div class="col-md-12">
                  <label  class="mt-3">Nama Karyawan</label>
                  <select class="form-control" id="id_karyawan" name="id_karyawan" autofocus required="">
                    <option value=""> Silahkan Pilih..</option>
                    <?php if (empty($data)) : ?>
                    <option value=""> Karyawan tidak ada yang aktif...</option>
                    <?php else : ?>
                    <?php foreach ($data as $row) : ?>
                      <option value="<?= $row['id_karyawan'] ?>"><?= $row['nama_karyawan'] ?> - <?= $row['nip'] ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>   
                  </select>
                </div>

                <div class="col-md-12">
                  <label class="mt-3">Tanggal Gajian</label>
                  <input type="date" class="form-control" name="tanggal_gajian" id="tanggal_gajian">
                  <p><i>*klik icon kalender untuk memilih tanggal</i></p>
                </div>

                <!-- Gaji Fluktuatif -->
                <div class="col-md-12 input-group">
                  <label class="mt-5"><h5><strong>Gaji Fluktuatif</strong></h5></label> 
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Jumlah Kehadiran</label>
                  <input type="number" class="form-control" name="jumlah_kehadiran" id="jumlah_kehadiran"  aria-describedby="basic-addon1">
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Biaya Kehadiran / Hari</label>
                  <input type="text" class="form-control uang" name="biaya_kehadiran_per_hari" id="biaya_kehadiran_per_hari" >
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Total Biaya Kehadiran</label>
                  <input type="text" class="form-control uang" name="total_biaya_kehadiran_per_hari" id="total_biaya_kehadiran" required="">
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Jumlah Transportasi</label>
                  <input type="number" class="form-control" name="jumlah_transportasi" id="jumlah_transportasi">
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Biaya Transportasi / Hari</label>
                  <input type="text" class="form-control uang" name="biaya_transportasi_per_hari" id="biaya_transportasi_per_hari" >
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Total Biaya Transportasi</label>
                  <input type="text" class="form-control uang" name="total_biaya_transportasi" id="total_biaya_transportasi" required="">
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Jumlah Pengajaran</label>
                  <input type="number" class="form-control uang" name="jumlah_pengajaran" id="jumlah_kehadiran">
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Biaya Pengajaran / Hari</label>
                  <input type="text" class="form-control uang" name="biaya_pengajaran_per_hari" id="biaya_pengajaran_per_hari" >
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Total Biaya Pengajaran</label>
                  <input type="text" class="form-control uang" name="total_biaya_pengajaran" id="total_biaya_pengajaran" required="">
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Jumlah Disiplin</label>
                  <input type="number" class="form-control" name="jumlah_disiplin" id="jumlah_disiplin">
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Biaya Disiplin / Hari</label>
                  <input type="text" class="form-control uang" name="biaya_disiplin_per_hari" id="biaya_disiplin_per_hari" >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Total Biaya Disiplin</label>
                  <input type="text" class="form-control uang" name="total_biaya_disiplin" id="total_biaya_disiplin" required="">
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Jumlah Lain-lain</label>
                  <input type="number" class="form-control uang" name="jumlah_lain" id="jumlah_lain">
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Biaya lainnya / Hari</label>
                  <input type="text" class="form-control uang" name="biaya_lain_per_hari" id="biaya_lain_per_hari" >
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Total Biaya lainnya</label>
                  <input type="text" class="form-control uang" name="total_biaya_lain" id="total_biaya_lain">
                </div>


                 <!-- Tunjangan Kinerja -->
                <div class="col-md-12 input-group">
                  <label class="mt-5"><h5><strong>Tunjangan Kinerja</strong></h5></label> 
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Prosentase</label>
                  <input type="text" class="form-control" name="prosentase_tunjangan_kinerja" id="prosentase_tunjangan_kinerja"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Biaya Satuan</label>
                  <input type="text" class="form-control uang" name="satuan_biaya_tunjangan_kinerja" id="satuan_biaya_tunjangan_kinerja"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Total Biaya</label>
                  <input type="text" class="form-control uang" name="total_biaya_tunjangan_kinerja" id="total_biaya_tunjangan_kinerja"  >
                </div>



                <!-- Dosen S1 -->
                <div class="col-md-12 input-group">
                  <label class="mt-5"><h5><strong>Dosen S1</strong></h5></label> 
                </div>

                 <!-- Tunjangan S1-->
                 <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>Tunjangan S1</strong></h6></label> 
                </div>

                <div class="col-md-12">
                  <label class="mt-3">Total Biaya Tunjangan S1</label>
                  <input type="text" class="form-control uang" name="total_biaya_tujangan_essatu" id="total_biaya_tujangan_jabatan"  >
                </div>


                 <!-- Tunjangan Lain-lain/Jenjang Pendidikan -->
                 <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>Tunjangan Lain-lain/Jenjang Pendidikan </strong></h6></label> 
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Prosentase</label>
                  <input type="text" class="form-control" name="prosentase_biaya_lain_jenjang_pendidikan" id="prosentase_biaya_lain_jenjang_pendidikan"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Biaya Satuan</label>
                  <input type="text" class="form-control uang" name="satuan_biaya_lain_jenjang_pendidikan" id="satuan_biaya_lain_jenjang_pendidikan"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Total Biaya</label>
                  <input type="text" class="form-control uang" name="total_biaya_lain_jenjang_pendidikan" id="total_biaya_lain_jenjang_pendidikan"  >
                </div>

                <!-- Bonus Tambahan -->
                 <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>Bonus Tambahan</strong></h6></label> 
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Prosentase</label>
                  <input type="text" class="form-control" name="prosentase_bonus_tambahan" id="prosentase_bonus_tambahan"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Biaya Satuan</label>
                  <input type="text" class="form-control uang" name="satuan_biaya_bonus_tambahan" id="satuan_biaya_bonus_tambahan"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Total Biaya</label>
                  <input type="text" class="form-control uang" name="total_biaya_bonus_tambahan" id="total_biaya_bonus_tambahan"  >
                </div>

                <!-- BPJS -->
                 <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>BPJS</strong></h6></label> 
                </div>

                <div class="col-md-12">
                  <label class="mt-3">Total Biaya BPJS Kesehatan</label>
                  <input type="text" class="form-control uang" name="total_biaya_bpjs_kesehatan" id="total_biaya_bpjs_kesehatan"  >
                </div>
                <div class="col-md-12">
                  <label class="mt-3">Total Biaya BPJS Ketenagakerjaan</label>
                  <input type="text" class="form-control uang" name="total_biaya_bpjs_ketenagakerjaan" id="total_biaya_bpjs_ketenagakerjaan"  >
                </div>

                <!-- Tunjangan Jabatan-->
                 <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>Tunjangan Jabatan</strong></h6></label> 
                </div>

                <div class="col-md-12">
                  <label class="mt-3">Total Biaya Tunjangan Jabatan</label>
                  <input type="text" class="form-control uang" name="total_biaya_tujangan_jabatan" id="total_biaya_tujangan_jabatan"  >
                </div>

                <!-- Tunjangan S1-->
                 <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>Tunjangan S1</strong></h6></label> 
                </div>

                <div class="col-md-12">
                  <label class="mt-3">Total Biaya Tunjangan S1</label>
                  <input type="text" class="form-control uang" name="total_biaya_tujangan_jabatan" id="total_biaya_tujangan_jabatan"  >
                </div>

                <!-- Gaji tetap-->
                 <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>Gaji Tetap</strong></h6></label> 
                </div>

                <div class="col-md-4">
                  <label class="mt-3">Prosentase</label>
                  <input type="text" class="form-control" name="prosentase_gaji_tetap" id="prosentase_gaji_tetap"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Biaya Satuan</label>
                  <input type="text" class="form-control uang" name="satuan_biaya_gaji_tetap" id="satuan_biaya_gaji_tetap"  >
                </div>
                <div class="col-md-4">
                  <label class="mt-3">Total Biaya</label>
                  <input type="text" class="form-control uang" name="total_biaya_gaji_tetap" id="total_biaya_gaji_tetap"  >
                </div>

                <!-- Gaji tetap-->
                <div class="col-md-12 input-group">
                  <label class="mt-5"><h6><strong>Total Gaji</strong></h6></label> 
                </div>
                <div class="col-md-12">
                  <label class="mt-3">Total Gaji</label>
                  <input type="text" class="form-control uang" name="total_gaji" id="total_gaji"  >
                </div>
                <?php if (empty($data)) : ?>
                  <div class="col-auto mt-5">
                  <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-html="true" title="Upload Karyawan Terlebih Dahulu / Aktifkan Karyawan" disabled="">Tambah Data Gaji</button>
                </div>
                <?php else : ?>
                <div class="col-auto mt-5">
                  <button type="submit" name="tambah-data" class="btn btn-primary">Tambah Data Gaji</button>
                </div>
               <?php endif; ?>

              </table>
            </form>
          </div>

        </table>
      </form>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
</section>
    <!-- /.content -->

