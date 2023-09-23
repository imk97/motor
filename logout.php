<?php
session_start();
session_unset();
session_destroy();

setcookie('email', '', time()-(60*60*24*30), "", "", false, true);
setcookie('pass', '', time()-(60*60*24*30), "", "", false, true);

header('Location: signin.php');
?>