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
    $sql = "select * from user where email = '$email' and name = '$name' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("Location: signup.php?error=Account exist!");
    } else {
        $sql2 = "insert into user (name,email,password) values ('$name','$email', '$pass')";
        if (mysqli_query($conn, $sql2)) {
            $sql3 = "select * from user where email = '$email' and password = '$pass' ";
            $result2 = mysqli_query($conn, $sql3);
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

} else {
    header("Location: signup.php?error=Password does not match!");
}

?>