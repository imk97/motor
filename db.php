<?php
$servername = "";
$username = "";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>