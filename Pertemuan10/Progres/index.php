<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian dan Validasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
        .result {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <h1>Form Penilaian dan Validasi Pemilih</h1>

    <form action="" method="POST">
        <label for="nama">Masukkan Nama:</label><br>
        <input type="text" name="nama" id="nama"><br><br>

        <label for="nilai">Masukkan Nilai (0-100):</label><br>
        <input type="number" name="nilai" id="nilai" min="0" max="100"><br><br>

        <label for="umur">Masukkan Umur:</label><br>
        <input type="number" name="umur" id="umur" min="0"><br><br>

        <label>
            <input type="checkbox" name="ktp" value="1"> Saya memiliki KTP
        </label><br><br>

        <button type="submit">Kirim</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        echo '<div class="result">';

        // Validasi nama
        if (!empty($_POST['nama'])) {
            $nama = htmlspecialchars($_POST['nama']);
            echo "<p>Nama: $nama</p>";
        } else {
            echo "<p style='color: red;'>Nama tidak boleh kosong!</p>";
        }

        // Proses nilai jika diberikan
        if (isset($_POST['nilai'])) {
            $nilai = (int) $_POST['nilai'];
            if ($nilai >= 80) {
                echo "<p>Nilai: A</p>";
            } elseif ($nilai >= 70) {
                echo "<p>Nilai: B</p>";
            } else {
                echo "<p>Nilai: C</p>";
            }
        }

        // Validasi umur dan status KTP
        $umur = isset($_POST['umur']) ? (int) $_POST['umur'] : 0;
        $ktp = isset($_POST['ktp']);
        if ($umur >= 17 && $ktp) {
            echo "<p>Status: Boleh memilih</p>";
        } else {
            echo "<p>Status: Tidak boleh memilih</p>";
        }

        echo '</div>';
    }
    ?>

</body>
</html>
