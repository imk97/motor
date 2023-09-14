<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['password'];

// include db info
include './db.php';

$sql = "select * from user where email = ? and password = ? ";
$stmt = mysqli_prepare($conn, $sql);

//Defense from sql injection
mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
// $emailAuth = $email;
// $passAuth = $pass;

//Check n pass the data into db
$check = mysqli_stmt_execute($stmt);

if (!$check) {
    // Http code is unathorized
    header("Location: signin.php?error=Incorrect credential", 401);
} else {
    //Get result based on object
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["name"] = $row["name"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
    
            header('Location: .'); // Current directory/index.php
        }
    } else {
        // Http code is unathorized
        header('Location: signin.php?error=Incorrect credential.', 401);
        // exit();
    }    
}
?>