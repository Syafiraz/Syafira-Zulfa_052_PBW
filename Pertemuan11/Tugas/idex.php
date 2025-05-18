<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Praktikum PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Latihan Praktikum PHP</h1>

    <div class="container">
        <ul>
            <li><a href="?page=soal1">Soal 1: Jenis Kendaraan</a></li>
            <li><a href="?page=soal2">Soal 2: Bilangan Genap</a></li>
            <li><a href="?page=soal3">Soal 3: Daftar Hewan</a></li>
            <li><a href="?page=soal4">Soal 4: Genap atau Ganjil</a></li>
        </ul>
    </div>

    <div class="output">
        <?php
        $page = $_GET['page'] ?? '';

        switch ($page) {
            case 'soal1':
                include 'soal1.php';
                break;
            case 'soal2':
                include 'soal2.php';
                break;
            case 'soal3':
                include 'soal3.php';
                break;
            case 'soal4':
                include 'soal4.php';
                break;
            default:
                echo "<p>Silakan pilih soal dari menu di atas.</p>";
                break;
        }
        ?>
    </div>
</body>
</html>
