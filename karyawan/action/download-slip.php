<?php 

//==========================================================================+
// memulai session dan mendapatkan seluruh data berdasarkan query
// melakukan fetch pada data yang telah ditentukan untuk kebutuhan parsing
// Create       : 10/04/2023
//==========================================================================+

//memulai session
session_start();
if (!isset( $_SESSION['karyawan_login'])) {
header('location:/');
exit;
}

//set database & plugin
require '../../konfigurasi/database.php';
require '../../plugin/tcpdf/tcpdf.php';
require 'module/getdata.php';

//ambil data berdasarkan id dan menggunakan method GET
if (isset($_GET['id'])) {
  
  $id_karyawan = $_SESSION['id_karyawan'];
  $id_gaji     = $_GET['id'];
  $row         = view_data_gaji($id_gaji, $id_karyawan);
  // var_dump($row);

  if ($row == NULL) {
    // echo '<script> location.replace("../?pages=404"); </script>';
  }


} else {

  // header ('location:../?pages=404');
  // exit;

}



//============================================================+
// Parsing semua data array ke string
// masukan semua hasil parsing ke variable
// Create       : 10/04/2023
//============================================================+


//parsing identitas set ke variable
$nama_karyawan                 = $row[0]['nama_karyawan'];
$nip                           = $row[0]['nip'];
$unit_kerja                    = $row[0]['unit_kerja'];
$divisi                        = $row[0]['divisi'];
$tanggal_gajian                = $row[0]['tanggal_gajian'];

//========================================================== 
//parjing area kehadiran set ke variable

if(empty($row[0]['jumlah_kehadiran'])) {
  $jumlah_kehadiran                 = '-';
} else {
  $jumlah_kehadiran                 = $row[0]['jumlah_kehadiran'];
}

if(empty($row[0]['biaya_kehadiran_per_hari'])) {
  $biaya_kehadiran_per_hari         = '-';
} else {
  $biaya_kehadiran_per_hari         = 'Rp. '.$row[0]['biaya_kehadiran_per_hari'];
}

if(empty($row[0]['total_biaya_kehadiran_per_hari'])) {
  $total_biaya_kehadiran            = '-';
} else {
  $total_biaya_kehadiran            = 'Rp. '.$row[0]['total_biaya_kehadiran_per_hari'];
  $total_biaya_kehadiran_process    = $row[0]['total_biaya_kehadiran_per_hari'];
}


//end of parsing transportasi set ke variable
//========================================================== 

//========================================================== 
//parsing transportasi set ke variable

if(empty($row[0]['jumlah_transportasi'])) {
  $jumlah_transportasi                = '-';
} else {
  $jumlah_transportasi                = $row[0]['jumlah_transportasi'];
}


if(empty($row[0]['biaya_transportasi_per_hari'])) {
  $biaya_transportasi_per_hari                = '-';
} else {
  $biaya_transportasi_per_hari                = 'Rp. '.$row[0]['biaya_transportasi_per_hari'];
}

if(empty($row[0]['total_biaya_transportasi'])) {
  $total_baiaya_transportasi                = '-';
} else {
  $total_baiaya_transportasi                = 'Rp. '.$row[0]['total_biaya_transportasi'];
  $total_baiaya_transportasi_process        = $row[0]['total_biaya_transportasi'];

}

//end of parsing transportasi set ke variable
//========================================================== 


//========================================================== 
//parsing pengajaran set ke variable


if(empty($row[0]['jumlah_pengajaran'])) {
  $jumlah_pengajaran                = '-';
} else {
  $jumlah_pengajaran                = $row[0]['jumlah_pengajaran'];
}

if(empty($row[0]['biaya_pengajaran_per_hari'])) {
  $biayara_satuan_pengajaran        = '-';
} else {
  $biayara_satuan_pengajaran        = 'Rp. '.$row[0]['biaya_pengajaran_per_hari'];
}

if(empty($row[0]['total_biaya_pengajaran'])) {
  $total_biaya_pengajaran           = '-';
} else {
  $total_biaya_pengajaran           = 'Rp. '.$row[0]['total_biaya_pengajaran'];
  $total_biaya_pengajaran_process   = $row[0]['total_biaya_pengajaran'];
}

//end of pengajaran set ke variable
//========================================================== 


//========================================================== 
//parsing disiplin set ke variable

if(empty($row[0]['jumlah_disiplin'])) {
  $jumlah_disiplin                = '-';
} else {
  $jumlah_disiplin                = $row[0]['jumlah_disiplin'];
}

if(empty($row[0]['biaya_disiplin_per_hari'])) {
  $biaya_satuan_disiplin                 = '-';
} else {
  $biaya_satuan_disiplin                 = 'Rp. '.$row[0]['biaya_disiplin_per_hari'];
}

