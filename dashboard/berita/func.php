<?php
session_start();
require_once('../config/conn.php'); // Import koneksi database

$conn = Connect(); // Menginisialisasi koneksi sekali di awal

function GetAll()
{
  $query = "SELECT * FROM tbl_berita";
  $exe = mysqli_query(Connect(), $query);

  $datas = array(); // Inisialisasi array kosong

  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_berita' => $data['id_berita'],
      'judul' => $data['judul'],
      'keterangan' => $data['keterangan'],
      'foto' => $data['foto'],
      'tanggal' => $data['tanggal']
    );
  }

  return $datas;
}

function GetOne($id_berita)
{
  $query = "SELECT * FROM tbl_berita WHERE id_berita = '$id_berita'";
  $exe = mysqli_query(Connect(), $query);

  $datas = array(); // Inisialisasi array kosong
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_berita' => $data['id_berita'],
      'judul' => $data['judul'],
      'keterangan' => $data['keterangan'],
      'foto' => $data['foto'],
      'tanggal' => $data['tanggal']
    );
  }
  return $datas;
}

function Insert()
{
  global $conn;

  $judul = $_POST['judul'];
  $keterangan = $_POST['keterangan'];
  $foto = ''; // Inisialisasi nama file foto
  $tanggal = $_POST['tanggal'];

  // Proses upload foto
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $uploadDir = '../assets/img/berita/'; // Sesuaikan dengan direktori upload Anda
    $foto = basename($_FILES['foto']['name']);
    $uploadFile = $uploadDir . $foto;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
      // Foto berhasil diupload
    } else {
      // Gagal mengupload foto
      echo '<script>alert("Upload foto gagal."); window.history.back();</script>';
      return;
    }
  }

  $query = "INSERT INTO tbl_berita (judul, keterangan, foto, tanggal) VALUES ('$judul', '$keterangan', '$foto', '$tanggal')";

  $exe = mysqli_query($conn, $query);

  if ($exe) {
    // Jika berhasil
    $_SESSION['message'] = "Data Berita Sudah Disimpan";
    $_SESSION['mType'] = "success";
    echo '<script>alert("Data Berita berhasil disimpan."); window.location = "?r=berita/index";</script>';
  } else {
    // Jika gagal
    $_SESSION['message'] = "Data Berita Gagal Disimpan";
    $_SESSION['mType'] = "danger";
    echo '<script>alert("Data Berita gagal disimpan."); window.location = "?r=berita/index";</script>';
  }
}

function Update($id_berita)
{
  global $conn;

  $judul = $_POST['judul'];
  $keterangan = $_POST['keterangan'];
  $tanggal = $_POST['tanggal'];
  $foto = '';

  // Memeriksa apakah file foto diunggah
  if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['foto']['tmp_name'];
    $fileName = $_FILES['foto']['name'];
    $uploadDir = '../assets/img/berita/';
    $uploadedFile = $uploadDir . $fileName;

    // Pindahkan file yang diunggah ke direktori yang ditentukan
    if (move_uploaded_file($fileTmpPath, $uploadedFile)) {
      $foto = $fileName;
      $query = "UPDATE tbl_berita SET judul = '$judul', keterangan = '$keterangan', foto = '$foto', tanggal = '$tanggal' WHERE id_berita = '$id_berita'";
    } else {
      echo '<script>alert("Gagal mengunggah file."); window.history.back();</script>';
      return;
    }
  } else {
    $query = "UPDATE tbl_berita SET judul = '$judul', keterangan = '$keterangan', tanggal = '$tanggal' WHERE id_berita = '$id_berita'";
  }

  $exe = mysqli_query($conn, $query);

  if ($exe) {
    $_SESSION['message'] = "Data Berita Sudah Diubah";
    $_SESSION['mType'] = "success";
    echo '<script>alert("Data Berita berhasil diubah."); window.location = "?r=berita/index";</script>';
  } else {
    $_SESSION['message'] = "Data Berita Gagal Diubah";
    $_SESSION['mType'] = "danger";
    echo '<script>alert("Data Berita gagal diubah."); window.location = "?r=berita/index";</script>';
  }
}

function Delete($id_berita)
{
  global $conn;
  $query = "DELETE FROM tbl_berita WHERE id_berita = '$id_berita'";
  $exe = mysqli_query($conn, $query);

  if ($exe) {
    $_SESSION['message'] = "Data Berita Sudah Dihapus";
    $_SESSION['mType'] = "success";
    echo '<script>alert("Data Berita berhasil dihapus."); window.location = "?r=berita/index";</script>';
  } else {
    $_SESSION['message'] = "Data Berita Gagal Dihapus";
    $_SESSION['mType'] = "danger";
    echo '<script>alert("Data Berita gagal dihapus."); window.location = "?r=berita/index";</script>';
  }
}

if (isset($_POST['insert'])) {
  Insert();
} else if (isset($_POST['update'])) {
  Update($_POST['id_berita']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id_berita']);
}
?>
