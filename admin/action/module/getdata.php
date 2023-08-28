<?php 

//=================================================
// Module Pemanggil data untuk kebutuhan action
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================




require '../../konfigurasi/database.php';


function view_data_gaji($id) {
    global $con;
    $query = "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE data_gaji.id_gaji = '$id' AND karyawan.status ='aktif'";
    $get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
      $array[] = $rows;
    }
    return $array;
  }




  




?>