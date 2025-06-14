<?php
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;


include 'koneksi_db.php';

// Ambil data dari database
$query = "
   SELECT Pesanan.ID AS Pesanan_ID, Pelanggan.Nama AS Nama_Pelanggan, Pesanan.Tanggal_Pesanan, Pesanan.Total_Harga
   FROM Pesanan
   JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
";
$result = $conn->query($query);

// Buat konten HTML untuk PDF
$html = '
<h2 style="text-align:center;">Daftar Transaksi Pesanan</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pesanan</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>';

while ($row = $result->fetch_assoc()) {
    $html .= '
        <tr>
            <td>' . $row['Pesanan_ID'] . '</td>
            <td>' . htmlspecialchars($row['Nama_Pelanggan']) . '</td>
            <td>' . $row['Tanggal_Pesanan'] . '</td>
            <td>Rp' . number_format($row['Total_Harga'], 2, ',', '.') . '</td>
        </tr>';
}

$html .= '
    </tbody>
</table>';

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("daftar_transaksi.pdf", array("Attachment" => false)); // false untuk tampil di browser
exit;
?>
