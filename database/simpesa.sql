-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 11.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpesa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `badan_usaha`
--

CREATE TABLE `badan_usaha` (
  `id` int(11) NOT NULL,
  `nama_usaha` text NOT NULL,
  `pemilik_usaha` varchar(54) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(125) NOT NULL,
  `kota` varchar(125) NOT NULL,
  `kecamatan` varchar(125) NOT NULL,
  `komoditas` varchar(55) NOT NULL,
  `kategori_usaha` varchar(125) NOT NULL,
  `bentuk_usaha` varchar(125) NOT NULL,
  `status_tanah_usaha` varchar(125) NOT NULL,
  `status` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `badan_usaha`
--

INSERT INTO `badan_usaha` (`id`, `nama_usaha`, `pemilik_usaha`, `alamat`, `provinsi`, `kota`, `kecamatan`, `komoditas`, `kategori_usaha`, `bentuk_usaha`, `status_tanah_usaha`, `status`) VALUES
(51, 'PT.RANGKAI UTAMA BERJAYA', 'MUHAMMAD FAIZ AKMAL', 'KOMPLEK RORINATA RESIDENCE TAHAP 7 BLOK.Y NO.10', 'Nusa Tengara Barat', 'SUMBAWA', 'SUMBAWA', 'Peternakan', 'Menengah', 'Perseroan Terbatas (PT)', 'Hak Milik', 'Telah diverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `id` int(11) NOT NULL,
  `komoditas` varchar(80) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`id`, `komoditas`, `deskripsi`) VALUES
(2, 'Logam', 'Mencakup produk-produk hasil pertambangan, yang dibedakan menjadi dua yaitu, logam berharga dan logam industri.'),
(3, ' Energi', 'Berupa produk-produk tambang dan eksplorasi yang berfungsi sebagai bahan bakar. Ragam produk dari jenis komoditas ini meliputi batu bara dan minyak bumi yang dapat berupa bensin, bensin tanpa timbal, diesel, light sweet crude oil, dan brent crude oil.'),
(4, 'Pertanian', 'Berupa produk-produk hasil pertanian. Jenis komoditas ini terdiri atas dua kelompok, yaitu hasil pertanian dan hasil perhutanan. Produk pertanian mencakup beras, gandum, kedelai, jagung, kopi, gula, dan yang lainnya. Sedangkan produk perhutanan meliputi karet, rotan, sawit, kapas, dan lainnya.'),
(5, 'Peternakan', 'Yakni produk-produk hasil peternakan yang mencakup ternak hidup termasuk daging, susu, dan juga pakannya. Contohnya sapi, babi, ayam, daging sapi, daging ayam, daging babi, susu sapi, dan pakan ternak. Pada perdagangan internasional, jenis komoditas peternakan ini dijual dalam satuan pon.'),
(6, 'Jasa - Software Developer', 'JASA PEMBUATAN APLIKASI WEB,DESKTOP DAN MOBILE'),
(7, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `no_hp` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `hak_pengguna` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `no_hp`, `email`, `password`, `hak_pengguna`) VALUES
(37, 'admin', '08121212131', 'admin@admin.com', 'admin', 'admin'),
(51, 'user', '08272613182', 'user@user.com', 'user', 'user'),
(52, 'icome', '081289374683', 'icome@icome.com', 'icome', 'user'),
(53, 'budi', '082165443677', 'budi@gmail.com', '12345678', 'user'),
(54, 'rita', '082165443677', 'rita@gmail.com', '12345678', 'user'),
(55, 'ari', '082165443677', 'ari@gmail.com', '12345678', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `produk` text NOT NULL,
  `satuan` varchar(64) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `produk`, `satuan`, `harga_satuan`, `id_pengguna`) VALUES
(8, 'Aplikasi Rekam Medis RS Berbasis Web', 'Modul', 25000000, 51);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana_usaha`
--

CREATE TABLE `rencana_usaha` (
  `id` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `saham` int(11) NOT NULL,
  `jumlah_tenaga_kerja` int(11) NOT NULL,
  `nilai_produksi` int(11) NOT NULL,
  `nilai_investasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rencana_usaha`
--

INSERT INTO `rencana_usaha` (`id`, `modal`, `saham`, `jumlah_tenaga_kerja`, `nilai_produksi`, `nilai_investasi`) VALUES
(51, 2000, 200, 200, 200, 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id`, `judul`, `keterangan`, `foto`, `tanggal`) VALUES
(2, 'tes', 'tes', 'f1.png', '2024-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datadiri`
--

CREATE TABLE `tbl_datadiri` (
  `id_datadiri` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(120) DEFAULT NULL,
  `no_ktp` int(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_diri` int(11) DEFAULT NULL,
  `foto_pelamar` varchar(300) DEFAULT NULL,
  `role` enum('medis','non medis') NOT NULL,
  `cv` text DEFAULT NULL,
  `str` text DEFAULT NULL,
  `ijazah` text DEFAULT NULL,
  `transkrip` text DEFAULT NULL,
  `ktp` text DEFAULT NULL,
  `surat_lamaran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_datadiri`
--

INSERT INTO `tbl_datadiri` (`id_datadiri`, `id_lowongan`, `nama_lengkap`, `no_ktp`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `umur`, `ibu`, `no_hp`, `provinsi`, `kabupaten`, `kecamatan`, `alamat`, `status_diri`, `foto_pelamar`, `role`, `cv`, `str`, `ijazah`, `transkrip`, `ktp`, `surat_lamaran`) VALUES
(50, 4, 'Andika', 1222, 'budi@gmail.com', 'Padang', '2024-01-09', 'wanita', 0, '', 2147483647, 'Sumatera Barang', 'Padang Pariaman', 'asasa', 'Naras Hilir', 2, 'asal 2.png', 'medis', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', '1059-2368-1-PB.pdf', 'CutiUser[034]04012024.pdf'),
(51, 4, 'Khairul Huda', 1222, 'mkhairul629@yahoo.com', 'Padang', '2024-01-11', 'wanita', 0, '', 2147483647, 'Sumatera Barang', 'Padang Pariaman', 'asa', 'Naras Hilir', 2, 'asal 2.png', 'medis', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf'),
(52, 4, 'Khairul Huda', 1222, 'admin@example.com', '2', '2024-01-12', 'wanita', 2, '2', 2, '2', '2', '2', '2', 3, 'Image (5).png', 'medis', '1248-Article Text-3657-3-10-20211020 (1).pdf', '1248-Article Text-3657-3-10-20211020 (1).pdf', '1248-Article Text-3657-3-10-20211020 (1).pdf', '1248-Article Text-3657-3-10-20211020 (1).pdf', '1248-Article Text-3657-3-10-20211020 (1).pdf', '1248-Article Text-3657-3-10-20211020 (1).pdf'),
(53, 4, 'Khairul Huda', 1222, 'nadya@gmail.com', 'asasa', '2024-01-12', 'pria', 2, '2', 2, '2', '2', '2', '2', 3, 'acak1.png', 'medis', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keahlian`
--

CREATE TABLE `tbl_keahlian` (
  `id_keahlian` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `keahlian` text DEFAULT NULL,
  `tingkat_keahlian` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_keahlian`
--

INSERT INTO `tbl_keahlian` (`id_keahlian`, `id_lowongan`, `keahlian`, `tingkat_keahlian`) VALUES
(608, 4, '2', '2'),
(609, 4, '2', '2'),
(610, 4, 'a', 'a'),
(611, 4, '2', '2'),
(612, 4, 'c', 'c'),
(613, 4, 'a', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_perus` varchar(120) DEFAULT NULL,
  `bidang` varchar(120) DEFAULT NULL,
  `kuota` int(5) NOT NULL,
  `valid_until` date DEFAULT NULL,
  `persyaratan_khusus` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`id_lowongan`, `nama_perus`, `bidang`, `kuota`, `valid_until`, `persyaratan_khusus`) VALUES
(7, 'BPJS KETENAGAKERJAAN', 'Analis Data', 10, '2024-07-01', 'Mahasiswa: Teknik Informatika, Sistem Informasi, Statistik, atau bidang terkait.\r\nSiswa : Teknik Informatika, Rekayasa Perangkat Lunak, atau bidang terkait.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `id_datadiri` int(11) DEFAULT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `nama_perus` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `pendidikan_terkakhir` varchar(10) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `tahun_lulus` int(11) DEFAULT NULL,
  `IPK` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `id_lowongan`, `pendidikan_terkakhir`, `asal_sekolah`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `IPK`) VALUES
(31, 4, '2', '2', '2', 2, 2, '2.00'),
(32, 4, 'S1', '2', 'IPA', 2023, 2024, '3.00'),
(33, 4, 'S1', '2', 'asaa', 2022, 2023, '3.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengalaman`
--

CREATE TABLE `tbl_pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `id_lowongan` int(11) DEFAULT NULL,
  `nama_perusahaan` text DEFAULT NULL,
  `posisi_terakhir` varchar(100) DEFAULT NULL,
  `jobdesk` varchar(100) DEFAULT NULL,
  `penghasilan` int(20) DEFAULT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengalaman`
--

INSERT INTO `tbl_pengalaman` (`id_pengalaman`, `id_lowongan`, `nama_perusahaan`, `posisi_terakhir`, `jobdesk`, `penghasilan`, `alasan`) VALUES
(26, 4, '', '2', '2', 2, '2'),
(27, 4, '', 'asa', '22', 222, '2222'),
(28, 4, '', '2', 'ada', 2, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id_profile` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `no_ktp` int(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `no_hp` bigint(20) DEFAULT NULL,
  `status_diri` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `alamat_domisili` text DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `foto_pelamar` varchar(500) NOT NULL,
  `cv` varchar(300) DEFAULT NULL,
  `str` varchar(300) DEFAULT NULL,
  `ijazah` varchar(300) DEFAULT NULL,
  `transkrip` varchar(300) DEFAULT NULL,
  `ktp` varchar(300) DEFAULT NULL,
  `surat_lamaran` varchar(300) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_profile`
--

INSERT INTO `tbl_profile` (`id_profile`, `id_pengguna`, `nama_lengkap`, `no_ktp`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `umur`, `ibu`, `no_hp`, `status_diri`, `alamat`, `alamat_domisili`, `provinsi`, `kabupaten`, `kecamatan`, `foto_pelamar`, `cv`, `str`, `ijazah`, `transkrip`, `ktp`, `surat_lamaran`, `status`) VALUES
(13, 53, 'Andika1111', 1231111, 'admin@gmail.com1111', 'asasa1111', '2024-01-11', 'wanita', 4, '', 8566579821111, 3, 'Naras Hilir1111', '21111', 'Aceh', 'Padang Pariaman1111', 'asa1111', 'jasaraharja1.png', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 1),
(15, 55, 'Khairul Huda', 1222, 'admin@gmail.com', 'Padang', '2024-01-11', 'pria', 6, 'rosmanidar', 82165443677, 3, 'Simpang Len', '2', 'Lampung', '222', 'Sungai Limau', 'acak1.png', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 'CutiUser[034]04012024.pdf', 1),
(16, 54, 'Rita', 1, 'rita@gmail.com', 'surabaya', '2001-11-29', 'wanita', 22, 'emi', 8566579821, 1, 'surabaya', 'surabaya', 'jawa timur', 'wonocolo', 'wonocolo', 'asal 2.png', 'Naskah publikasi ilmiah sohart.pdf', 'Naskah publikasi ilmiah sohart.pdf', '1248-Article Text-3657-3-10-20211020.pdf', '1248-Article Text-3657-3-10-20211020.pdf', '1248-Article Text-3657-3-10-20211020 (2).pdf', 'laporan_pengeluaran.pdf', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `badan_usaha`
--
ALTER TABLE `badan_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rencana_usaha`
--
ALTER TABLE `rencana_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  ADD PRIMARY KEY (`id_datadiri`);

--
-- Indeks untuk tabel `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indeks untuk tabel `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_lowongan` (`id_lowongan`),
  ADD KEY `id_datadiri` (`id_datadiri`);

--
-- Indeks untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `tbl_pengalaman`
--
ALTER TABLE `tbl_pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- Indeks untuk tabel `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  MODIFY `id_datadiri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  MODIFY `id_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=614;

--
-- AUTO_INCREMENT untuk tabel `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengalaman`
--
ALTER TABLE `tbl_pengalaman`
  MODIFY `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `tbl_lowongan` (`id_lowongan`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`id_datadiri`) REFERENCES `tbl_datadiri` (`id_datadiri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
