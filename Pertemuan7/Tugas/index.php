<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perhitungan Total Pembelian (Dengan Array)</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .kotak {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
        hr {
            margin: 15px 0;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }
        .form-input {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        select, input[type="number"], button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color:rgb(50, 91, 167);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color:rgb(24, 47, 103);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Perhitungan Total Pembelian</h2>

    <form method="POST">
        <div class="form-input">
            <label for="barang">Pilih Barang:</label>
            <select name="barang" id="barang" required>
                <option value="">-- Pilih Barang --</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Mouse">Mouse</option>
                <option value="Monitor">Monitor</option>
                <option value="Gamepad">Gamepad</option>
                <option value="Stylus Pen">Stylus Pen</option>
                <option value="Smart Watch">Smart Watch</option>
                <option value="Earphone">Earphone</option>
                <option value="HeadPhone">HeadPhone</option>
                <option value="Cooler Pad">Cooler Pad</option>
                <option value="Fancooler">Fancooler</option>
            </select>
        </div>
        <div class="form-input">
            <label for="jumlah">Jumlah Beli:</label>
            <input type="number" name="jumlah" id="jumlah" min="1" required>
        </div>
        <button type="submit">Hitung</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    define('PAJAK', 0.10);

    $hargaBarang = [
        "Keyboard" => 150000,
        "Mouse" => 75000,
        "Monitor" => 1250000,
        "Gamepad" => 180000,
        "Stylus Pen" => 146000,
        "Smart Watch" => 1365000,
        "Earphone" => 325000 ,
        "HeadPhone" => 700000 ,
        "Cooler Pad" => 463000 ,
        "Fancooler" => 300000  

    ];

    $namaBarang = $_POST['barang'];
    $jumlahBeli = (int) $_POST['jumlah'];

    if (array_key_exists($namaBarang, $hargaBarang)) {
        $hargaSatuan = $hargaBarang[$namaBarang];

        $totalHarga = $hargaSatuan * $jumlahBeli;
        $pajak = $totalHarga * PAJAK;
        $totalBayar = $totalHarga + $pajak;
?>

    <div class="kotak" style="margin-top:20px;">
        <hr>
        <p>Nama Barang: <?php echo $namaBarang; ?></p>
        <p>Harga Satuan: Rp <?php echo number_format($hargaSatuan, 0, ',', '.'); ?></p>
        <p>Jumlah Beli: <?php echo $jumlahBeli; ?></p>
        <p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></p>
        <p>Pajak (10%): Rp <?php echo number_format($pajak, 0, ',', '.'); ?></p>
        <p class="total">Total Bayar: Rp <?php echo number_format($totalBayar, 0, ',', '.'); ?></p>
    </div>

<?php
    } else {
        echo "<p style='color:red;'>Barang tidak ditemukan.</p>";
    }
}
?>

</div>

</body>
</html>
