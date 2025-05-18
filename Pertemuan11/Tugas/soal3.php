<?php
echo "<h2>Soal 3: Daftar Nama Hewan</h2>";

$hewan = ["Kucing", "Anjing", "Gajah", "Singa"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["hewan"])) {
    $hewan[] = htmlspecialchars($_POST["hewan"]);
}
?>

<form method="post">
    Tambah hewan: <input type="text" name="hewan" required>
    <button type="submit">Tambah</button>
</form>

<p>Daftar hewan:</p>
<ul>
<?php
foreach ($hewan as $h) {
    echo "<li>$h</li>";
}
?>
</ul>
