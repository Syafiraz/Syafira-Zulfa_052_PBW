<?php
echo "<h2>Soal 2: Cetak Bilangan Genap</h2>";
?>

<form method="post">
    Batas angka: <input type="number" name="batas" min="2" value="10" required>
    <button type="submit">Cetak</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["batas"])) {
    $batas = $_POST["batas"];
    echo "<p>Bilangan genap dari 2 sampai $batas:</p><ul>";
    for ($i = 2; $i <= $batas; $i += 2) {
        echo "<li>$i</li>";
    }
    echo "</ul>";
}
?>
