<?php 

//=================================================
// Action processing Update Data admin
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


if (isset($_POST['update-admin'])) {

	$admin_id				= $_POST['id_admin'];
	$nama_admin				= $_POST['nama_admin'];
	$username		   		= $_POST['username'];
	$password	   			= mysqli_escape_string($con, $_POST['password']);
	$konfirm_password	    = mysqli_escape_string($con, $_POST['konfirm_password']);




	//validasi konfirmasi password
	if ($password !== $konfirm_password  ) {
		$_SESSION['data-allert']   = 'erorpasswd';
		header ('location:../?pages=akun');
		exit;
	}



	if (empty($password)) {

		//execute to save data
		$update_data = mysqli_query ($con, "UPDATE admin SET 
		nama_admin 		= '$nama_admin',
		username 		= '$username'
		where admin_id = '$admin_id' ");

		if ($update_data == true) {

			$_SESSION['data-allert']   = 'updateadminsukses';
			header ('location:../?pages=akun');
			exit;
		} 


	} 


	if (!empty($password)) {

		//encrypt data to hash 
		$password = password_hash($password, PASSWORD_DEFAULT);
		echo $password;

		//execute to save data
		$update_data2 = mysqli_query ($con, "UPDATE admin SET 
		nama_admin 		= '$nama_admin',
		username 		= '$username',
		password        = '$password'  

		where admin_id = '$admin_id'");

		if ($update_data2 == true) {
			$_SESSION['data-allert']  = 'updateadminsuksesdanpassword';
			unset($_SESSION['nama_admin']);
			$_SESSION['nama_admin']   =  $nama_admin;
			header ('location:../?pages=akun');
			exit;
		}


	
}

	


} else {


	header ('location:../?pages=404');
	exit;



}


 ?>