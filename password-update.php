<?php
session_start();

include_once "db.php";

$currPass = $_POST["current_password"];
$newPass = $_POST["new_password"];
$conPass = $_POST["confirm_password"];

$sql = "select password from user where password = ? and id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $currPass, $_SESSION["id"]);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    if ($newPass === $conPass) {
        $sqlPass = "update user set password = ? where id = ?";
        $passStmt = mysqli_prepare($conn, $sqlPass);
        mysqli_stmt_bind_param($passStmt, "ss", $newPass, $_SESSION["id"]);
        mysqli_stmt_execute($passStmt);

        $checkUpdate = mysqli_stmt_get_result($passStmt);

        if ($checkUpdate != false) {
            header("Location: updatePassword.php?res=Successfully update password!");
        } else {
            header("Location: updatePassword.php?err=Password cannot be update!");
        }

    } else {
        header("Location: updatePassword.php?err=There have conflict between new and confirmation password!");
    }
} else {
    header("Location: updatePassword.php?err=Password does not exist. Kindly recheck again");
}




?>