-- =============================================
-- TUGAS 1: EKSPLORASI DATABASE PERPUSTAKAAN
-- Penulis: [Nama Anda]
-- Deskripsi: Kumpulan query untuk manajemen data buku
-- =============================================

-- ---------------------------------------------
-- BAGIAN 1: Statistik Buku
-- ---------------------------------------------

-- 1. Menghitung total seluruh buku (berdasarkan jumlah judul)
SELECT COUNT(*) AS total_judul_buku FROM buku;

-- 2. Menghitung total nilai inventaris (Total harga seluruh stok)
SELECT SUM(harga * stok) AS total_nilai_inventaris FROM buku;

-- 3. Menghitung rata-rata harga buku
SELECT AVG(harga) AS rata_rata_harga FROM buku;

-- 4. Menampilkan buku termahal
SELECT judul, harga FROM buku ORDER BY harga DESC LIMIT 1;

-- 5. Menampilkan buku dengan jumlah stok terbanyak
SELECT judul, stok FROM buku ORDER BY stok DESC LIMIT 1;


-- ---------------------------------------------
-- BAGIAN 2: Filter dan Pencarian
-- ---------------------------------------------

-- 1. Buku kategori Programming dengan harga di bawah 100.000
SELECT * FROM buku WHERE kategori = 'Programming' AND harga < 100000;

-- 2. Pencarian judul yang mengandung kata 'PHP' atau 'MySQL'
SELECT * FROM buku WHERE judul LIKE '%PHP%' OR judul LIKE '%MySQL%';

-- 3. Daftar buku yang terbit pada tahun 2024
SELECT * FROM buku WHERE tahun_terbit = 2024;

-- 4. Menampilkan buku dengan rentang stok antara 5 sampai 10
SELECT * FROM buku WHERE stok BETWEEN 5 AND 10;

-- 5. Menampilkan buku karya pengarang 'Budi Raharjo'
SELECT * FROM buku WHERE pengarang = 'Budi Raharjo';


-- ---------------------------------------------
-- BAGIAN 3: Grouping dan Agregasi
-- ---------------------------------------------

-- 1. Jumlah judul dan total stok buku per kategori
SELECT kategori, COUNT(*) AS jumlah_judul, SUM(stok) AS total_stok 
FROM buku GROUP BY kategori;

-- 2. Rata-rata harga buku untuk setiap kategori
SELECT kategori, AVG(harga) AS rata_harga_kategori 
FROM buku GROUP BY kategori;

-- 3. Kategori dengan total nilai inventaris (harga * stok) terbesar
SELECT kategori, SUM(harga * stok) AS nilai_inventaris 
FROM buku GROUP BY kategori 
ORDER BY nilai_inventaris DESC LIMIT 1;


-- ---------------------------------------------
-- BAGIAN 4: Update Data
-- ---------------------------------------------

-- 1. Menaikkan harga buku kategori Programming sebesar 5%
UPDATE buku SET harga = harga * 1.05 WHERE kategori = 'Programming';

-- 2. Menambah stok sebanyak 10 unit untuk buku yang stoknya kritis (< 5)
UPDATE buku SET stok = stok + 10 WHERE stok < 5;


-- ---------------------------------------------
-- BAGIAN 5: Laporan Khusus
-- ---------------------------------------------

-- 1. Daftar buku yang memerlukan pengadaan ulang (stok di bawah 5)
SELECT judul, pengarang, stok FROM buku WHERE stok < 5;

-- 2. Menampilkan 5 buku dengan harga tertinggi
SELECT judul, pengarang, harga FROM buku ORDER BY harga DESC LIMIT 5;