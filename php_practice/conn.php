<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//  Check Connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
// echo "Connected Successfully";
?>