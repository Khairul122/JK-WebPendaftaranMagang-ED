<?php
session_start();
require_once('../config/conn.php'); // Import koneksi database

$conn = Connect(); // Menginisialisasi koneksi sekali di awal

function GetAll()
{
  $query = "SELECT * FROM tbl_mentor";
  $exe = mysqli_query(Connect(), $query);

  $datas = array(); // Inisialisasi array kosong

  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_mentor' => $data['id_mentor'],
      'nama_mentor' => $data['nama_mentor']
    );
  }

  return $datas;
}

function GetOne($id_mentor)
{
  $query = "SELECT * FROM tbl_mentor WHERE id_mentor = '$id_mentor'";
  $exe = mysqli_query(Connect(), $query);

  $datas = array(); // Inisialisasi array kosong
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_mentor' => $data['id_mentor'],
      'nama_mentor' => $data['nama_mentor']
    );
  }
  return $datas;
}

function Insert()
{
  global $conn;

  $nama_mentor = $_POST['nama_mentor'];

  $query = "INSERT INTO tbl_mentor (nama_mentor) VALUES ('$nama_mentor')";

  $exe = mysqli_query($conn, $query);

  if ($exe) {
    // Jika berhasil
    $_SESSION['message'] = "Data Mentor Sudah Disimpan";
    $_SESSION['mType'] = "success";
    echo '<script>alert("Data Mentor berhasil disimpan."); window.location = "?r=mentor/index";</script>';
  } else {
    // Jika gagal
    $_SESSION['message'] = "Data Mentor Gagal Disimpan";
    $_SESSION['mType'] = "danger";
    echo '<script>alert("Data Mentor gagal disimpan."); window.location = "?r=mentor/index";</script>';
  }
}

function Update($id_mentor)
{
  global $conn;

  $nama_mentor = $_POST['nama_mentor'];

  $query = "UPDATE tbl_mentor SET nama_mentor = '$nama_mentor' WHERE id_mentor = '$id_mentor'";

  $exe = mysqli_query($conn, $query);

  if ($exe) {
    $_SESSION['message'] = "Data Mentor Sudah Diubah";
    $_SESSION['mType'] = "success";
    echo '<script>alert("Data Mentor berhasil diubah."); window.location = "?r=mentor/index";</script>';
  } else {
    $_SESSION['message'] = "Data Mentor Gagal Diubah";
    $_SESSION['mType'] = "danger";
    echo '<script>alert("Data Mentor gagal diubah."); window.location = "?r=mentor/index";</script>';
  }
}

function Delete($id_mentor)
{
  global $conn;
  $query = "DELETE FROM tbl_mentor WHERE id_mentor = '$id_mentor'";
  $exe = mysqli_query($conn, $query);

  if ($exe) {
    $_SESSION['message'] = "Data Mentor Sudah Dihapus";
    $_SESSION['mType'] = "success";
    echo '<script>alert("Data Mentor berhasil dihapus."); window.location = "?r=mentor/index";</script>';
  } else {
    $_SESSION['message'] = "Data Mentor Gagal Dihapus";
    $_SESSION['mType'] = "danger";
    echo '<script>alert("Data Mentor gagal dihapus."); window.location = "?r=mentor/index";</script>';
  }
}

if (isset($_POST['insert'])) {
  Insert();
} else if (isset($_POST['update'])) {
  Update($_POST['id_mentor']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id_mentor']);
}
