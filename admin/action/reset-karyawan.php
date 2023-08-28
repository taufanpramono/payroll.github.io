<?php 

//=================================================
// Action processing unset SESSION add karyawan
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================



session_start();
if (!isset( $_SESSION['admin_login'])) {
header('location:/');
exit;
}

if ( (empty($_SESSION['nama_karyawan']))  || (empty($_SESSION['nip'])) || (empty($_SESSION['unit_kerja'])) || (empty($_SESSION['divisi']))) {

	$_SESSION['data-allert']   = 'resetkaryawangagal';
	header ('location:../?pages=tambah-data-karyawan');

} else {

	unset($_SESSION['nama_karyawan']);
	unset($_SESSION['nip']);
	unset($_SESSION['unit_kerja']);
	unset($_SESSION['divisi']);
	$_SESSION['data-allert']   = 'resetkaryawansukses';
	header ('location:../?pages=tambah-data-karyawan');

}





 ?>