<?php 

//=================================================
// Action processing Update pengumuman
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


if (isset($_POST['update-pengumuman'])) {

	$id_pengumuman			= $_POST['id_pengumuman'];
	$admin_id				= $_POST['admin_id'];
	$judul_pengumuman  		= $_POST['judul_pengumuman'];
	$isi_pengumuman 		= $_POST['isi_pengumuman'];
	

	//execute to save data
	$update_data = mysqli_query ($con, "UPDATE pengumuman SET 
		admin_id 			= '$admin_id',
		judul_pengumuman	= '$judul_pengumuman',
		isi_pengumuman 		= '$isi_pengumuman '

		WHERE id_pengumuman = '$id_pengumuman' ");

	if ($update_data == true) {

		$_SESSION['data-allert']   = 'updatepengumumansukses';
		header ('location:../?pages=pengumuman');
		exit;
	} else {

		$_SESSION['data-allert']   = 'updatepengumumangagal';
		header ('location:../?pages=pengumuman');
		exit;


	}

} else {


	header ('location:../?pages=404');
	exit;
}


 ?>