<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .badge-dipinjam { background-color: #ffc107; color: #000; }
        .badge-dikembalikan { background-color: #198754; color: #fff; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Daftar Transaksi Peminjaman</h1>
        
        <?php
        // Inisialisasi variabel statistik
        $total_tampil = 0;
        $total_dipinjam = 0;
        $total_dikembalikan = 0;
        
        // Loop pertama untuk menghitung statistik berdasarkan aturan filter
        for ($i = 1; $i <= 10; $i++) {
            // Logika Break: Stop di transaksi ke-8
            if ($i > 8) break;
            
            // Logika Continue: Skip transaksi genap
            if ($i % 2 == 0) continue;

            // Jika lolos filter, hitung ke statistik
            $total_tampil++;
            
            // Logika status sesuai instruksi ($i % 3 == 0)
            $status = ($i % 3 == 0) ? "Dikembalikan" : "Dipinjam";
            
            if ($status == "Dipinjam") {
                $total_dipinjam++;
            } else {
                $total_dikembalikan++;
            }
        }
        ?>
        
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Ditampilkan</h5>
                        <p class="card-text fs-3"><?php echo $total_tampil; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Masih Dipinjam</h5>
                        <p class="card-text fs-3"><?php echo $total_dipinjam; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sudah Dikembalikan</h5>
                        <p class="card-text fs-3"><?php echo $total_dikembalikan; ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Peminjam</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Durasi (Hari)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    for ($i = 1; $i <= 10; $i++) {
                        // Aturan Break: Berhenti jika i mencapai 9
                        if ($i == 9) break;

                        // Aturan Continue: Lewati angka genap
                        if ($i % 2 == 0) continue;

                        // Generate Data
                        $id_transaksi = "TRX-" . str_pad($i, 4, "0", STR_PAD_LEFT);
                        $nama_peminjam = "Anggota " . $i;
                        $judul_buku = "Buku Teknologi Vol. " . $i;
                        $tanggal_pinjam = date('Y-m-d', strtotime("-$i days"));
                        $tanggal_kembali = date('Y-m-d', strtotime("+7 days", strtotime($tanggal_pinjam)));
                        $status = ($i % 3 == 0) ? "Dikembalikan" : "Dipinjam";
                        
                        // Hitung jumlah hari sejak pinjam hingga hari ini
                        $tgl_skrg = time();
                        $tgl_awal = strtotime($tanggal_pinjam);
                        $selisih_detik = $tgl_skrg - $tgl_awal;
                        $jumlah_hari = floor($selisih_detik / (60 * 60 * 24));

                        // Tentukan class warna badge
                        $badge_class = ($status == "Dikembalikan") ? "badge-dikembalikan" : "badge-dipinjam";
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><strong><?php echo $id_transaksi; ?></strong></td>
                            <td><?php echo $nama_peminjam; ?></td>
                            <td><?php echo $judul_buku; ?></td>
                            <td><?php echo $tanggal_pinjam; ?></td>
                            <td><?php echo $tanggal_kembali; ?></td>
                            <td><?php echo $jumlah_hari; ?> Hari</td>
                            <td>
                                <span class="badge <?php echo $badge_class; ?>">
                                    <?php echo $status; ?>
                                </span>
                            </td>
                        </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>