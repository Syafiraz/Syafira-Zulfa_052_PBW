<?php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contoh Program PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f9f9f9;
            color: #333;
        }
        h2 {
            color: #006699;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .box {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .output {
            background: #eef;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            font-family: Consolas, monospace;
        }
    </style>
</head>
<body>

    <h1>Selamat Datang di program php</h1>

    <div class="box">
        <h2>Switch Hari</h2>
        <div class="output">
            <?php
            $hari = "Senin";

            switch (strtolower($hari)) {
                case "senin":
                    echo "Hari pertama kerja!";
                    break;
                case "jum'at":
                case "jumat":
                    echo "Salat Jumat!";
                    break;
                case "minggu":
                    echo "Libur akhir pekan!";
                    break;
                default:
                    echo "Hari biasa.";
                    break;
            }
            ?>
        </div>
    </div>

    <div class="box">
        <h2>Perulangan For</h2>
        <div class="output">
            <?php
            for ($i = 1; $i <= 5; $i++) {
                echo "Angka ke-".$i."<br>";
            }
            ?>
        </div>
    </div>

    <div class="box">
        <h2>Daftar Buah</h2>
        <div class="output">
            <?php
            $buah = ["Apel", "Jeruk", "Mangga"];
            foreach ($buah as $item) {
                echo "- $item<br>";
            }
            ?>
        </div>
    </div>

    <div class="box">
        <h2>Perulangan While</h2>
        <div class="output">
            <?php
            $nilai = 1;
            while ($nilai <= 5) {
                echo "Nilai: $nilai<br>";
                $nilai++;
            }
            ?>
        </div>
    </div>

    <div class="box">
        <h2>Data Mahasiswa</h2>
        <div class="output">
            <?php
            $mahasiswa = [
                "10001" => "Andi",
                "10002" => "Budi",
                "10003" => "Citra"
            ];
            foreach ($mahasiswa as $nim => $nama) {
                echo "NIM: $nim, Nama: $nama<br>";
            }
            ?>
        </div>
    </div>

    <div class="box">
        <h2> Cek Status Umur</h2>
        <div class="output">
            <?php
            $umur = 18;
            $status = ($umur >= 17) ? "Dewasa" : "Anak-anak";
            echo "Usia: $umur → Status: $status";
            ?>
        </div>
    </div>

    <div class="box">
        <h2>Menyertakan File Eksternal</h2>
        <div class="output">
            <?php

            @include 'soal1.php';
            @require 'nama_file.php';
            echo "File 'nama_file.php' dicoba untuk disertakan.";
            ?>
        </div>
    </div>

</body>
</html>
