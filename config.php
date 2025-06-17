<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_garis";

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
