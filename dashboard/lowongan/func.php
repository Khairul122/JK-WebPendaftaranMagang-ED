<?php

function GetAll()
{
  $query = "SELECT * FROM tbl_lowongan";
  $exe = mysqli_query(Connect(), $query);
  $datas = array(); // Inisialisasi array kosong
  while ($data = mysqli_fetch_array($exe)) {
    $datas[] = array(
      'id_lowongan' => $data['id_lowongan'],
      'nama_perusahaan' => $data['nama_perusahaan'],
      'bidang' => $data['bidang'],
      'kuota' => $data['kuota'],
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
      'nama_perusahaan' => $data['nama_perusahaan'],
      'bidang' => $data['bidang'],
      'kuota' => $data['kuota'],
      'valid_until' => $data['valid_until'],
      'persyaratan' => $data['persyaratan'],
    );
  }
  return $datas;
}

function Insert()
{
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $bidang = $_POST['bidang'];
  $valid_until = $_POST['valid_until'];
  $kuota = $_POST['kuota'];
  $persyaratan = $_POST['persyaratan'];

  $query = "INSERT INTO `tbl_lowongan` (`nama_perusahaan`, `bidang`, `valid_until`, `kuota`, `persyaratan`)
  VALUES ('$nama_perusahaan', '$bidang', '$valid_until', '$kuota', '$persyaratan')";

  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // Jika berhasil
    $_SESSION['message'] = "Data sudah disimpan";
    $_SESSION['mType'] = "success";
    echo '
        <script>
            alert("Data sudah disimpan");
            window.location = "?r=lowongan/index";
        </script>';
  } else {
    // Jika gagal
    $_SESSION['message'] = "Gagal menyimpan data: " . mysqli_error(Connect());
    $_SESSION['mType'] = "danger";
    echo '
        <script>
            alert("Gagal menyimpan data: ' . mysqli_error(Connect()) . '");
            window.location = "?r=lowongan/create";
        </script>';
  }
}

function Update($id_lowongan)
{
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $bidang = $_POST['bidang'];
  $kuota = $_POST['kuota'];
  $valid_until = $_POST['valid_until'];
  $persyaratan = $_POST['persyaratan'];

  $query = "UPDATE `tbl_lowongan` SET 
            `nama_perusahaan` = '$nama_perusahaan',
            `bidang` = '$bidang',
            `kuota` = '$kuota',
            `valid_until` = '$valid_until',
            `persyaratan` = '$persyaratan'
            WHERE `id_lowongan` = '$id_lowongan'";
  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // kalau berhasil
    $_SESSION['message'] = "Data sudah diubah";
    $_SESSION['mType'] = "success";
    echo '
    <script>
        alert("Data sudah diubah");
        window.location = "?r=lowongan/index";
    </script>';
  } else {
    $_SESSION['message'] = "Data gagal diubah: " . mysqli_error(Connect());
    $_SESSION['mType'] = "danger";
    echo '
    <script>
        alert("Data gagal diubah: ' . mysqli_error(Connect()) . '");
        window.location = "?r=lowongan/index";
    </script>';
  }
}

function Delete($id_lowongan)
{
  $query = "DELETE FROM `tbl_lowongan` WHERE `id_lowongan` = '$id_lowongan'";
  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // kalau berhasil
    $_SESSION['message'] = "Data sudah dihapus";
    $_SESSION['mType'] = "success";
    echo '
    <script>
        alert("Data sudah dihapus");
        window.location = "?r=lowongan/index";
    </script>';
  } else {
    $_SESSION['message'] = "Data gagal dihapus: " . mysqli_error(Connect());
    $_SESSION['mType'] = "danger";
    echo '
    <script>
        alert("Data gagal dihapus: ' . mysqli_error(Connect()) . '");
        window.location = "?r=lowongan/index";
    </script>';
  }
}

if (isset($_POST['insert'])) {
  Insert();
} else if (isset($_POST['update'])) {
  Update($_POST['id_lowongan']);
} else if (isset($_POST['delete'])) {
  Delete($_POST['id_lowongan']);
}
?>
