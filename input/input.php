<?php
// Menangkap data yang dikirim dari form index.html
$kecamatan = $_POST['kecamatan'];
$longlitude = $_POST['longlitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlaah_penduduk = $_POST['jumlaah_penduduk'];

// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menjalankan query INSERT dengan penyesuaian nama kolom
$sql = "INSERT INTO penduduk (kecamatan, longlitude, latitude, luas, jumlaah_penduduk)
VALUES ('$kecamatan', $longlitude, $latitude, $luas, $jumlaah_penduduk)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Mengembalikan halaman ke latihan.php yang ada di luar folder input
header("Location: ../latihan.php");
?>