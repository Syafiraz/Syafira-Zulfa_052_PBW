<!DOCTYPE html>
<html>
<head>
    <title>Latihan Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            background-color: #e7f3fe;
            padding: 15px;
            border-left: 5px solid #2196F3;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Penilaian Mahasiswa</h2>
        <form method="post" action="">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="nilai">Nilai:</label>
            <input type="number" name="nilai" required>

            <input type="submit" value="Proses">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = htmlspecialchars($_POST['nama']);
            $nilai = $_POST['nilai'];
            $predikat = "";
            $status = "";

            if ($nilai >= 85 && $nilai <= 100) {
                $predikat = "A";
            } elseif ($nilai >= 75 && $nilai <= 84) {
                $predikat = "B";
            } elseif ($nilai >= 65 && $nilai <= 74) {
                $predikat = "C";
            } elseif ($nilai >= 50 && $nilai <= 64) {
                $predikat = "D";
            } elseif ($nilai >= 0 && $nilai <= 49) {
                $predikat = "E";
            } else {
                $predikat = "Tidak valid";
            }

            if ($predikat == "A" || $predikat == "B" || $predikat == "C") {
                $status = "Lulus";
            } elseif ($predikat == "D" || $predikat == "E") {
                $status = "Tidak Lulus";
            } else {
                $status = "-";
            }

            echo "<div class='result'>";
            echo "<strong>Hasil:</strong><br>";
            echo "Nama : $nama<br>";
            echo "Nilai : $nilai<br>";
            echo "Predikat : $predikat<br>";
            echo "Status : $status";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
