<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['password'];

// include db info
include './db.php';

$sql = "select * from user where email = '$email' and password = '$pass' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        // setcookie("email", $row["email"], time() + (60*60*24*30), "/", "", false, true);
        // setcookie("pass", $row["password"], time() + (60*60*24*30), "/", "", false, true);
        setcookie("auth", "email=" .$row["email"]. "&password=" .$row["password"], time() + (60*60*24*30), "/", "", false, false);
        

        $_SESSION["name"] = $row["name"];
        $_SESSION["id"] = $row["id"];
        $_SESSION["email"] = $row["email"];

        header('Location: index.php');
    }
} else {

    // Http code is unathorized
    header('Location: signin.php?error=Incorrect credential.', 401);
    // exit();
}
?>