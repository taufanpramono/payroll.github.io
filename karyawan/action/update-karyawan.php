<?php 

session_start();
if (!isset( $_SESSION['karyawan_login'])) {
header('location:/');
exit;

}


require '../../konfigurasi/database.php';


if (isset($_POST['update-karyawan'])) {

	$id_karyawan			= $_POST['id_karyawan'];
	$nama_karyawan 			= $_POST['nama_karyawan'];
	$nip		   			= $_POST['nip'];
	$unit_kerja	   			= $_POST['unit_kerja'];
	$divisi  				= $_POST['divisi'];
	$password	   			= mysqli_escape_string($con, $_POST['password']);
	$konfirm_password	    = mysqli_escape_string($con, $_POST['konfirm_password']);


	//validasi konfirmasi password
	if ($password !== $konfirm_password  ) {
		$_SESSION['data-allert']   = 'erorpasswd';
		unset($_SESSION['nama_karyawan']);
		unset($_SESSION['nip']);
		$_SESSION['nama_karyawan'] = $nama_karyawan;
		$_SESSION['nip']		   = $nip;
		header ('location:../?pages=akun');
		exit;
	}



	if (empty($password)) {

		//execute to save data
		$update_data = mysqli_query ($con, "UPDATE karyawan SET 
		nip 			= '$nip',
		nama_karyawan 	= '$nama_karyawan',
		unit_kerja 		= '$unit_kerja',
		divisi 			= '$divisi'  

		where id_karyawan = '$id_karyawan' ");

		if ($update_data == true) {

			$_SESSION['data-allert']   = 'updatekaryawansukses';
			unset($_SESSION['nama_karyawan']);
			unset($_SESSION['nip']);
			$_SESSION['nama_karyawan'] = $nama_karyawan;
			$_SESSION['nip']		   = $nip;
			header ('location:../?pages=akun');
			exit;
		} 


	} 


	if (!empty($password)) {

		//encrypt data to hash 
		$password = password_hash($password, PASSWORD_DEFAULT);
		// echo $password;

		//execute to save data
		$update_data2 = mysqli_query ($con, "UPDATE karyawan SET 
		nip 			= '$nip',	
		nama_karyawan 	= '$nama_karyawan',
		unit_kerja 		= '$unit_kerja',
		divisi 			= '$divisi',
		password        = '$password'  

		where id_karyawan = '$id_karyawan' ");

		if ($update_data2 == true) {
			$_SESSION['data-allert']  = 'updatekaryawanpasswordsukses';
			header ('location:../?pages=akun');
			exit;
	}


	
}

	


} else {
	header ('location:../?pages=404');
	exit;

}


 ?>