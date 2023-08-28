<?php 	


//============================================================================
// Module Pemanggil data untuk kebutuhan binding ke HTML Backend
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ===========================================================================

require '../konfigurasi/database.php';

function data_karyawan_aktif() {
 
	global $con;
    $query = "SELECT * FROM karyawan WHERE status='aktif'";
    $get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
        $array[] = $rows;
    }
    return $array;
    // var_dump($array);

}

function data_karyawan_kosong() {
	global $con;
	$query 			= "SELECT * FROM karyawan WHERE status='aktif'";
	$row   			= mysqli_query($con, $query);
	$execute_row 	= mysqli_num_rows ($row);   
	// var_dump($execute_row);
	return $execute_row;
}


function data_karyawan_nonaktif() {
 
	global $con;
    $query = "SELECT * FROM karyawan WHERE status='nonaktif'";
    $get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
        $array[] = $rows;
    }
    return $array;
    // var_dump($array);

}

function data_karyawan_nonaktif_kosong() {
	global $con;
	$query 			= "SELECT * FROM karyawan WHERE status='nonaktif'";
	$row   			= mysqli_query($con, $query);
	$execute_row 	= mysqli_num_rows ($row);   
	// var_dump($execute_row);
	return $execute_row;
}




function counter_data_karyawan() {

	global $con;
	$query 			= 'SELECT * FROM karyawan';
	$row   			= mysqli_query($con, $query);
	$rows 			= mysqli_num_rows ($row);
	
	// var_dump($rows);

	return $rows;
}


function view_data_kr($nip) {

	global $con;
	$query = "SELECT * FROM karyawan where nip='$nip'";
	$rows  = mysqli_query ($con, $query);
	$fetch = mysqli_fetch_assoc ($rows);

	return $fetch;


}

function data_gaji() {

	global $con;
	$query = "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.status = 'aktif'";
	$get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
        $array[] = $rows;
    }
    return $array;


}

function data_gaji_kosong() {
	global $con;
	$query 			= "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.status = 'aktif'";
	$row   			= mysqli_query($con, $query);
	$execute_row 	= mysqli_num_rows ($row);   
	// var_dump($execute_row);
	return $execute_row;
}


function counter_data_karyawan_aktif() {


	global $con;
	$query 				= "SELECT * FROM karyawan WHERE status='aktif'";
	$row				= mysqli_query ($con, $query);
	$execute_row		= mysqli_num_rows ($row);

	// var_dump($execute_row);

	return $execute_row; 			 

}

function counter_data_gaji() {


	global $con;
	$query 				= "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.status ='aktif'";
	$row				= mysqli_query ($con, $query);
	$execute_row		= mysqli_num_rows ($row);

	// var_dump($execute_row);

	return $execute_row; 			 

}


function data_karyawan_add_to_gk() {

	global $con;
    $query = "SELECT * FROM karyawan WHERE status='aktif'";
    $get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
        $array[] = $rows;
    }

  	return $array;
    // var_dump($array);
   

}

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

function get_data_admin() {

	global $con;
	$query = " SELECT * FROM admin WHERE admin_id='1'";
	$execute_query = mysqli_query ($con, $query);
	$fetch = mysqli_fetch_assoc ($execute_query);
	// var_dump($fetch);

	return $fetch;



}


function edit_data_gaji($id) {

	global $con;
    $query = "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE data_gaji.id_gaji = '$id' AND karyawan.status ='aktif'";
    $get_data = mysqli_query($con, $query);
    $array = [];
    while ($rows = mysqli_fetch_assoc($get_data)) {
        $array[] = $rows;
    }

  	return $array;
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

function edit_pengumuman($id) {

	global $con;
	$query 		= "SELECT * FROM pengumuman WHERE id_pengumuman='$id'";
	$get_data 	= mysqli_query ($con, $query);
	$fetch 		= mysqli_fetch_assoc ($get_data);

	return $fetch;



}


function connecting_sallary($nip) {

	global $con;
	$query 		= "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.nip = '$nip' ";
	$get_data   = mysqli_query($con, $query);
	$fetch 		= mysqli_num_rows ($get_data);
	return $fetch;

}




 ?>