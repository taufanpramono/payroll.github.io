<?php 

//=============================================================
// Action del-nonaktif, area delete selection & aktifkan user
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

	
	$nip_karyawan 				= $_POST['nip-karyawan'];
	$extract_data_karyawan 		= implode(',', $nip_karyawan);


	//validasi jika karyawan memiliki data gaji
	$query				= "SELECT data_gaji.*, karyawan.* FROM data_gaji INNER JOIN karyawan ON data_gaji.id_karyawan = karyawan.id_karyawan WHERE karyawan.nip IN ($extract_data_karyawan)";
	$execute_query		= mysqli_query($con, $query);
	$data_validate		= mysqli_num_rows($execute_query);

	if ($data_validate > 0) {

		$_SESSION['data-allert'] = 'deletekaryawangagal';
		header ('location:../?pages=data-karyawan-nonaktif');
		exit;
	}
	
	//validasi data ada atau tidak
	$data 				= "SELECT * FROM karyawan WHERE nip IN ($extract_data_karyawan)";
	$data_query 		= mysqli_query($con, $data);
	$validasi_data 		= mysqli_num_rows($data_query);

	if ($validasi_data > 0 ) {

		$query     = "DELETE FROM karyawan WHERE nip IN($extract_data_karyawan)";
		$delete    = mysqli_query ($con, $query);

		if ($delete == true) {

		$_SESSION['data-allert'] = 'deletesukses';
		header ('location:../?pages=data-karyawan-nonaktif');
		exit;

		}

	}

	
	}


	if (!isset($_POST['nip-karyawan'])) {

	$_SESSION['data-allert'] = 'selectdata';
	header ('location:../?pages=data-karyawan-nonaktif');
	exit;

	}
	 
}


if (isset($_POST['aktifkan-karyawan'])) {


	if (isset($_POST['nip-karyawan'])) {
		
		$nip_karyawan    			= $_POST['nip-karyawan'];
		$extract_data_karyawan 		= implode (',', $nip_karyawan);

		//validasi data ada atau tidak
		$data 				= "SELECT * FROM karyawan WHERE nip IN ($extract_data_karyawan)";
		$data_query 		= mysqli_query($con, $data);
		$validasi_data 		= mysqli_num_rows($data_query);

		if ($validasi_data > 0 ) {

			$query = "UPDATE karyawan SET status = 'aktif' WHERE nip IN ($extract_data_karyawan)";
			$update = mysqli_query($con, $query);

			if ($update == true) {

			$_SESSION['data-allert']   = 'aktif';
			header ('location:../?pages=data-karyawan-nonaktif');
			exit;

		}


	} else {

		header ('location:../?pages=404');
		exit;



	}

	


	}

	if (!isset($_POST['nip-karyawan'])) {

		$_SESSION['data-allert'] = 'selectdata';
		header ('location:../?pages=data-karyawan-nonaktif');
		exit;


	}

}





die();








 ?>