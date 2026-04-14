<?php
$nama_anggota = "Budi Santoso";
$total_pinjaman = 2;
$buku_terlambat = 1;
$hari_keterlambatan = 5; // hari

// Hitung denda
$denda_per_hari = 1000;
$total_denda = $buku_terlambat * $hari_keterlambatan * $denda_per_hari;

// Maksimal denda
if ($total_denda > 50000) {
    $total_denda = 50000;
}

// Cek status peminjaman
if ($buku_terlambat > 0) {
    $status = "Tidak bisa pinjam (ada keterlambatan)";
} elseif ($total_pinjaman >= 3) {
    $status = "Tidak bisa pinjam (maksimal tercapai)";
} else {
    $status = "Bisa melakukan peminjaman";
}

// Tentukan level member
switch (true) {
    case ($total_pinjaman >= 0 && $total_pinjaman <= 5):
        $level = "Bronze";
        break;
    case ($total_pinjaman >= 6 && $total_pinjaman <= 15):
        $level = "Silver";
        break;
    default:
        $level = "Gold";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Status Peminjaman</title>
</head>
<body>
    <h2>Status Peminjaman Anggota</h2>
    <p>Nama: <?php echo $nama_anggota; ?></p>
    <p>Total Pinjaman: <?php echo $total_pinjaman; ?></p>
    <p>Level Member: <?php echo $level; ?></p>
    <p>Status: <?php echo $status; ?></p>

    <?php if ($buku_terlambat > 0): ?>
        <p style="color:red;">Ada keterlambatan!</p>
        <p>Total Denda: Rp <?php echo number_format($total_denda, 0, ',', '.'); ?></p>
    <?php endif; ?>
</body>
</html>