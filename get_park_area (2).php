<?php
$servername = "localhost";
$username = "patn2324_patarupipwk";
$password = "@Parkirupi1";
$database = "patn2324_parkir_upi";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM park_area";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode(["error" => "Connection error"]);
    exit;
}

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($data);

$conn->close();
?>
