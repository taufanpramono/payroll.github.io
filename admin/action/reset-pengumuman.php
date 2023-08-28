<?php 

//=================================================
// Action processing Unsets SESSION pengumuman
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================



session_start();
if (!isset( $_SESSION['admin_login'])) {
header('location:/');
exit;
}

if ( (empty($_SESSION['judul-pengumuman']))  || (empty($_SESSION['isi_pengumuman'])) ) {

	$_SESSION['data-allert']   = 'resetpengumumangagal';
	header ('location:../?pages=tambah-pengumuman');

} else {

	unset($_SESSION['judul-pengumuman']); 
	unset($_SESSION['isi_pengumuman']);
	$_SESSION['data-allert']   = 'resetpengumumansukses';
	header ('location:../?pages=tambah-pengumuman');

}





 ?>