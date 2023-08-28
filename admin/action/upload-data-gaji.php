<?php 

//=================================================
// Action processing upload data gaji
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
require '../../plugin/vendor/autoload.php';


if (isset($_POST['upload-data-gaji'])) {

	$nama_file   		= $_FILES["upload_excel"]["name"];
	$data_file 		    = $_FILES["upload_excel"]["tmp_name"];

	//validasi jika format beda

	$row_nama	 					= explode('.', $nama_file);
	$nama_file_new 					= end($row_nama);
	$require_format 				= array('xlsx', 'xls');
	$nama_dokumen 					= $row_nama[0];
	$versi_dokumen  				= $row_nama[1];
	$accepted_version_of_document 	= array('1','2','3','4','5');
	

	//validasi nama file templat tidak boleh ganti dan beda
	if ($nama_dokumen !== "TEMPLAT - DATA GAJI - PAYROLL V") {

		$_SESSION['data-allert']   = 'namafilebeda';
		header ('location:../?pages=upload-data-gaji');
		exit;

	}

	//validasi versi dari nama templat tidak boleh ganti
	if (!in_array($versi_dokumen, $accepted_version_of_document)) {

		$_SESSION['data-allert']   = 'versitidaktersedia';
		header ('location:../?pages=upload-data-gaji');
		exit;

	}


	//validasi extensi harus xlsx atau xls 
	if (!in_array($nama_file_new, $require_format)) {

		$_SESSION['data-allert']   = 'extensionnotsame';
		header ('location:../?pages=upload-data-gaji');
		exit;

	} 


	//execute query spreadsheet
	$reader 		= \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($data_file);
	$spreadSheet 	= $reader->load($data_file);
	$sheetData 		= $spreadSheet->getActiveSheet()->toArray();

	//counting data
	$total 							= 0;
	$gagal_upload_karena_nonaktif 	= 0;
	$nik_tidak_terdaftar		    = 0;

	for ($i=1; $i<count($sheetData); $i++) {

		$nip										= $sheetData[$i]['1'];
		$tanggal_gajian								= $sheetData[$i]['2'];
		$jumlah_kehadiran							= $sheetData[$i]['3'];
		$biaya_kehadiran_per_hari 					= str_replace(',', '.', $sheetData[$i]['4']);
		$total_biaya_kehadiran_per_hari 			= str_replace(',', '.', $sheetData[$i]['5']);
		$jumlah_transportasi 						= $sheetData[$i]['6'];
		$biaya_transportasi_per_hari				= str_replace(',', '.', $sheetData[$i]['7']);
		$total_biaya_transportasi					= str_replace(',', '.', $sheetData[$i]['8']);
		$jumlah_pengajaran							= $sheetData[$i]['9'];
		$biaya_pengajaran_per_hari					= str_replace(',', '.', $sheetData[$i]['10']);
		$total_biaya_pengajaran						= str_replace(',', '.', $sheetData[$i]['11']);
		$jumlah_disiplin							= $sheetData[$i]['12'];
		$biaya_disiplin_per_hari					= str_replace(',', '.', $sheetData[$i]['13']);
		$total_biaya_disiplin						= str_replace(',', '.', $sheetData[$i]['14']);
		$jumlah_lain								= $sheetData[$i]['15'];
		$biaya_lain_per_hari						= str_replace(',', '.', $sheetData[$i]['16']);
		$total_biaya_lain 							= str_replace(',', '.', $sheetData[$i]['17']);	
		$prosentase_tunjangan_kinerja				= $sheetData[$i]['18'];
		$satuan_biaya_tunjangan_kinerja				= str_replace(',', '.', $sheetData[$i]['19']);
		$total_biaya_tunjangan_kinerja 				= str_replace(',', '.', $sheetData[$i]['20']); 
		$prosentase_biaya_lain_jenjang_pendidikan	= $sheetData[$i]['21'];
		$satuan_biaya_lain_jenjang_pendidikan		= str_replace(',', '.', $sheetData[$i]['22']);
		$total_biaya_lain_jenjang_pendidikan		= str_replace(',', '.', $sheetData[$i]['23']);
		$prosentase_bonus_tambahan					= $sheetData[$i]['24'];
		$satuan_biaya_bonus_tambahan				= str_replace(',', '.', $sheetData[$i]['25']);
		$total_biaya_bonus_tambahan					= str_replace(',', '.', $sheetData[$i]['26']);
		$total_biaya_bpjs_kesehatan					= str_replace(',', '.', $sheetData[$i]['27']);
		$total_biaya_bpjs_ketenagakerjaan			= str_replace(',', '.', $sheetData[$i]['28']);	
		$total_biaya_tujangan_jabatan				= str_replace(',', '.', $sheetData[$i]['29']);
		$total_biaya_tujangan_essatu				= str_replace(',', '.', $sheetData[$i]['30']);
		$prosentase_gaji_tetap						= $sheetData[$i]['31'];
		$satuan_biaya_gaji_tetap					= str_replace(',', '.', $sheetData[$i]['32']);
		$total_biaya_gaji_tetap						= str_replace(',', '.', $sheetData[$i]['33']);
		$total_gaji 								= str_replace(',', '.', $sheetData[$i]['34']);

		//ngambil id_karyawan berdasarkan NIK
		$query_validasi 	= mysqli_query($con, "SELECT * FROM karyawan WHERE nip='$nip'");
		$validasi 			= mysqli_num_rows($query_validasi);
		if ($validasi > 0) {

			$fetch_data = mysqli_fetch_assoc ($query_validasi);
			$id_karyawan = $fetch_data['id_karyawan']; //data id karyawan
			// echo $id_karyawan. '<br />';

			if ($fetch_data['status'] == 'nonaktif') {
				$gagal_upload_karena_nonaktif++;
				continue;
			}

		} else {
			$nik_tidak_terdaftar++;
			continue;

		}


		//rubah format tanggal 
		$value_tanggal_gajian        = explode('/', $tanggal_gajian);
		$dd 						 = $value_tanggal_gajian[1];
		$mm 						 = $value_tanggal_gajian[0];
		$yy 						 = end ($value_tanggal_gajian);

		$new_tanggal_gajian 		 = $dd.'-0'.$mm.'-'.$yy;  //data tanggal baru
		// echo $new_tanggal_gajian. '<br />';
		// var_dump($value_tanggal_gajian);



		//setelah validasi berhasil eksekusi seluruh data ke dalam query dan lakukan upload
		$execute_query = mysqli_query ($con, "INSERT INTO data_gaji (

		id_karyawan,
		tanggal_gajian,
		jumlah_kehadiran,
		biaya_kehadiran_per_hari,
		total_biaya_kehadiran_per_hari,
		jumlah_transportasi,
		biaya_transportasi_per_hari,
		total_biaya_transportasi,
		jumlah_pengajaran,
		biaya_pengajaran_per_hari,
		total_biaya_pengajaran,
		jumlah_disiplin,
		biaya_disiplin_per_hari,
		total_biaya_disiplin,
		jumlah_lain,
		biaya_lain_per_hari,
		total_biaya_lain,
		prosentase_tunjangan_kinerja,
		satuan_biaya_tunjangan_kinerja,
		total_biaya_tunjangan_kinerja,
		prosentase_biaya_lain_jenjang_pendidikan,
		satuan_biaya_lain_jenjang_pendidikan,
		total_biaya_lain_jenjang_pendidikan,
		prosentase_bonus_tambahan,
		satuan_biaya_bonus_tambahan,
		total_biaya_bonus_tambahan,
		total_biaya_bpjs_kesehatan,
		total_biaya_bpjs_ketenagakerjaan,
		total_biaya_tujangan_jabatan,
		total_biaya_tujangan_essatu,
		prosentase_gaji_tetap,
		satuan_biaya_gaji_tetap,
		total_biaya_gaji_tetap,
		total_gaji

	) VALUES (

	'$id_karyawan',
	'$new_tanggal_gajian',
	'$jumlah_kehadiran',
	'$biaya_kehadiran_per_hari',
	'$total_biaya_kehadiran_per_hari',
	'$jumlah_transportasi',
	'$biaya_transportasi_per_hari',
	'$total_biaya_transportasi',
	'$jumlah_pengajaran',
	'$biaya_pengajaran_per_hari',
	'$total_biaya_pengajaran',
	'$jumlah_disiplin',
	'$biaya_disiplin_per_hari',
	'$total_biaya_disiplin',
	'$jumlah_lain',
	'$biaya_lain_per_hari',
	'$total_biaya_lain',
	'$prosentase_tunjangan_kinerja',
	'$satuan_biaya_tunjangan_kinerja',
	'$total_biaya_tunjangan_kinerja',
	'$prosentase_biaya_lain_jenjang_pendidikan',
	'$satuan_biaya_lain_jenjang_pendidikan',
	'$total_biaya_lain_jenjang_pendidikan',
	'$prosentase_bonus_tambahan',
	'$satuan_biaya_bonus_tambahan',
	'$total_biaya_bonus_tambahan',
	'$total_biaya_bpjs_kesehatan',
	'$total_biaya_bpjs_ketenagakerjaan',
	'$total_biaya_tujangan_jabatan',
	'$total_biaya_tujangan_essatu',
	'$prosentase_gaji_tetap',
	'$satuan_biaya_gaji_tetap',
	'$total_biaya_gaji_tetap',
	'$total_gaji'
	)");

		$total++;
	}	

	$_SESSION['uploadberhasil']					= true;
	$_SESSION['total_data'] 					= $total;
	$_SESSION['gagal_upload_nonaktif'] 			= $gagal_upload_karena_nonaktif;
	$_SESSION['NIK Tidak Terdaftar'] 			= $nik_tidak_terdaftar;
	$total_data_gaji = $total + $gagal_upload_karena_nonaktif + $nik_tidak_terdaftar;
	$_SESSION['total_data_gaji']  				= $total_data_gaji;


	if (empty($total_data_gaji)) {
	$_SESSION['data-allert']   = 'dataandakosong';
	header ('location:../?pages=upload-data-gaji');
	exit;

	}


	$_SESSION['data-allert']   = 'uploadgajiberhasil';
	header ('location:../?pages=upload-data-gaji');
	exit;
	
}


 ?>