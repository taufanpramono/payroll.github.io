
<?php

//=================================================
// konfigurasi dan setup koneksi database
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================


//masukan informasi 
$hostname     = 'localhost';
$username     = 'root';
$password     = '';
$database     = 'payroll2';

// melakukan akses
$con = new mysqli($hostname, $username, $password, $database);

// koneksi eror atau tidak terjadi
if ($con->connect_error) {
  die("Koneksi Ke Database Error " . $con->connect_error);
}


?>