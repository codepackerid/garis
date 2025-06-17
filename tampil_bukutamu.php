<?php
include 'config.php';

$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

$sql = "SELECT * FROM buku_tamu";
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " WHERE tanggal_kunjungan BETWEEN '$startDate' AND '$endDate'";
}

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>
