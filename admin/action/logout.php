<?php 


//=================================================
// Action logout
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================



session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie(session_name(), '', time() - 7000000, '/');
setcookie('ueruADSFJA', '', time() - 7000000, '/');
setcookie('keyueruADSFJA', '', time() - 7000000, '/');

header('location:/');
exit;

 ?>