if(empty($row[0]['total_biaya_disiplin'])) {
  $total_biaya_disiplin                  = '-';
} else {
  $total_biaya_disiplin                  = 'Rp. '.$row[0]['total_biaya_disiplin'];
  $total_biaya_disiplin_process          = $row[0]['total_biaya_disiplin'];
}

//end of disiplin set ke variable
//========================================================== 

//========================================================== 
//parsing biaya lainnya set ke variable


if(empty($row[0]['jumlah_lain'])) {
  $jumlah_lainnya                = '-';
} else {
  $jumlah_lainnya                = $row[0]['jumlah_lain'];
}
  
if(empty($row[0]['biaya_lain_per_hari'])) {
  $biaya_satuan_lainnya          = '-';
} else {
  $biaya_satuan_lainnya          = 'Rp. '.$row[0]['biaya_lain_per_hari'];
}

if(empty($row[0]['total_biaya_lain'])) {
  $biaya_total_lainnya           = '-';
} else {
  $biaya_total_lainnya           = 'Rp. '.$row[0]['total_biaya_lain'];
  $biaya_total_lainnya_process   = $row[0]['total_biaya_lain'];
}

//end of parsing biaya lainnya
//========================================================== 

//lakukan replacement pada simbol yang tidak di inginkan
$total_kehadiran    = str_replace('.', '', $total_biaya_kehadiran_process );
$total_transportasi = str_replace('.', '', $total_baiaya_transportasi_process);
$total_pengajaran   = str_replace('.', '', $total_biaya_pengajaran_process);
$total_disiplin     = str_replace('.', '', $total_biaya_disiplin_process);
$total_lainnya      = str_replace('.', '', $biaya_total_lainnya_process );

//jumlahkan data total
$total_kumulatif = $total_kehadiran + $total_transportasi + $total_pengajaran + $total_disiplin + $total_lainnya;

//kembalikan format 
$total = "Rp. " . number_format($total_kumulatif,0,',','.');

//================================================================================
//parsing tunjangan kinerja

if(empty($row[0]['prosentase_tunjangan_kinerja'])) {
  $prosentase_tunjangan_kinerja            = '-';
} else {
  $prosentase_tunjangan_kinerja            = $row[0]['prosentase_tunjangan_kinerja'];
}

if(empty($row[0]['satuan_biaya_tunjangan_kinerja'])) {
  $satuan_biaya_tunjangan_kinerja          = '-';
} else {
  $satuan_biaya_tunjangan_kinerja          = 'Rp. '.$row[0]['satuan_biaya_tunjangan_kinerja'];
}


if(empty($row[0]['total_biaya_tunjangan_kinerja'])) {
  $total_biaya_tunjangan_kinerja           = '-';
} else {
  $total_biaya_tunjangan_kinerja           = 'Rp. '.$row[0]['total_biaya_tunjangan_kinerja'];
}


// end of parsing tunjangan kinerja
//==================================================================================

//parsing Tunjangan Lain-Lain / Jenjang Pendidikan

if(empty($row[0]['prosentase_biaya_lain_jenjang_pendidikan'])) {
  $prosentase_biaya_lain_jenjang_pendidikan    = '-';
} else {
  $prosentase_biaya_lain_jenjang_pendidikan    = $row[0]['prosentase_biaya_lain_jenjang_pendidikan'];
}

if(empty($row[0]['satuan_biaya_lain_jenjang_pendidikan'])) {
  $satuan_biaya_lain_jenjang_pendidikan    = '-';
} else {
  $satuan_biaya_lain_jenjang_pendidikan    = 'Rp. '.$row[0]['satuan_biaya_lain_jenjang_pendidikan'];
}


if(empty($row[0]['total_biaya_lain_jenjang_pendidikan'])) {
  $total_biaya_lain_jenjang_pendidikan    = '-';
} else {
  $total_biaya_lain_jenjang_pendidikan    = 'Rp. '.$row[0]['total_biaya_lain_jenjang_pendidikan'];
}


// end of parsing tunjangan kinerja
//==================================================================================
//parsing Tunjangan Bonus Tambahan

if(empty($row[0]['prosentase_bonus_tambahan'])) {
  $prosentase_bonus_tambahan    = '-';
} else {
  $prosentase_bonus_tambahan    = $row[0]['prosentase_bonus_tambahan'];
}


if(empty($row[0]['satuan_biaya_bonus_tambahan'])) {
  $satuan_biaya_bonus_tambahan     = '-';
} else {
  $satuan_biaya_bonus_tambahan     = 'Rp. '.$row[0]['satuan_biaya_bonus_tambahan'];
}


