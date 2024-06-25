<?php
ob_start(); // Mulai output buffering
session_start();
require_once('../config/conn.php'); 

$conn = Connect(); // Inisialisasi koneksi

function GetAll() {
  global $conn; // Gunakan variabel koneksi global
  // Periksa apakah id_pengguna tersedia dalam sesi
  $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

  if ($id) {
    // Ubah query untuk memilih data berdasarkan id_pengguna
    $query = "SELECT p.*, d.nama_lengkap, d.jenis_kelamin, l.nama_perusahaan, l.bidang, p.nama_mentor 
              FROM tbl_pendaftaran p 
              JOIN tbl_datadiri d ON p.id_datadiri = d.id_datadiri 
              JOIN tbl_lowongan l ON p.id_lowongan = l.id_lowongan 
              WHERE p.id_pengguna = $id"; // Pastikan tabel yang benar digunakan
    $exe = mysqli_query($conn, $query);

    if ($exe) {
      $datas = array();
      while ($data = mysqli_fetch_array($exe)) {
        $datas[] = array(
          'id_pendaftaran' => $data['id_pendaftaran'],
          'id_lowongan' => $data['id_lowongan'],
          'nama_lengkap' => $data['nama_lengkap'],
          'jenis_kelamin' => $data['jenis_kelamin'],
          'bidang' => $data['bidang'],
          'nama_perusahaan' => $data['nama_perusahaan'],
          'status' => $data['status'],
          'nama_mentor' => $data['nama_mentor'], 
        );
      }
      return $datas;
    } else {
      echo "Error: " . mysqli_error($conn);
      return array();
    }
  } else {
    // Id_pengguna tidak tersedia dalam sesi
    return array();
  }
}


function GetOne($id_pendaftaran) {
  global $conn; // Gunakan variabel koneksi global
  $query = "
    SELECT 
      p.id_pendaftaran,
      d.nama_lengkap,
      d.jenis_kelamin,
      l.bidang,
      l.nama_perusahaan AS nama_perus,
      p.status
    FROM tbl_pendaftaran p
    JOIN tbl_datadiri d ON p.id_datadiri = d.id_datadiri
    JOIN tbl_lowongan l ON p.id_lowongan = l.id_lowongan
    WHERE p.id_pendaftaran = '$id_pendaftaran'
  ";
  
  $exe = mysqli_query($conn, $query);
  $datas = array();

  while ($data = mysqli_fetch_assoc($exe)) {
    $datas[] = $data;
  }
  return $datas;
}

function Insert() {
  global $conn; // Gunakan variabel koneksi global
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $bidang = $_POST['bidang'];
  $valid_until = $_POST['valid_until'];
  $kuota = $_POST['kuota'];
  $persyaratan = $_POST['persyaratan'];

  $query = "INSERT INTO `tbl_lowongan` (`nama_perusahaan`, `bidang`, `valid_until`, `kuota`, `persyaratan`)
              VALUES ('$nama_perusahaan', '$bidang', '$valid_until', '$kuota', '$persyaratan')";

  $exe = mysqli_query($conn, $query);

  if ($exe) {
    // Jika berhasil
    echo "<script>
            alert('Data sudah disimpan.');
            window.location = '?r=lowongan/index';
          </script>";
  } else {
    // Jika gagal
    $error_message = mysqli_error($conn);
    echo "<script>
            alert('Gagal menyimpan data: $error_message');
            window.location = '?r=lowongan/index';
          </script>";
  }
}

function Update($id_pendaftaran) {
  global $conn; // Gunakan variabel koneksi global
  $status = $_POST['status'];

  $query = "UPDATE `tbl_pendaftaran` SET 
              `status` = '$status'
              WHERE `id_pendaftaran` = '$id_pendaftaran'";
  $exe = mysqli_query($conn, $query);

  if ($exe) {
    echo "<script>
            alert('Status sudah diubah');
            window.location.href = '?r=konfirmasi_status_lamaran/index';
          </script>";
  } else {
    $error_message = mysqli_error($conn);
    echo "<script>
            alert('Status gagal diubah: $error_message');
            window.location.href = '?r=konfirmasi_status_lamaran/index';
          </script>";
  }
  exit();
}

function Delete($id_pendaftaran) {
  global $conn; // Gunakan variabel koneksi global
  $query = "DELETE FROM `tbl_pendaftaran` WHERE `id_pendaftaran` = '$id_pendaftaran'";
  $exe = mysqli_query($conn, $query);

  if ($exe) {
    echo "<script>
            alert('Data sudah dihapus');
            window.location.href = '?r=konfirmasi_status_lamaran/index';
          </script>";
  } else {
    $error_message = mysqli_error($conn);
    echo "<script>
            alert('Data gagal dihapus: $error_message');
            window.location.href = '?r=konfirmasi_status_lamaran/index';
          </script>";
  }
  exit();
}

if (isset($_POST['insert'])) {
  Insert();
} else if (isset($_POST['update'])) {
  Update($_POST['id_pendaftaran']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id_pendaftaran']);
}

ob_end_flush(); // Kirim output buffer dan matikan buffering
?>
