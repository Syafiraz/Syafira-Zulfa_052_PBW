<?php
echo "<h2>Soal 1: Menentukan Jenis Kendaraan</h2>";
?>

<form method="post">
    Masukkan jumlah roda: <input type="number" name="roda" required>
    <button type="submit">Cek</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["roda"])) {
    $jumlah_roda = $_POST["roda"];

    switch ($jumlah_roda) {
        case 2:
            echo "<p>🚲 Kendaraan Roda 2: Motor atau Sepeda.</p>";
            break;
        case 3:
            echo "<p>🛺 Kendaraan Roda 3: Bajaj atau Becak.</p>";
            break;
        case 4:
            echo "<p>🚗 Kendaraan Roda 4: Mobil.</p>";
            break;
        case 6:
            echo "<p>🚌 Kendaraan Roda 6: Bis.</p>";
            break;
        default:
            echo "<p>❓ Jenis kendaraan tidak diketahui untuk roda $jumlah_roda.</p>";
            break;
    }
}
?>
