<?php
include 'koneksi_db.php';

$search_nama = $_GET['nama'] ?? '';
$search_email = $_GET['email'] ?? '';

// Query pencarian
$sql = "SELECT * FROM Pelanggan WHERE 1";

if (!empty($search_nama)) {
    $sql .= " AND Nama LIKE '%" . $conn->real_escape_string($search_nama) . "%'";
}
if (!empty($search_email)) {
    $sql .= " AND Email LIKE '%" . $conn->real_escape_string($search_email) . "%'";
}

$result = $conn->query($sql);
?>
