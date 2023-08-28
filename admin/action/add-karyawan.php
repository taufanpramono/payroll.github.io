<?php 

//=================================================
// Action Tambah (Create) Data Karyawan Manual
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================


session_start();
if (!isset( $_SESSION['admin_login'])) {
header('location:/');
exit;
}

require '../../konfigurasi/database.php';


if (isset($_POST['tambah'])) {


	$nama_karyawan 			= $_POST['nama_karyawan'];
	$nip		   			= $_POST['nip'];
	$unit_kerja	   			= $_POST['unit_kerja'];
	$divisi  				= $_POST['divisi'];
	$password	   			= mysqli_escape_string($con, $_POST['password']);
	$konfirm_password	    = mysqli_escape_string($con, $_POST['konfirm_password']);
	$status					= $_POST['status'];


	//validasi konfirmasi password
	if ($password !== $konfirm_password  ) {

		$_SESSION['data-allert']   = 'erorpasswd';
		$_SESSION['nama_karyawan'] = $nama_karyawan;
		$_SESSION['nip'] 		   = $nip;
		$_SESSION['unit_kerja']    = $unit_kerja;
		$_SESSION['divisi']    	   = $divisi;

		header ('location:../?pages=tambah-data-karyawan');
		exit;
	}


	//validasi double data 
	$validasi = mysqli_num_rows(mysqli_query($con, "SELECT * FROM karyawan where nip='$nip'"));
	if ($validasi > 0) {

		$_SESSION['data-allert']   = 'doubledata';
		$_SESSION['nama_karyawan'] = $nama_karyawan;
		$_SESSION['nip'] 		   = $nip;
		$_SESSION['unit_kerja']    = $unit_kerja;
		$_SESSION['divisi']    	   = $divisi;
		header ('location:../?pages=tambah-data-karyawan');
		exit;

	}

	//encrypt data to hash 
	$password = password_hash($password, PASSWORD_DEFAULT);
	// echo $password;


	//execute to save data
	$save_data = mysqli_query ($con, "INSERT INTO karyawan (nama_karyawan, nip, unit_kerja, divisi, password, status) VALUES ('$nama_karyawan','$nip','$unit_kerja','$divisi','$password','$status') ");

	if ($save_data == true) {

		$_SESSION['data-allert']   = 'karyawansukses';
		unset($_SESSION['nama_karyawan']);
		unset($_SESSION['nip']);
		unset($_SESSION['unit_kerja']);
		unset($_SESSION['divisi']);
		header ('location:../?pages=data-karyawan-nonaktif');
		exit;

	} 


} else {

	header ('location:../?pages=404');
	exit;

}


 ?>