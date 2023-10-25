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
            $_SESSION["res"] = "Congratulation! Successful update password";
            header("Location: update-password.php");
        } else {
            $_SESSION["res"] = "Unable to update password!";
            header("Location: update-password.php");
        }

    } else {
        $_SESSION["res"] = "There have conflict between new and confirmation password!";
        header("Location: update-password.php");
    }
} else {
    $_SESSION["res"] = "Password does not exist. Kindly recheck again";
    header("Location: update-password.php");
}




?>