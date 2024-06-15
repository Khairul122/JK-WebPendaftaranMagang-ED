<?php
session_start();
require_once('../config/conn.php'); // Import koneksi database

$conn = Connect(); // Menginisialisasi koneksi sekali di awal

function GetAll() {
  global $conn; // Gunakan variabel koneksi global

  // Query untuk mengambil semua data dari tabel
  $query = "SELECT p.id_pendaftaran, p.id_lowongan, p.id_pengguna, p.id_datadiri, p.id_berkas, p.status, 
                   d.nama_lengkap, d.no_ktp, d.email, d.tempat_lahir, d.tanggal_lahir, d.jenis_kelamin, d.no_hp, d.alamat,
                   b.foto, b.cv, b.transkrip_nilai, b.surat_lamaran, b.surat_rekomendasi, b.ktp
            FROM tbl_pendaftaran p 
            JOIN tbl_datadiri d ON p.id_datadiri = d.id_datadiri 
            JOIN tbl_berkas b ON p.id_berkas = b.id_berkas";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $datas = array();
    while ($data = mysqli_fetch_assoc($result)) {
      $datas[] = $data;
    }
    return $datas;
  } else {
    echo "Error: " . mysqli_error($conn);
    return array();
  }
}
?>
