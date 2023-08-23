<?php
session_start();
$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["password"];
$confPass = $_POST["confPass"];

$check = strcasecmp($pass, $confPass);
include "./db.php";

if ($check == 0) {
    // echo "Hello";
    $sql1 = "select * from user where email = ? and name = ? ";
    $stmt = mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);

    $check = mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    // $result = mysqli_query($conn, $sql);
    if (!$check) {
        header("Location: signup.php?error=");
    } else {
        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=Account exist!");
        } else {
            $sql2 = "insert into user (name,email,password) values (?,?,?)";
            $stmt2 = mysqli_prepare($conn, $sql2);

            mysqli_stmt_bind_param($stmt2, "sss", $name, $email, $pass);

            $check2 = mysqli_stmt_execute($stmt2);

            if ($check2) {
                $sql3 = "select * from user where email = ? and password = ? ";
                $stmt3 = mysqli_prepare($conn, $sql3);
                mysqli_stmt_bind_param($stmt3, "ss", $email, $pass);
                mysqli_stmt_execute($stmt3);
                $result2 = mysqli_stmt_get_result($stmt3);
                // $result2 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result2) > 0) {
                    while($row = mysqli_fetch_assoc($result2)) {
                        $_SESSION["name"] = $row["name"];    
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["email"] = $row["email"];
                        header("Location: index.php");  
                    }
                }
    
            }
        }    
    }


} else {
    header("Location: signup.php?error=Password does not match!");
}

?>