<?php 

//=================================================
// Action processing Update Data Gaji
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


if (isset($_POST['update-data-gaji'])) {

	$from 										= $_POST['from'];
	$id_gaji									= $_POST['id_gaji'];
	$id_karyawan								= $_POST['id_karyawan'];
	$tanggal_gajian								= $_POST['tanggal_gajian'];
	$jumlah_kehadiran							= $_POST['jumlah_kehadiran'];
	$biaya_kehadiran_per_hari 					= $_POST['biaya_kehadiran_per_hari'];
	$total_biaya_kehadiran_per_hari 			= $_POST['total_biaya_kehadiran_per_hari'];
	$jumlah_transportasi 						= $_POST['jumlah_transportasi'];
	$biaya_transportasi_per_hari				= $_POST['biaya_transportasi_per_hari'];
	$total_biaya_transportasi					= $_POST['total_biaya_transportasi'];
	$jumlah_pengajaran							= $_POST['jumlah_pengajaran'];
	$biaya_pengajaran_per_hari					= $_POST['biaya_pengajaran_per_hari'];
	$total_biaya_pengajaran						= $_POST['total_biaya_pengajaran'];
	$jumlah_disiplin							= $_POST['jumlah_disiplin'];
	$biaya_disiplin_per_hari					= $_POST['biaya_disiplin_per_hari'];
	$total_biaya_disiplin						= $_POST['total_biaya_disiplin'];
	$jumlah_lain								= $_POST['jumlah_lain'];
	$biaya_lain_per_hari						= $_POST['biaya_lain_per_hari'];
	$total_biaya_lain 							= $_POST['total_biaya_lain'];	
	$prosentase_tunjangan_kinerja				= $_POST['prosentase_tunjangan_kinerja'];
	$satuan_biaya_tunjangan_kinerja				= $_POST['satuan_biaya_tunjangan_kinerja'];
	$total_biaya_tunjangan_kinerja 				= $_POST['total_biaya_tunjangan_kinerja']; 
	$prosentase_biaya_lain_jenjang_pendidikan	= $_POST['prosentase_biaya_lain_jenjang_pendidikan'];
	$satuan_biaya_lain_jenjang_pendidikan		= $_POST['satuan_biaya_lain_jenjang_pendidikan'];
	$total_biaya_lain_jenjang_pendidikan		= $_POST['total_biaya_lain_jenjang_pendidikan'];
	$prosentase_bonus_tambahan					= $_POST['prosentase_bonus_tambahan'];
	$satuan_biaya_bonus_tambahan				= $_POST['satuan_biaya_bonus_tambahan'];
	$total_biaya_bonus_tambahan					= $_POST['total_biaya_bonus_tambahan'];
	$total_biaya_bpjs_kesehatan					= $_POST['total_biaya_bpjs_kesehatan'];
	$total_biaya_bpjs_ketenagakerjaan			= $_POST['total_biaya_bpjs_ketenagakerjaan'];	
	$total_biaya_tujangan_jabatan				= $_POST['total_biaya_tujangan_jabatan'];
	$prosentase_gaji_tetap						= $_POST['prosentase_gaji_tetap'];
	$satuan_biaya_gaji_tetap					= $_POST['satuan_biaya_gaji_tetap'];
	$total_biaya_gaji_tetap						= $_POST['total_biaya_gaji_tetap'];
	$total_biaya_tujangan_essatu				= $_POST['total_biaya_tujangan_essatu'];
	$total_gaji 								= $_POST['total_gaji'];


	// echo $id_karyawan;

	//explode tanggal 
	$pecah_tanggal_gajian = explode('-', $tanggal_gajian);
	// var_dump($pecah_tanggal_gajian);
	$tanggal = end($pecah_tanggal_gajian);
	$bulan	 = $pecah_tanggal_gajian[1];
	$tahun 	 = $pecah_tanggal_gajian[0];

	$tanggal_baru =  $tanggal.'-'.$bulan.'-'.$tahun;
	


	//execute query to update



	$update_data2 = mysqli_query ($con, "UPDATE data_gaji SET 

		id_karyawan									= '$id_karyawan',
		tanggal_gajian 								= '$tanggal_baru',     
		jumlah_kehadiran							= '$jumlah_kehadiran',
		biaya_kehadiran_per_hari 					= '$biaya_kehadiran_per_hari',
		total_biaya_kehadiran_per_hari				= '$total_biaya_kehadiran_per_hari',
		jumlah_transportasi							= '$jumlah_transportasi',
		biaya_transportasi_per_hari					= '$biaya_transportasi_per_hari',	
		total_biaya_transportasi					= '$total_biaya_transportasi',
		jumlah_pengajaran							= '$jumlah_pengajaran',
		biaya_pengajaran_per_hari					= '$biaya_pengajaran_per_hari',
		total_biaya_pengajaran 						= '$total_biaya_pengajaran',
		jumlah_disiplin								= '$jumlah_disiplin',
		biaya_disiplin_per_hari 					= '$biaya_disiplin_per_hari',
		total_biaya_disiplin 						= '$total_biaya_disiplin',
		jumlah_lain 								= '$jumlah_lain',
		biaya_lain_per_hari							= '$biaya_lain_per_hari',
		total_biaya_lain 							= '$total_biaya_lain',
		prosentase_tunjangan_kinerja 				= '$prosentase_tunjangan_kinerja',
		satuan_biaya_tunjangan_kinerja 				= '$satuan_biaya_tunjangan_kinerja',
		total_biaya_tunjangan_kinerja 				= '$total_biaya_tunjangan_kinerja',
		prosentase_biaya_lain_jenjang_pendidikan	= '$prosentase_biaya_lain_jenjang_pendidikan',
		satuan_biaya_lain_jenjang_pendidikan		= '$satuan_biaya_lain_jenjang_pendidikan',
		total_biaya_lain_jenjang_pendidikan	 		= '$total_biaya_lain_jenjang_pendidikan',
		prosentase_bonus_tambahan					= '$prosentase_bonus_tambahan',
		satuan_biaya_bonus_tambahan					= '$satuan_biaya_bonus_tambahan',
		total_biaya_bonus_tambahan					= '$total_biaya_bonus_tambahan',
		total_biaya_bpjs_kesehatan					= '$total_biaya_bpjs_kesehatan',
		total_biaya_bpjs_ketenagakerjaan			= '$total_biaya_bpjs_ketenagakerjaan',
		total_biaya_tujangan_essatu					= '$total_biaya_tujangan_essatu',
		total_biaya_tujangan_jabatan				= '$total_biaya_tujangan_jabatan',
		prosentase_gaji_tetap						= '$prosentase_gaji_tetap',
		satuan_biaya_gaji_tetap						= '$satuan_biaya_gaji_tetap',
		total_biaya_gaji_tetap						= '$total_biaya_gaji_tetap',
		total_gaji 									= '$total_gaji'


		WHERE id_gaji = '$id_gaji' ");

	if ($update_data2 == true) {

		if ($from == 'view') {

			$_SESSION['data-allert']  = 'updategajisukses';
			header ('location:../?pages=lihat-slip&id='.$id_gaji );
			exit;

		}

		if ($from == 'list') {

			$_SESSION['data-allert']  = 'updategajisukses';
			header ('location:../?pages=data-gaji');
			exit;


		}
		
	}




} else {


	header ('location:../?pages=404');
	exit;



}


 ?>