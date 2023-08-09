<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['password'];

// include db info
include './db.php';

$sql = "select id, username from user where email = '$email' and password = '$pass' ";
$result = mysqli_query($conn, $$sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["username"] = $row["username"];
        $_SESSION["id"] = $row["id"];

        header('Location: index.php');
    }
} else {

    // Http code is unathorized
    header('Location: signin.php?error=Incorrect credential. Please check and login again.', 401);
    exit();
}
?>