<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();



setcookie(session_name(), '', time() - 7000000, '/');
setcookie('IeridfiaUER', '', time() - 7000000, '/');
setcookie('keyIeridfiaUER', '', time() - 7000000, '/');

header('location:/');
exit;

 ?>