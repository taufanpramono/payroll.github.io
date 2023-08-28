  <?php 


  
  require 'module/getdata.php';
  if (isset($_GET['id'])) {

    $id_gaji = $_GET['id'];
    $row     = view_data_gaji($id_gaji);
    // var_dump($row);

    if ($row == NULL) {
    echo '<script> location.replace("?pages=404"); </script>';
    }


  } else {

    echo '<script> location.replace("?pages=404"); </script>';
    exit;

  }


  
   ?>


    <section class="content">
      <div class="container-fluid" style="padding-bottom: 100px">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary" >
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
             
              <!-- info row -->
              <div class="row invoice-info" style="padding-bottom: 50px">
                <div class="col-sm-8 invoice-col">
                  <address>
                    <table>
                      <tbody>
                        <tr>
                          <td class="pr-4"><strong>NIP</strong></td>
                          <td><strong>:</strong></td>
                          <td class="pl-4"><strong><?= @$row[0]['nip'];?></strong></td>
                        </tr>
                        <tr>
                          <td class="pr-4">Nama</td>
                          <td>:</td>
                          <td class="pl-4"><?= @$row[0]['nama_karyawan'];?></td>
                        </tr>
                        <tr>
                          <td class="pr-4">Unit Kerja</td>
                          <td>:</td>
                          <td class="pl-4"><?= @$row[0]['unit_kerja'];?></td>
                        </tr>
                        <tr>
                          <td class="pr-4">Divisi</td>
                          <td>:</td>
                          <td class="pl-4"><?= @$row[0]['divisi'];?></td>
                        </tr>
                        <tr>
                          <td class="pr-4">Tanggal Gajian</td>
                          <td>:</td>
                          <td class="pl-4"><?= @$row[0]['tanggal_gajian'];?></td>
                        </tr>
                      </tbody>
                    </table>
                  </address>
                </div>            
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row" style="padding-bottom: 50px">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                     <!-- Gaji Fluktuatif -->
                    <thead>
                    <tr>
                      <th>GAJI FLUKTUATIF</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Kehadiran</td>
                      <td><?= @$row[0]['jumlah_kehadiran'];?></td>
                      <td class="rupiah"><?= @$row[0]['biaya_kehadiran_per_hari'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_kehadiran_per_hari'];?>  
                      <?php 
                        $total_biaya_kehadiran = str_replace('.', '', @$row[0]['total_biaya_kehadiran_per_hari']);
                      ?>
                      </td>  
                      <td></td>                    
                    <tr>
                    <tr>
                      <td>Transportasi</td>
                      <td><?= @$row[0]['jumlah_transportasi'];?></td>
                      <td class="rupiah"><?= @$row[0]['biaya_transportasi_per_hari'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_transportasi'];?>
                      
                       <?php 
                        $total_biaya_transportasi = str_replace('.', '', @$row[0]['total_biaya_transportasi']);
                      ?>
                      </td> 
                      <td></td>                     
                    <tr>
                    <tr>
                      <td>Pengajaran</td>
                      <td><?= @$row[0]['jumlah_pengajaran'];?></td>
                      <td class="rupiah"><?= @$row[0]['biaya_pengajaran_per_hari'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_pengajaran'];?>
                      <?php 
                        $total_biaya_pengajaran = str_replace('.', '', @$row[0]['total_biaya_pengajaran']);
                      ?>
                      </td> 
                      <td></td>                     
                    <tr>
                    <tr>
                      <td>Disiplin</td>
                      <td><?= @$row[0]['jumlah_disiplin'];?></td>
                      <td class="rupiah"><?= @$row[0]['biaya_disiplin_per_hari'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_disiplin'];?>
                      <?php 
                        $total_biaya_disiplin = str_replace('.', '', @$row[0]['total_biaya_disiplin']);
                      ?>
                      </td>
                      <td></td>                     
                    <tr>
                    <tr>
                      <td>Lainnya</td>
                      <td><?= @$row[0]['jumlah_lain'];?></td>
                      <td class="rupiah"><?= @$row[0]['biaya_lain_per_hari'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_lain'];?>
                      <?php 
                        $total_biaya_lain = str_replace('.', '', @$row[0]['total_biaya_lain']);
                      ?>
                      </td>
                      <td></td>                          
                    <tr>
                    <tr>
                      <td><strong>TOTAL</strong></td>
                      <td></td>
                      <td></td>  
                      <td></td> 
                      <td><?php 
                      @$total_gaji_kumulatif = $total_biaya_kehadiran + $total_biaya_transportasi + $total_biaya_pengajaran + $total_biaya_disiplin + $total_biaya_lain;
                      $total_keseluruhan = "Rp. " . number_format($total_gaji_kumulatif,0,',','.');
                      echo $total_keseluruhan;
                       ?></td>                     
                    <tr>
                    <!-- tunjangan kinerja -->
                    <thead>
                    <tr>
                      <th>TUNJANGAN KINERJA</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Prosentase</td>
                      <td><?= @$row[0]['prosentase_tunjangan_kinerja'];?></td>
                      <td class="rupiah"><?= @$row[0]['satuan_biaya_tunjangan_kinerja'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_tunjangan_kinerja'];?></td>  
                      <td></td>                    
                    <tr>
                    
                    <tr>
                      <td><strong>TOTAL</strong></td>
                      <td></td>
                      <td></td>  
                      <td></td> 
                      <td class="rupiah"><?= @$row[0]['total_biaya_tunjangan_kinerja']; ?></td>                     
                    <tr >

                    <!-- Dosen S1 -->
                    <thead>
                    <tr>
                      <th>DOSEN S1</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Tunjangan Lain-Lain / Jenjang Pendidikan</td>
                      <td><?= @$row[0]['prosentase_biaya_lain_jenjang_pendidikan'];?></td>
                      <td class="rupiah"><?= @$row[0]['satuan_biaya_lain_jenjang_pendidikan'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_lain_jenjang_pendidikan'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_lain_jenjang_pendidikan'];?></td>                    
                    <tr>
                    <tr>
                      <td>Bonus Tambahan</td>
                      <td><?= @$row[0]['prosentase_bonus_tambahan'];?></td>
                      <td class="rupiah"><?= @$row[0]['satuan_biaya_bonus_tambahan'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_bonus_tambahan'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_bonus_tambahan'];?></td>                    
                    <tr>
                    <tr>
                      <td>Tunjangan S1</td>
                      <td></td>
                      <td></td>  
                      <td></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_tujangan_essatu'];?></td>                    
                    <tr>
                    <tr>
                      <td>BPJS Kesehatan</td>
                      <td></td>
                      <td></td>  
                      <td></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_bpjs_kesehatan'];?></td>                    
                    <tr>

                    <tr>
                      <td>BPJS Ketenagakerjaan </td>
                      <td></td>
                      <td></td>  
                      <td></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_bpjs_ketenagakerjaan'];?></td>                    
                    <tr>
                    <tr>
                      <td>Tunjangan Jabatan </td>
                      <td></td>
                      <td></td>  
                      <td></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_tujangan_jabatan'];?></td>                    
                    <tr>  
                    <tr>
                      <td>Gaji Tetap </td>
                      <td><?= @$row[0]['prosentase_gaji_tetap'];?></td>
                      <td class="rupiah"><?= @$row[0]['satuan_biaya_gaji_tetap'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_gaji_tetap'];?></td>  
                      <td class="rupiah"><?= @$row[0]['total_biaya_gaji_tetap'];?></td>                    
                    <tr>
                    
                    <tr>
                      <td><strong>TOTAL KESELURUHAN</strong></td>
                      <td></td>
                      <td></td>  
                      <td></td> 
                      <td class="rupiah"><?= @$row[0]['total_gaji']; ?></td>                     
                    <tr>


      
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Informasi Penting :</p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Sistem Payrol ini tidak melakukan penjumlahan secara otomatis, Mohon melakukan input secara hati-hati agar seluruh data valid dan benar. <br><br><br>
                  </p>
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                 <!--  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                  <a href="?pages=data-gaji"  type="button" rel="noopener" class="btn btn-warning " style="margin-right: 5px;"><i class="fas fa-arrow-circle-left"></i> Kembali </a>
                  <a href="action/download-gaji.php?id=<?= @$row[0]['id_gaji'];?>" target="_blank"  type="button" class="btn btn-primary float-right" name="print" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Download PDF
                  </a>

                  <a href="?pages=edit-data-gaji&id=<?= @$row[0]['id_gaji'];?>&from=view" type="button" class="btn btn-info float-right" style="margin-right: 5px;">
                    <i class="fas fa-pen"></i> Edit Data
                  </a>
                  
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  
 