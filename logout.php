<?php
// setcookie("email", "", time() - 3600);
// setcookie("pass", "", time() - 3600);
session_start();
session_unset();
session_destroy();

setcookie("auth", "", time() - (60*60*24*30), "/");
setcookie("PHPSESSID", "", 0, "/");


header('Location: signin.php');
?>