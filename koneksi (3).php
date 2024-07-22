<?php

//Variabel Database
$servername = "localhost";
$username = "patn2324_patarupipwk";
$password = "@Parkirupi1";
$database = "patn2324_parkir_upi";

$koneksi = mysqli_connect($servername, $username, $password, $database);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
    echo "Ok koneksi berhasil";
//mysqli_close($conn);
?>