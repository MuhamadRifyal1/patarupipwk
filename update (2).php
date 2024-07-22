<?php
// Variabel Database
$servername = "localhost";
$username = "patn2324_patarupipwk";
$password = "@Parkirupi1";
$database = "patn2324_parkir_upi";

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa apakah data telah dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai yang dikirimkan melalui metode POST
    $statuses = [
        1 => $_POST['sensor1'],
        2 => $_POST['sensor2'],
        3 => $_POST['sensor3'],
        4 => $_POST['sensor4']
    ];

    // Menyiapkan pernyataan yang akan digunakan untuk memperbarui data
    $stmt = $koneksi->prepare("UPDATE park_area SET status=? WHERE id=?");

    if ($stmt) {
        // Memperbarui setiap id dengan status yang sesuai
        foreach ($statuses as $id => $status) {
            $stmt->bind_param('ii', $status, $id);
            if (!$stmt->execute()) {
                echo "Error updating record with ID $id: " . $stmt->error . "<br>";
            }
        }
        echo "Data berhasil diperbarui";
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $koneksi->error;
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>
