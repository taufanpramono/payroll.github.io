<?php 

require '../../konfigurasi/database.php';


function view_data_gaji() {
    global $con;
    $params = func_get_args();
    // var_dump($params);

    $id_slip      = $params[0];
    $id_karyawan  = $params[1];

    $query = "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE data_gaji.id_gaji = '$id_slip' AND karyawan.status ='aktif' AND karyawan.id_karyawan='$id_karyawan'";
    $get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
      $array[] = $rows;
    }
    return $array;
  }




  




?>