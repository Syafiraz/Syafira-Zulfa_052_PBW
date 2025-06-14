<?php
include 'koneksi_db.php';

$username = trim($_POST['username']);
$password = $_POST['password'];
$konfirmasi = $_POST['konfirmasi_password'];

if ($password !== $konfirmasi) {
    header("Location: register.php?message=" . urlencode("Konfirmasi password tidak cocok"));
    exit;
}

// Cek duplikasi username
$cek = $conn->prepare("SELECT * FROM pengguna WHERE nama = ?");
$cek->bind_param("s", $username);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    header("Location: register.php?message=" . urlencode("Username sudah digunakan"));
    exit;
}

$cek->close();

// Simpan user
$stmt = $conn->prepare("INSERT INTO pengguna (nama, katasandi) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password); // Ganti dengan password_hash untuk keamanan
$stmt->execute();

header("Location: login.php?message=" . urlencode("Pendaftaran berhasil, silakan login"));
exit;
?>
