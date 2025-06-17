<?php
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set tanggal kunjungan ke hari ini karena dihapus dari form
    $tanggal_kunjungan = date('Y-m-d');
    
    $nama = $_POST['nama'] ?? '';
    $instansi = $_POST['instansi'] ?? '';
    $tujuan = $_POST['tujuan'] ?? '';
    $asal = $_POST['asal'] ?? '';
    $keperluan = $_POST['keperluan'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $email = $_POST['email'] ?? '';
    $foto = $_POST['foto'] ?? '';

    // Validasi field yang masih ada di form
    if (empty($nama) || empty($instansi) || empty($asal) || empty($keperluan) || empty($foto)) {
        echo json_encode(["success" => false, "message" => "Semua field wajib diisi!"]);
        exit;
    }

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO buku_tamu (tanggal_kunjungan, nama, instansi, tujuan, asal, keperluan, telepon, email, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $tanggal_kunjungan, $nama, $instansi, $tujuan, $asal, $keperluan, $telepon, $email, $foto);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Data berhasil disimpan"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menyimpan data: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Metode tidak diizinkan"]);
}
?>
