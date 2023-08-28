<?php 

//=================================================
// Delete Pengumuman
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
	
	if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//validasi data ada atau tidak
	$data 				= "SELECT * FROM pengumuman WHERE id_pengumuman='$id'";
	$data_query 		= mysqli_query($con, $data);
	$validasi_data 		= mysqli_num_rows($data_query);

	if ($validasi_data > 0 ) {

		$query = "DELETE FROM pengumuman WHERE id_pengumuman='$id'";
		$delete = mysqli_query($con, $query);

		if ($delete == true) {

		$_SESSION['data-allert'] = 'deletepengumumansukses';
		header ('location:../?pages=pengumuman');
		}

	} else {


		$_SESSION = [];
		session_unset();
		session_destroy();
		header('location:/');
		exit;
		}



	}


	
	
 ?>