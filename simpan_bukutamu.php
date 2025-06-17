<?php
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $instansi = $_POST['instansi'] ?? ''; // Tambahan instansi
    $tujuan = $_POST['tujuan'] ?? '';
    $asal = $_POST['asal'] ?? '';
    $keperluan = $_POST['keperluan'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $email = $_POST['email'] ?? '';
    $foto = $_POST['foto'] ?? '';

    if (empty($tanggal_kunjungan) || empty($nama) || empty($instansi) || empty($tujuan) || empty($asal) || empty($keperluan)) {
        echo json_encode(["success" => false, "message" => "Semua field wajib diisi!"]);
        exit;
    }

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO buku_tamu (tanggal_kunjungan, nama, instansi, tujuan, asal, keperluan, telepon, email, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $tanggal_kunjungan, $nama, $instansi, $tujuan, $asal, $keperluan, $telepon, $email, $foto);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Data berhasil disimpan"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menyimpan data"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Metode tidak diizinkan"]);
}
?>
