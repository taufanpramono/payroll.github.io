<?php  

//=============================================================
// Action del-aktif, area delete selection & nonaktifkan user
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ============================================================


session_start();
if (!isset( $_SESSION['admin_login'])) {
header('location:/');
exit;
}

require '../../konfigurasi/database.php';


if (isset($_POST['hapus-karyawan'])) {


	if (isset($_POST['nip-karyawan'])) {

	$nip_karyawan = $_POST['nip-karyawan'];
	$compressed_nip_karyawan = implode(',', $nip_karyawan);


	//validasi jika karyawan memiliki data gaji
	$query				= "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.nip IN ($compressed_nip_karyawan)";
	$execute_query		= mysqli_query($con, $query);
	$data_validate		= mysqli_num_rows($execute_query);

	if ($data_validate > 0) {

		$_SESSION['data-allert'] = 'deletekaryawangagal';
		header ('location:../?pages=data-karyawan-aktif');
		exit;
	}


	//validasi data ada atau tidak
	$data 				= "SELECT * FROM karyawan WHERE nip IN ($compressed_nip_karyawan)";
	$data_query 		= mysqli_query($con, $data);
	$validasi_data 		= mysqli_num_rows($data_query);

	if ($validasi_data > 0 ) {

		$query = "DELETE FROM karyawan WHERE nip IN ($compressed_nip_karyawan)";
		$delete = mysqli_query($con, $query);

		if ($delete == true) {

		$_SESSION['data-allert'] = 'deletesukses';
		header ('location:../?pages=data-karyawan-aktif');
		exit;
		}


	} else {

		header ('location:../?pages=404');
		exit;
	}

	}

	if (!isset($_POST['nip-karyawan'])) {

		$_SESSION['data-allert'] = 'selectdata';
		header ('location:../?pages=data-karyawan-aktif');
		exit;

	}

}





if (isset($_POST['nonaktifkan-karyawan'])) {


	if (isset($_POST['nip-karyawan'])) {

	$nip_karyawan = @$_POST['nip-karyawan'];
	// var_dump($nip_karyawan);

	$compressed_nip_karyawan = implode(',', $nip_karyawan);
	// echo $compressed_nip_karyawan;


	//validasi data ada atau tidak
	$data 				= "SELECT * FROM karyawan WHERE nip IN ($compressed_nip_karyawan)";
	$data_query 		= mysqli_query($con, $data);
	$validasi_data 		= mysqli_num_rows($data_query);

	if ($validasi_data > 0 ) {

		$query = "UPDATE karyawan SET status = 'nonaktif' WHERE nip IN ($compressed_nip_karyawan)";
		$update = mysqli_query($con, $query);

		if ($update == true) {

		$_SESSION['data-allert']   = 'nonaktif';
		header ('location:../?pages=data-karyawan-aktif');
		exit;

		}


	} else {

		header ('location:../?pages=404');
		exit;



	}

  }


  if (!isset($_POST['nip-karyawan'])) {


  		$_SESSION['data-allert'] = 'selectdata';
		header ('location:../?pages=data-karyawan-aktif');
		exit;



  }





}




die();

?>