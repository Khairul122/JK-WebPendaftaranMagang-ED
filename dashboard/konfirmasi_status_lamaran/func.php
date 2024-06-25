<?php
ob_start(); // Mulai output buffering
session_start();
require_once('../config/conn.php'); 

$conn = Connect();

function GetAll()
{
    global $conn;
    $query = "
        SELECT 
            p.id_pendaftaran,
            d.nama_lengkap,
            d.jenis_kelamin,
            l.bidang,
            l.nama_perusahaan AS nama_perus,
            p.status,
            p.nama_mentor
        FROM tbl_pendaftaran p
        JOIN tbl_datadiri d ON p.id_datadiri = d.id_datadiri
        JOIN tbl_lowongan l ON p.id_lowongan = l.id_lowongan
    ";
  
    $exe = mysqli_query($conn, $query);
    $datas = array();

    while ($data = mysqli_fetch_assoc($exe)) {
        $datas[] = $data;
    }
    return $datas;
}


function GetOne($id_pendaftaran)
{
    global $conn;
    $query = "
        SELECT 
            p.id_pendaftaran,
            d.nama_lengkap,
            d.jenis_kelamin,
            l.bidang,
            l.nama_perusahaan AS nama_perus,
            p.status,
            p.nama_mentor
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

function GetMentors()
{
    global $conn;
    $query = "SELECT id_mentor, nama_mentor FROM tbl_mentor";
    $exe = mysqli_query($conn, $query);
    $mentors = array();

    while ($mentor = mysqli_fetch_assoc($exe)) {
        $mentors[] = $mentor;
    }
    return $mentors;
}

function Insert()
{
    // Implementasi fungsi insert sesuai kebutuhan
}

function Update($id_pendaftaran)
{
    global $conn;
    $status = $_POST['status'];
    $nama_mentor = $_POST['nama_mentor'];

    $query = "UPDATE `tbl_pendaftaran` SET 
                `status` = '$status',
                `nama_mentor` = '$nama_mentor'
                WHERE `id_pendaftaran` = '$id_pendaftaran'";
    $exe = mysqli_query($conn, $query);

    if ($exe) {
        $_SESSION['message'] = "Status sudah diubah";
        $_SESSION['mType'] = "success";
        echo "<script>
                alert('Status sudah diubah');
                window.location = '?r=konfirmasi_status_lamaran/index';
              </script>";
    } else {
        $_SESSION['message'] = "Status gagal diubah: " . mysqli_error($conn);
        $_SESSION['mType'] = "danger";
        echo "<script>
                alert('Status gagal diubah: " . mysqli_error($conn) . "');
                window.location = '?r=konfirmasi_status_lamaran/index';
              </script>";
    }
    exit();
}

function Delete($id_pendaftaran)
{
    global $conn;
    $query = "DELETE FROM `tbl_pendaftaran` WHERE `id_pendaftaran` = '$id_pendaftaran'";
    $exe = mysqli_query($conn, $query);

    if ($exe) {
        $_SESSION['message'] = "Data sudah dihapus";
        $_SESSION['mType'] = "success";
        echo "<script>
                alert('Data sudah dihapus');
                window.location = '?r=konfirmasi_status_lamaran/index';
              </script>";
    } else {
        $_SESSION['message'] = "Data gagal dihapus: " . mysqli_error($conn);
        $_SESSION['mType'] = "danger";
        echo "<script>
                alert('Data gagal dihapus: " . mysqli_error($conn) . "');
                window.location = '?r=konfirmasi_status_lamaran/index';
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