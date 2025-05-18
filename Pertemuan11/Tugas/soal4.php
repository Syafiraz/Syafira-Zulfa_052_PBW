<?php
echo "<h2>Soal 4: Genap atau Ganjil</h2>";
?>

<form method="post">
    Masukkan angka: <input type="number" name="angka" required>
    <button type="submit">Cek</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["angka"])) {
    $angka = $_POST["angka"];
    $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
    echo "<p>Angka <strong>$angka</strong> adalah <strong>$status</strong>.</p>";
}
?>