if(empty($row[0]['total_biaya_bonus_tambahan'])) {
  $total_biaya_bonus_tambahan      = '-';
} else {
  $total_biaya_bonus_tambahan      = 'Rp. '.$row[0]['total_biaya_bonus_tambahan'];
}


// end of parsing Tunjangan Bonus Tambahan
//==================================================================================
//parsing tunjangan essatu
 
  
if(empty($row[0]['total_biaya_tujangan_essatu'])) {
  $total_biaya_tujangan_essatu       = '-';
} else {
  $total_biaya_tujangan_essatu       = 'Rp. '.$row[0]['total_biaya_tujangan_essatu'];
}

//end of parsing tunjangan essatu
//==================================================================================
//parsing BPJS Kesehatan 

if(empty($row[0]['total_biaya_bpjs_kesehatan'])) {
  $total_biaya_bpjs_kesehatan       = '-';
} else {
  $total_biaya_bpjs_kesehatan       = 'Rp. '.$row[0]['total_biaya_bpjs_kesehatan'];
}


// end of parsing BPJS Kesehatan 
//==================================================================================
//parsing BPJS Ketenaga kerjaan

if(empty($row[0]['total_biaya_bpjs_ketenagakerjaan'])) {
  $total_biaya_bpjs_ketenagakerjaan       = '-';
} else {
  $total_biaya_bpjs_ketenagakerjaan       = 'Rp. '.$row[0]['total_biaya_bpjs_ketenagakerjaan'];
}

// end of parsing BPJS Ketenaga kerjaan 
//==================================================================================

//tunjangan jabatan

if(empty($row[0]['total_biaya_tujangan_jabatan'])) {
  $total_biaya_tunjangan_jabatan        = '-';
} else {
  $total_biaya_tunjangan_jabatan       = 'Rp. '.$row[0]['total_biaya_tujangan_jabatan'];
}


// end of tunjangan jabatan
//==================================================================================
//parsing gaji tetap 


if(empty($row[0]['prosentase_gaji_tetap'])) {
  $prosentase_gaji_tetap        = '-';
} else {
  $prosentase_gaji_tetap       = $row[0]['prosentase_gaji_tetap'];
}


if(empty($row[0]['satuan_biaya_gaji_tetap'])) {
  $satuan_biaya_gaji_tetap        = '-';
} else {
  $satuan_biaya_gaji_tetap        = 'Rp. '.$row[0]['satuan_biaya_gaji_tetap'];
}

if(empty($row[0]['total_biaya_gaji_tetap'])) {
  $total_biaya_gaji_tetap       = '-';
} else {
  $total_biaya_gaji_tetap        = 'Rp. '.$row[0]['total_biaya_gaji_tetap'];
}

// end of gaji tetap 
//==================================================================================
//parsing total gaji 


if(empty($row[0]['total_gaji'])) {
  $total_gaji_keseluruhan       = '-';
} else {
  $total_gaji_keseluruhan        = 'Rp. '.$row[0]['total_gaji'];
}

// end of total gaji  
//==================================================================================


//============================================================+
// Memulai Setup PDF 
// Memasukan seluruh code berdasarkan dokumentasi plugin TCPDF
// Create       : 10/04/2023
//============================================================+


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor($nama_karyawan);
$pdf->setTitle('Slip Gaji - '. $nama_karyawan . '- '. $nip .' - '.$tanggal_gajian);
$pdf->setSubject('Slip Gaji - '. $nama_karyawan . '- '. $nip .' - '.$tanggal_gajian);
$pdf->setKeywords('Slip Gaji - '. $nama_karyawan . '- '. $nip .' - '.$tanggal_gajian);


// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 9, '', true);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set image scale factor
$pdf->setImageScale(1.3);



// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();





