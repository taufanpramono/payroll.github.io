<?php 

//=================================================
// Action Tambah (Create) Data Pengumuam
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


if (isset($_POST['add-pengumuman'])) {

	$admin_id					= '1';
	$judul_pengumuman			= $_POST['judul_pengumuman'];
	$isi_pengumuman		   		= $_POST['isi_pengumuman'];



	//execute to save data
	$save_data = mysqli_query ($con, "INSERT INTO pengumuman (admin_id, judul_pengumuman, isi_pengumuman) VALUES ('$admin_id','$judul_pengumuman','$isi_pengumuman') ");

	if ($save_data == true) {

		$_SESSION['data-allert']   = 'pengumumansukses';
		header ('location:../?pages=pengumuman');
		unset($_SESSION['judul-pengumuman']); 
		unset($_SESSION['isi_pengumuman']);
		exit;

	} else {

		$_SESSION['data-allert']   = 'pengumumangagal';
		$_SESSION['judul-pengumuman'] = $judul_pengumuman;
		$_SESSION['isi_pengumuman'] = $isi_pengumuman;
		header ('location:../?pages=tambah-pengumuman');
		exit;
	}


} else {

	header ('location:../?pages=404');
	exit;

}


 ?>