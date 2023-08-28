<?php 

//=================================================
// autentikasi, cookie, session login
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================



// cek cookie karyawan jika sebelumnya telah melakukan cetang ingat saya
if (isset($_COOKIE['IeridfiaUER']) && isset($_COOKIE['keyIeridfiaUER'])) {
  
    $id     =  $_COOKIE['IeridfiaUER'];
    $keys   =  $_COOKIE['keyIeridfiaUER'];

    //ambil data berdasarkan id
    $query_cookies_karyawan = mysqli_query ($con, "SELECT * FROM karyawan WHERE id_karyawan ='$id'");
    $karyawan_rows = mysqli_fetch_assoc ($query_cookies_karyawan);
    $validate_keys = $karyawan_rows['nip'];
    $encypt_validate_keys = hash('sha256', $validate_keys);

    // echo $encypt_validate_keys.'<br />';
    // echo $keys;

    // var_dump($karyawan_rows);

    if ($keys === $encypt_validate_keys) {

         $_SESSION['karyawan_login'] = true;
         $_SESSION['nama_karyawan'] = $karyawan_rows['nama_karyawan'];
         $_SESSION['nip'] = $karyawan_rows['nip'];
         $_SESSION['id_karyawan'] = $karyawan_rows['id_karyawan'];
    }

} 

//cek cookie admin jika sebelumnya telah melakukan centang ingat saya 
elseif (isset($_COOKIE['ueruADSFJA']) && isset($_COOKIE['keyueruADSFJA'])) {
  
    $idd     =  $_COOKIE['ueruADSFJA'];
    $keyss   =  $_COOKIE['keyueruADSFJA'];

    //ambil data berdasarkan id
    $query_cookies_admin = mysqli_query ($con, "SELECT * FROM admin WHERE admin_id ='$idd'");
    $admin_rows = mysqli_fetch_assoc ($query_cookies_admin);
    $validate_keyss = $admin_rows['username'];
    $encypt_validate_keyss = hash('sha256', $validate_keyss);

    // echo $encypt_validate_keyss.'<br />';
    // echo $keyss;

    // var_dump($karyawan_rows);

    if ($keyss === $encypt_validate_keyss) {

         $_SESSION['admin_login']     = true;
         $_SESSION['nama_admin']      = $admin_rows['nama_admin'];
         $_SESSION['username_admin']  = $admin_rows['username'];
    }

}


if (isset( $_SESSION['admin_login'])) {
  header('location: admin/');
  exit;
} elseif (isset( $_SESSION['karyawan_login'])) {
  header('location: karyawan/');
  exit;
}


//validasi jika kosong 
if (isset($_POST['login'])) {
  if (empty($_POST['username_nim'])) {
    $nama_kosong = true;
  }

  if (empty($_POST['password'])) {
    $password_kosong = true;
  }
}


//eksekusi data admin
if (isset($_POST['login'])) {
 $username_nim = $_POST['username_nim'];
 $password     = $_POST['password'];  
 $query = mysqli_query ($con, "SELECT * FROM admin WHERE username='$username_nim'");
 if (mysqli_num_rows($query) === 1 ) {
  $row = mysqli_fetch_assoc($query);
  if (password_verify($password, $row['password'])) {
      //set session
    $_SESSION['admin_login'] = true;

    //cek remember me 
      if (isset($_POST['ingat-saya'])) {
        setcookie('ueruADSFJA', $row['admin_id'], time()+3600);
        setcookie('keyueruADSFJA', hash('sha256', $row['username']), time()+3600);
      }

    $_SESSION['nama_admin'] =  $row['nama_admin'];
    $_SESSION['username_admin'] = $row['username'];
    header('location:admin/?pages=dashboard');
    exit;
  }
}
$eror = true;
} 


//eksekusi data karyawan
if (isset($_POST['login']))  {
 $username_nip          = $_POST['username_nim'];
 $password_karyawan     = $_POST['password'];  
 $query_karyawan = mysqli_query ($con, "SELECT * FROM karyawan WHERE nip='$username_nip'");
 if (mysqli_num_rows($query_karyawan) === 1 ) {
  $row_karyawan = mysqli_fetch_assoc($query_karyawan);
  if ($row_karyawan['status'] == 'aktif') {
    if (password_verify($password_karyawan, $row_karyawan['password'])) {
      //set session
      $_SESSION['karyawan_login'] = true;

      //cek remember me 
      if (isset($_POST['ingat-saya'])) {
        setcookie('IeridfiaUER', $row_karyawan['id_karyawan'], time()+3600);
        setcookie('keyIeridfiaUER', hash('sha256', $row_karyawan['nip']), time()+3600);
      }

      $_SESSION['nama_karyawan'] =  $row_karyawan['nama_karyawan'];
      $_SESSION['nip'] = $row_karyawan['nip'];
      $_SESSION['id_karyawan'] = $row_karyawan['id_karyawan'];
      header('location:karyawan/?pages=dashboard');
      exit;
    }
  } else {
    $status = true;
  } 
}
$eror = true;
}


 ?>