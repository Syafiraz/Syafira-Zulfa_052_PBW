<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kasir Minimarket Sederhana</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            width: 450px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        form {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        select, input[type="number"], button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color:rgb(25, 76, 178);
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color:rgb(28, 23, 105);
        }
        .result {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .total {
            font-weight: bold;
            color: #333;
            font-size: 18px;
        }
        hr {
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Kasir Minimarket</h2>

    <form method="POST">
        <div class="form-group">
            <label for="barang">Pilih Barang:</label>
            <select name="barang" id="barang" required>
                <option value="">-- Pilih Barang --</option>
                <option value="Sabun">Sabun - Rp 5.000</option>
                <option value="Mie Instan">Mie Instan - Rp 3.000</option>
                <option value="Air Mineral">Air Mineral - Rp 4.000</option>
                <option value="Sikat Gigi">Sikat Gigi - Rp 7.000</option>
                <option value="Shampoo">Shampoo - Rp 15.000</option>
                <option value="Pasta Gigi">Pasta Gigi - Rp 13.000</option>
                <option value="Mie">Mie - Rp 3.500</option>
                <option value="Telur 1kg">Telur 1kg - Rp 28.000</option>
                <option value="Roti">Roti - Rp 4.000</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah Beli:</label>
            <input type="number" name="jumlah" id="jumlah" min="1" required>
        </div>
        <button type="submit">Hitung Total</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    define('PAJAK', 0.12);

    $hargaBarang = [
        "Sabun" => 5000,
        "Mie Instan" => 3000,
        "Air Mineral" => 4000,
        "Sikat Gigi" => 7000,
        "Shampoo" => 15000,
        "Pasta Gigi" => 14000,
        "Mie" => 3500,
        "Telur 1kg" => 28000,
        "Roti" => 4000

    ];

    $namaBarang = $_POST['barang'];
    $jumlahBeli = (int) $_POST['jumlah'];

    if (array_key_exists($namaBarang, $hargaBarang)) {
        $hargaSatuan = $hargaBarang[$namaBarang];
        $totalHarga = $hargaSatuan * $jumlahBeli;
        $pajak = $totalHarga * PAJAK;
        $totalBayar = $totalHarga + $pajak;
?>

    <div class="result">
        <hr>
        <p>Nama Barang: <?php echo $namaBarang; ?></p>
        <p>Harga Satuan: Rp <?php echo number_format($hargaSatuan, 0, ',', '.'); ?></p>
        <p>Jumlah Beli: <?php echo $jumlahBeli; ?></p>
        <p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></p>
        <p>Pajak (12%): Rp <?php echo number_format($pajak, 0, ',', '.'); ?></p>
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
