<?php
session_start();
require_once('../config/conn.php'); 

$conn = Connect();

function GetAll()
{
  $query = "SELECT * FROM tbl_lowongan";
  $exe = mysqli_query(Connect(), $query);
  $datas = array(); // Inisialisasi array kosong
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_lowongan' => $data['id_lowongan'],
      'nama_perusahaan' => $data['nama_perusahaan'],
      'kuota' => $data['kuota'],
      'bidang' => $data['bidang'],
      'valid_until' => $data['valid_until'],
      'persyaratan' => $data['persyaratan'],
    );
  }
  return $datas;
}

function GetOne($id_lowongan)
{
  $query = "SELECT * FROM `tbl_lowongan` WHERE `id_lowongan` = '$id_lowongan'";
  $exe = mysqli_query(Connect(), $query);
  $datas = array(); // Inisialisasi array kosong
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_lowongan' => $data['id_lowongan'],
      'nama_perus' => $data['nama_perus'],
      'bidang' => $data['bidang'],
      'valid_until' => $data['valid_until'],
      'persyaratan_khusus' => $data['persyaratan_khusus'],
    );
  }
  return $datas;
}

function InsertDataDiri() {
  global $conn;
  
  // Ambil data dari formulir dan lakukan validasi serta sanitasi
  $id_lowongan = filter_input(INPUT_POST, 'id_lowongan', FILTER_SANITIZE_NUMBER_INT);
  $nama_lengkap = filter_input(INPUT_POST, 'nama_lengkap', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $tempat_lahir = filter_input(INPUT_POST, 'tempat_lahir', FILTER_SANITIZE_STRING);
  $tanggal_lahir = filter_input(INPUT_POST, 'tanggal_lahir', FILTER_SANITIZE_STRING);
  $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_SANITIZE_STRING);
  $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
  $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
  $no_ktp = filter_input(INPUT_POST, 'no_ktp', FILTER_SANITIZE_STRING);

  // Simpan data ke dalam array sesi
  $formDataDiri = array(
      'id_lowongan' => $id_lowongan,
      'nama_lengkap' => $nama_lengkap,
      'email' => $email,
      'tempat_lahir' => $tempat_lahir,
      'tanggal_lahir' => $tanggal_lahir,
      'jenis_kelamin' => $jenis_kelamin,
      'no_hp' => $no_hp,
      'alamat' => $alamat,
      'no_ktp' => $no_ktp
  );

  $_SESSION['formDataDiri'] = $formDataDiri;
  $_SESSION['id_lowongan'] = $id_lowongan;

  // Periksa apakah file diunggah dengan benar
  $uploadErrors = array();

  if ($_FILES['surat_lamaran']['error'] !== UPLOAD_ERR_OK) $uploadErrors[] = 'Surat lamaran gagal diunggah.';
  if ($_FILES['cv']['error'] !== UPLOAD_ERR_OK) $uploadErrors[] = 'CV pelamar gagal diunggah.';
  if ($_FILES['transkrip_nilai']['error'] !== UPLOAD_ERR_OK) $uploadErrors[] = 'Transkrip nilai gagal diunggah.';
  if ($_FILES['surat_rekomendasi']['error'] !== UPLOAD_ERR_OK) $uploadErrors[] = 'Surat rekomendasi gagal diunggah.';
  if ($_FILES['ktp']['error'] !== UPLOAD_ERR_OK) $uploadErrors[] = 'KTP gagal diunggah.';
  if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) $uploadErrors[] = 'Foto gagal diunggah.';

  if (!empty($uploadErrors)) {
      echo "<script>alert('" . implode('\n', $uploadErrors) . "'); window.history.back();</script>";
      return;
  }

  // Tentukan direktori penyimpanan
  $target_dir = "../assets/img/uploads/";

  // Ambil nama file yang diunggah
  $surat_lamaran = $target_dir . basename($_FILES['surat_lamaran']['name']);
  $cv = $target_dir . basename($_FILES['cv']['name']);
  $transkrip_nilai = $target_dir . basename($_FILES['transkrip_nilai']['name']);
  $surat_rekomendasi = $target_dir . basename($_FILES['surat_rekomendasi']['name']);
  $ktp = $target_dir . basename($_FILES['ktp']['name']);
  $foto = $target_dir . basename($_FILES['foto']['name']);

  // Pindahkan file ke direktori penyimpanan
  if (
      move_uploaded_file($_FILES['surat_lamaran']['tmp_name'], $surat_lamaran) &&
      move_uploaded_file($_FILES['cv']['tmp_name'], $cv) &&
      move_uploaded_file($_FILES['transkrip_nilai']['tmp_name'], $transkrip_nilai) &&
      move_uploaded_file($_FILES['surat_rekomendasi']['tmp_name'], $surat_rekomendasi) &&
      move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp) &&
      move_uploaded_file($_FILES['foto']['tmp_name'], $foto)
  ) {
      // Query untuk menyimpan data ke tabel tbl_berkas
      $query_berkas = "INSERT INTO tbl_berkas (foto, surat_lamaran, cv, transkrip_nilai, surat_rekomendasi, ktp) 
                       VALUES (?, ?, ?, ?, ?, ?)";
      $stmt_berkas = $conn->prepare($query_berkas);
      if ($stmt_berkas === false) {
          die('Prepare failed: ' . htmlspecialchars($conn->error));
      }
      $stmt_berkas->bind_param("ssssss", $foto, $surat_lamaran, $cv, $transkrip_nilai, $surat_rekomendasi, $ktp);

      if ($stmt_berkas->execute()) {
          $id_berkas = $conn->insert_id;

          // Query untuk menyimpan data ke tabel tbl_datadiri
          $query_datadiri = "INSERT INTO tbl_datadiri (id_lowongan, nama_lengkap, no_ktp, email, tempat_lahir, tanggal_lahir, 
                                  jenis_kelamin, no_hp, alamat, id_berkas) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt_datadiri = $conn->prepare($query_datadiri);
          if ($stmt_datadiri === false) {
              die('Prepare failed: ' . htmlspecialchars($conn->error));
          }
          $stmt_datadiri->bind_param("issssssssi",  $id_lowongan, $nama_lengkap, $no_ktp, $email, $tempat_lahir, $tanggal_lahir, 
                                     $jenis_kelamin, $no_hp, $alamat, $id_berkas);

          if ($stmt_datadiri->execute()) {
              $id_datadiri = $conn->insert_id;

              // Dapatkan id_pengguna dari sesi
              $id_pengguna = isset($_SESSION['id']) ? $_SESSION['id'] : null;

              // Query untuk menyimpan data ke tabel tbl_pendaftaran
              $query_pendaftaran = "INSERT INTO tbl_pendaftaran (id_lowongan, id_datadiri, id_berkas, status, id_pengguna) 
                                    VALUES (?, ?, ?, 'Pending', ?)";
              $stmt_pendaftaran = $conn->prepare($query_pendaftaran);
              if ($stmt_pendaftaran === false) {
                  die('Prepare failed: ' . htmlspecialchars($conn->error));
              }
              $stmt_pendaftaran->bind_param("iiii", $id_lowongan, $id_datadiri, $id_berkas, $id_pengguna);

              if ($stmt_pendaftaran->execute()) {
                  $_SESSION['message'] = "Data sudah disimpan";
                  $_SESSION['mType'] = "success";
                  echo '<script>alert("Data berhasil disimpan."); window.location = "?r=lamaran/index";</script>';
              } else {
                  $_SESSION['message'] = "Gagal menyimpan data pendaftaran: " . $stmt_pendaftaran->error;
                  $_SESSION['mType'] = "danger";
                  echo '<script>alert("Gagal menyimpan data pendaftaran: ' . $stmt_pendaftaran->error . '"); window.location = "?r=lamaran/index";</script>';
              }

              $stmt_pendaftaran->close();
          } else {
              $_SESSION['message'] = "Gagal menyimpan data diri: " . $stmt_datadiri->error;
              $_SESSION['mType'] = "danger";
              echo '<script>alert("Gagal menyimpan data diri: ' . $stmt_datadiri->error . '"); window.location = "?r=lamaran/index";</script>';
          }

          $stmt_datadiri->close();
      } else {
          $_SESSION['message'] = "Gagal menyimpan berkas: " . $stmt_berkas->error;
          $_SESSION['mType'] = "danger";
          echo '<script>alert("Gagal menyimpan berkas: ' . $stmt_berkas->error . '"); window.location = "?r=lamaran/index";</script>';
      }

      $stmt_berkas->close();
      $conn->close();
  } else {
      echo '<script>alert("Gagal mengunggah file."); window.history.back();</script>';
  }
}



function Delete($id_lowongan)
{
  $query = "DELETE FROM `tbl_lowongan` WHERE `id_lowongan` = '$id_lowongan'";
  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah dihapus ";
    $_SESSION['mType'] = "success ";
  } else {
    $_SESSION['message'] = " Data Gagal dihapus ";
    $_SESSION['mType'] = "danger ";
  }
}


if (isset($_POST['insert_data_diri'])) {
  InsertDataDiri($_POST['id_lowongan']);
} 

