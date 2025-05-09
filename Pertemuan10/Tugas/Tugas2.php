<!DOCTYPE html>
<html>
<head>
    <title>Form Diskon Pembayaran Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f7;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .result {
            margin-top: 20px;
            background-color: #eaf2f8;
            padding: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Diskon Pembayaran Mahasiswa</h2>
        <form method="post">
            <label for="npm">NPM (angka saja, max 13 digit):</label>
            <input type="text" name="npm" pattern="\d{1,13}" maxlength="13" required title="Masukkan maksimal 13 digit angka">

            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="prodi">Prodi:</label>
            <select name="prodi" required>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Hukum">Hukum</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
                <option value="Manajemen">Manajemen</option>
            </select>

            <label for="semester">Semester:</label>
            <select name="semester" required>
                <?php
                for ($i = 1; $i <= 14; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>

            <label for="biaya_ukt">Biaya UKT (tanpa titik, contoh: 5900000):</label>
            <input type="number" name="biaya_ukt" required>

            <input type="submit" value="Hitung Diskon">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $npm = $_POST["npm"];
            $nama = $_POST["nama"];
            $prodi = $_POST["prodi"];
            $semester = (int)$_POST["semester"];
            $biaya_ukt = (float)$_POST["biaya_ukt"];

            // Hitung diskon
            $diskon = 0;
            if ($biaya_ukt >= 5000000) {
                $diskon = 10;
                if ($semester > 8) {
                    $diskon += 5;
                }
            }

            $jumlah_diskon = $biaya_ukt * ($diskon / 100);
            $harus_dibayar = $biaya_ukt - $jumlah_diskon;

            echo "<div class='result'>";
            echo "<h3>Luaran yang diharuskan</h3>";
            echo "NPM : $npm<br>";
            echo "NAMA : " . strtoupper($nama) . "<br>";
            echo "PRODI : " . strtoupper($prodi) . "<br>";
            echo "SEMESTER : $semester<br>";
            echo "BIAYA UKT : Rp. " . number_format($biaya_ukt, 0, ',', '.') . ",-<br>";
            echo "DISKON : $diskon%<br>";
            echo "YANG HARUS DIBAYAR : Rp. " . number_format($harus_dibayar, 0, ',', '.') . ",-<br>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