// Set content and binding the variable
$html = <<<EOD

   <br />
  <h3>SLIP GAJI PEGAWAI NMC GROUP</h3>
  <p></p>
  <table border="0" >
  <tr>
    <td>Nomor Induk Pegawai (NIP)</td><td>: $nip</td><td></td> 
  </tr>
  <tr>
    <td>Nama Karyawan</td><td>: $nama_karyawan</td><td></td> 
  </tr>
  <tr>
    <td>Unit Kerja</td><td>: $unit_kerja</td><td></td> 
  </tr>
  <tr>
    <td>Divisi</td><td>: $divisi</td><td></td> 
  </tr>
   <tr>
    <td>Tanggal Gajian</td><td>: $tanggal_gajian</td><td></td> 
  </tr>
  </table>

  <p></p>
  <h4>GAJI FLUKTUATIF :</h4><br />
  <table border="0">
  <tr>
    <td>Kehadiran</td>
    <td><span align="center">$jumlah_kehadiran</span></td>
    <td>$biaya_kehadiran_per_hari</td>
    <td>$total_biaya_kehadiran</td>
    <td></td>
  </tr>
  <tr>
    <td>Transportasi</td>
    <td><span align="center">$jumlah_transportasi</span></td>
    <td>$biaya_transportasi_per_hari</td>
    <td>$total_baiaya_transportasi</td>
    <td></td>
  </tr>
  <tr>
    <td>Pengajaran</td>
    <td><span align="center">$jumlah_pengajaran</span></td>
    <td>$biayara_satuan_pengajaran</td>
    <td>$total_biaya_pengajaran </td>
    <td></td>
  </tr>
   <tr>
    <td>Disiplin</td>
    <td><span align="center">$jumlah_disiplin</span></td>
    <td>$biaya_satuan_disiplin</td>
    <td>$total_biaya_disiplin</td>
    <td></td>
  </tr>
   <tr>
    <td>Lain-Lainnya</td>
    <td><span align="center">$jumlah_lainnya</span></td>
    <td>$biaya_satuan_lainnya</td>
    <td>$biaya_total_lainnya</td>
    <td></td>
  </tr>
    <tr>
    <td><h4>TOTAL</h4></td>
    <td></td>
    <td></td>
    <td></td>
    <td><h4>$total</h4></td>
  </tr>
  </table>

  <p></p>
  <h4>TUNJANGAN KINERJA :</h4><br />
  <table border="0">
  <tr>
    <td>Prosentase</td>
    <td><span align="center">$prosentase_tunjangan_kinerja</span></td>
    <td>$satuan_biaya_tunjangan_kinerja</td>
    <td>$total_biaya_tunjangan_kinerja</td>
    <td></td>
  </tr>
  <tr>
    <td><h4>TOTAL</h4></td>
    <td></td>
    <td></td>
    <td></td>
    <td><h4>$total_biaya_tunjangan_kinerja</h4></td>
  </tr>
  </table>
  
  <p></p>
  <h4>DOSEN S1 :</h4><br />
  <table border="0">
  <tr>
    <td>Tunjangan Lain-Lain / Jenjang Pendidikan</td>
    <td><span align="center">$prosentase_biaya_lain_jenjang_pendidikan</span></td>
    <td>$satuan_biaya_lain_jenjang_pendidikan </td>
    <td>$total_biaya_lain_jenjang_pendidikan </td>
    <td>$total_biaya_lain_jenjang_pendidikan</td>
  </tr>
  <tr>
    <td>Bonus Tambahan</td>
    <td><span align="center">$prosentase_bonus_tambahan</span></td>
    <td>$satuan_biaya_bonus_tambahan</td>
    <td>$total_biaya_bonus_tambahan</td>
    <td>$total_biaya_bonus_tambahan</td>
  </tr>
  <tr>
    <td>Tunjangan S1</td>
    <td><span align="center"></span></td>
    <td></td>
    <td></td>
    <td>$total_biaya_tujangan_essatu</td>
  </tr>
  <tr>
    <td>BPJS Kesehatan</td>
    <td><span align="center"></span></td>
    <td></td>
    <td></td>
    <td>$total_biaya_bpjs_kesehatan</td>
  </tr>
  <tr>
    <td>BPJS Ketenagakerjaan</td>
    <td><span align="center"></span></td>
    <td></td>
    <td></td>
    <td>$total_biaya_bpjs_ketenagakerjaan</td>
  </tr>
  <tr>
    <td>Tunjangan Jabatan</td>
    <td><span align="center"></span></td>
    <td></td>
    <td></td>
    <td>$total_biaya_tunjangan_jabatan</td>
  </tr>
  <tr>
    <td>Gaji Tetap</td>
    <td><span align="center">$prosentase_gaji_tetap</span></td>
    <td>$satuan_biaya_gaji_tetap </td>
    <td>$total_biaya_gaji_tetap</td>
    <td>$total_biaya_gaji_tetap</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><span align="right">+</span></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <td><h4>TOTAL KESELURUHAN</h4></td>
    <td></td>
    <td></td>
    <td></td>
    <td><h4>$total_gaji_keseluruhan </h4></td>
  </tr>
  </table>

  <p></p><p></p>
  <table border="0">
  <tr>
    <td></td>
    <td><span align="center"> 
    Malang, $tanggal_gajian <br /> 
    <img src= "../../asset/img/ttd.png" style="width:100px;" > <br /> <br /> 
    Bendahara Gaji
    </span>
    </td>
  </tr>
  </table>

EOD;


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output('Slip Gaji - '.$nama_karyawan.'- '.$nip.' - '.$tanggal_gajian.'.pdf', 'D');


?>