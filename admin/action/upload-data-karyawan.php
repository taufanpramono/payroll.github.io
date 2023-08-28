<?php 

//=================================================
// Action processing upload data karyawan
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


if (isset($_POST['upload-excel-karyawan'])) {

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
	if ($nama_dokumen !== "TEMPLAT - DATA KARYAWAN - PAYROLL V") {

		$_SESSION['data-allert']   = 'namafilebeda';
		header ('location:../?pages=upload-data-karyawan');
		exit;

	}

	//validasi versi dari nama templat tidak boleh ganti
	if (!in_array($versi_dokumen, $accepted_version_of_document)) {

		$_SESSION['data-allert']   = 'versitidaktersedia';
		header ('location:../?pages=upload-data-karyawan');
		exit;

	}
	
	//validasi extensi harus xlsx atau xls 
	if (!in_array($nama_file_new, $require_format)) {

		$_SESSION['data-allert']   = 'extensionnotsame';
		header ('location:../?pages=upload-data-karyawan');
		exit;

	} 


	$reader 		= \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($data_file);
	$spreadSheet 	= $reader->load($data_file);
	$sheetData 		= $spreadSheet->getActiveSheet()->toArray();


	$total_data_berhasil_upload = 0;
	$karyawan_gagal_upload      = 0;

	for ($i=1; $i<count($sheetData); $i++) {


		$nama_karyawan = $sheetData[$i]['0'];
		$nip 		   = $sheetData[$i]['1'];
		$unit_kerja    = $sheetData[$i]['2'];
		$divisi   	   = $sheetData[$i]['3'];
		$password      = $sheetData[$i]['4'];
		$status        = "nonaktif";
		$password 	   = password_hash($password, PASSWORD_DEFAULT); 

		//validasi apakah data telah ada
		$validasi = mysqli_num_rows(mysqli_query($con, "SELECT * FROM karyawan WHERE nip='$nip'"));
		if ($validasi > 0) {

			$karyawan_gagal_upload++;
		    continue;
		
	    } else {

	   	// eksekusi query
		$query = mysqli_query ($con, "INSERT INTO karyawan (nama_karyawan, nip, unit_kerja, divisi, password, status) VALUES ('$nama_karyawan','$nip','$unit_kerja','$divisi','$password','$status') ");

		$total_data_berhasil_upload++;

	    }	
	
	}

	$_SESSION['upload_data_karyawan']          = true;
	$_SESSION['data_karyawan_berhasil_upload'] = $total_data_berhasil_upload;
	$_SESSION['data-karyawan_gagal_upload']    = $karyawan_gagal_upload;
	$_SESSION['total_data_karyawan_terupload'] = $total_data_berhasil_upload + $karyawan_gagal_upload;
	$_SESSION['data-allert']   = 'uploadkaryawanberhasil';


	if (empty($_SESSION['total_data_karyawan_terupload'])) {
	$_SESSION['data-allert']   = 'dataandakosong';
	header ('location:../?pages=upload-data-karyawan');
	exit;

	}

	header ('location:../?pages=upload-data-karyawan');
	exit;


	
}


 ?>