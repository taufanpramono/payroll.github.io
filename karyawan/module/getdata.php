<?php 

//==========================================================================+
// Module Pemanggilan data
// seluruh pemanggilan data dilakukan di area ini
// Create       : 10/04/2023
//==========================================================================+

require '../konfigurasi/database.php';

function get_data_slip_gaji($id) {

	global $con;
	$query = "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.id_karyawan = '$id' AND karyawan.status ='aktif'";

	$get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
        $array[] = $rows;
    }
    return $array;



}


function edit_data_karyawan ($id) {

    global $con;
    $query = "SELECT * FROM karyawan WHERE id_karyawan='$id'";
    $execute_query = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc ($execute_query);

    return $fetch;

}


function data_slip_kosong($id) {

    global $con;
    $query = "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.id_karyawan = '$id' AND karyawan.status ='aktif'";
    $execute_query = mysqli_query($con, $query);
    $checkdata = mysqli_num_rows($execute_query);

    return $checkdata;

}

function data_slip_kosong_karena_nonaktif($id) {

    global $con;
    $query =  "SELECT * FROM karyawan WHERE id_karyawan='$id' AND status ='aktif'";
    $execute_query = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($execute_query);
    return $fetch;


}


function pengumuman() {
    global $con;
    $query = "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC LIMIT 0,4";
    $get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
        $array[] = $rows;
    }

    return $array;
}



function status_karyawan_nonaktif($id) {

    global $con;
    $query = "SELECT * FROM karyawan WHERE id_karyawan='$id' AND status ='aktif'";
    $execute_query = mysqli_query($con, $query);
    $fetch = mysqli_fetch_assoc($execute_query);
    return $fetch;

}



 ?>