<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Buku - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Informasi Buku</h1>
        
        <?php
// Data buku
$judul = "Pemrograman Web 2";
$penulis = "Reza Maulana";
$tahun = 2025;
$harga = 85000;

// Output
echo "<h2>Informasi Buku</h2>";
echo "Judul Buku: " . $judul . "<br>";
echo "Penulis: " . $penulis . "<br>";
echo "Tahun Terbit: " . $tahun . "<br>";
echo "Harga: Rp " . number_format($harga, 0, ',', '.') . "<br>";

// Tambahan modifikasi (biar beda dari asli)
echo "<hr>";
echo "Status: Tersedia";
?>      
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><?php echo $judul; ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Pengarang</th>
                        <td>: <?php echo $pengarang; ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>: <?php echo $penerbit; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: <?php echo $tahun_terbit; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>: <?php echo $isbn; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>: <?php echo $stok; ?> buku</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>