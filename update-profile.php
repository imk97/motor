<?php
include_once "./db.php";
session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$update = "update user set name = ?, email = ?, phone = ? where id = ?";
$stmt = mysqli_prepare($conn, $update);
mysqli_stmt_bind_param($stmt, "ssis", $name, $email, $phone, $_SESSION["id"]);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $_SESSION["res"] = "";
    header("Location: profile.php");
} else {
    $_SESSION["res"] = "";
    header("Location: profile.php");
}


?>