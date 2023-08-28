<?php 

//=================================================
// Action Delete Data Gaji
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


if (isset($_POST['hapus-gaji'])) {

	if (isset($_POST['id_gaji'])) {

		$id_gaji             = $_POST['id_gaji'];
		$extract_id_gaji 	 = implode(',', $id_gaji); 
		echo $extract_id_gaji;

		//validasi data ada atau tidak
		$data 				= "SELECT * FROM data_gaji where id_gaji IN ($extract_id_gaji)";
		$data_query 		= mysqli_query($con, $data);
		$validasi_data 		= mysqli_num_rows($data_query);

		if ($validasi_data > 0 ) {

			$query = "DELETE FROM data_gaji WHERE id_gaji IN ($extract_id_gaji) ";
			$delete = mysqli_query($con, $query);

			if ($delete == true) {

			$_SESSION['data-allert'] = 'deletesukses';
			header ('location:../?pages=data-gaji');
			}

		} else {


		header ('location:../?pages=404');
		exit;



	}


}


	if (!isset($_POST['id_gaji'])) {

		$_SESSION['data-allert'] = 'selectdatagaji';
		header ('location:../?pages=data-gaji');
		exit;

	}



}




die();


	
	if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//validasi data ada atau tidak
	$data 				= "SELECT * FROM data_gaji where id_gaji='$id'";
	$data_query 		= mysqli_query($con, $data);
	$validasi_data 		= mysqli_num_rows($data_query);

	if ($validasi_data > 0 ) {

		$query = "DELETE FROM data_gaji WHERE id_gaji='$id'";
		$delete = mysqli_query($con, $query);

		if ($delete == true) {

		$_SESSION['data-allert'] = 'deletesukses';
		header ('location:../?pages=data-gaji');
		}

	} else {


		header ('location:../?pages=404');
		exit;



	}

}
	
	
 ?>