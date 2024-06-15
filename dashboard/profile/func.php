<?php
session_start();

function GetAllProfiles()
{
  $query = "SELECT * FROM tbl_profile";
  $exe = mysqli_query(Connect(), $query);

  $profiles = array();

  while ($data = mysqli_fetch_assoc($exe)) {
    $profiles[] = array(
      'id_profile' => $data['id_profile'],
      'id_pengguna' => $data['id_pengguna'],
      'nama_lengkap' => $data['nama_lengkap'],
      'email' => $data['email'],
      'tempat_lahir' => $data['tempat_lahir'],
      'tanggal_lahir' => $data['tanggal_lahir'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'no_hp' => $data['no_hp'],
      'status_diri' => $data['status_diri'],
      'alamat' => $data['alamat'],
      'alamat_domisili' => $data['alamat_domisili'],
      'provinsi' => $data['provinsi'],
      'kabupaten' => $data['kabupaten'],
      'kecamatan' => $data['kecamatan'],
      'cv' => $data['cv'],
      'str' => $data['str'],
      'ijazah' => $data['ijazah'],
      'transkrip' => $data['transkrip'],
      'ktp' => $data['ktp'],
      'surat_lamaran' => $data['surat_lamaran']
    );
  }

  return $profiles;
}


function GetProfileById($id_profile)
{
  $query = "SELECT * FROM tbl_profile WHERE id_profile = '$id_profile'";
  $exe = mysqli_query(Connect(), $query);

  $profile = array();

  while ($data = mysqli_fetch_assoc($exe)) {
    $profile = array(
      'id_profile' => $data['id_profile'],
      'id_pengguna' => $data['id_pengguna'],
      'nama_lengkap' => $data['nama_lengkap'],
      'email' => $data['email'],
      'tempat_lahir' => $data['tempat_lahir'],
      'tanggal_lahir' => $data['tanggal_lahir'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'no_hp' => $data['no_hp'],
      'status_diri' => $data['status_diri'],
      'alamat' => $data['alamat'],
      'alamat_domisili' => $data['alamat_domisili'],
      'provinsi' => $data['provinsi'],
      'kabupaten' => $data['kabupaten'],
      'kecamatan' => $data['kecamatan'],
      'cv' => $data['cv'],
      'str' => $data['str'],
      'ijazah' => $data['ijazah'],
      'transkrip' => $data['transkrip'],
      'ktp' => $data['ktp'],
      'surat_lamaran' => $data['surat_lamaran']
    );
  }

  return $profile;
}



function InsertProfile()
{
  // Ambil data dari formulir
  $id_pengguna = $_POST['id_pengguna'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $no_hp = $_POST['no_hp'];
  $provinsi = $_POST['provinsi'];
  $kabupaten = $_POST['kabupaten'];
  $kecamatan = $_POST['kecamatan'];
  $alamat = $_POST['alamat'];
  $alamat_domisili = $_POST['alamat_domisili'];
  $status_diri = $_POST['status_diri'];
  $no_ktp = $_POST['no_ktp']; 
  $status = 1;
  $umur = $_POST['umur'];
  $ibu = $_POST['ibu'];  
  



  $_SESSION['id_pengguna'] = $id_pengguna;

  // Periksa apakah ada file foto, CV, STR, Ijazah, Transkrip, KTP, dan Surat Lamaran yang diunggah
  if ($_FILES['foto_pelamar']['error'] === UPLOAD_ERR_OK && $_FILES['cv']['error'] === UPLOAD_ERR_OK && $_FILES['str']['error'] === UPLOAD_ERR_OK && $_FILES['ijazah']['error'] === UPLOAD_ERR_OK && $_FILES['transkrip']['error'] === UPLOAD_ERR_OK && $_FILES['ktp']['error'] === UPLOAD_ERR_OK && $_FILES['surat_lamaran']['error'] === UPLOAD_ERR_OK) {
    $foto_pelamar = $_FILES['foto_pelamar']['name'];
    $cv_pelamar = $_FILES['cv']['name'];
    $str = $_FILES['str']['name'];
    $ijazah = $_FILES['ijazah']['name'];
    $transkrip = $_FILES['transkrip']['name'];
    $ktp = $_FILES['ktp']['name'];
    $surat_lamaran = $_FILES['surat_lamaran']['name'];

    $target_dir_foto = "../assets/img/profile/foto/";
    $target_dir_cv = "../assets/img/profile/cv/";
    $target_dir_str = "../assets/img/profile/str/";
    $target_dir_ijazah = "../assets/img/profile/ijazah/";
    $target_dir_transkrip = "../assets/img/profile/transkrip/";
    $target_dir_ktp = "../assets/img/profile/ktp/";
    $target_dir_surat_lamaran = "../assets/img/profile/surat_lamaran/";

    $target_file_foto = $target_dir_foto . basename($foto_pelamar);
    $target_file_cv = $target_dir_cv . basename($cv_pelamar);
    $target_file_str = $target_dir_str . basename($str);
    $target_file_ijazah = $target_dir_ijazah . basename($ijazah);
    $target_file_transkrip = $target_dir_transkrip . basename($transkrip);
    $target_file_ktp = $target_dir_ktp . basename($ktp);
    $target_file_surat_lamaran = $target_dir_surat_lamaran . basename($surat_lamaran);

    // Pindahkan file ke direktori penyimpanan
    if (
      move_uploaded_file($_FILES['foto_pelamar']['tmp_name'], $target_file_foto) &&
      move_uploaded_file($_FILES['cv']['tmp_name'], $target_file_cv) &&
      move_uploaded_file($_FILES['str']['tmp_name'], $target_file_str) &&
      move_uploaded_file($_FILES['ijazah']['tmp_name'], $target_file_ijazah) &&
      move_uploaded_file($_FILES['transkrip']['tmp_name'], $target_file_transkrip) &&
      move_uploaded_file($_FILES['ktp']['tmp_name'], $target_file_ktp) &&
      move_uploaded_file($_FILES['surat_lamaran']['tmp_name'], $target_file_surat_lamaran)
    ) {
      // Query untuk menyimpan data ke tabel tbl_datadiri
      $query = "INSERT INTO tbl_profile (id_pengguna, nama_lengkap, email, tempat_lahir, tanggal_lahir, 
                          jenis_kelamin, no_hp, provinsi, kabupaten, kecamatan, alamat, alamat_domisili, status_diri, foto_pelamar, cv, str, ijazah, transkrip, ktp, surat_lamaran, no_ktp, status, umur, ibu) 
                          VALUES ('$id_pengguna', '$nama_lengkap', '$email', '$tempat_lahir', '$tanggal_lahir', 
                          '$jenis_kelamin', '$no_hp', '$provinsi', '$kabupaten', '$kecamatan', '$alamat','$alamat_domisili', '$status_diri', 
                          '$foto_pelamar', '$cv_pelamar', '$str', '$ijazah', '$transkrip', '$ktp', '$surat_lamaran', '$no_ktp','$status', '$umur', '$ibu')";

      $exe = mysqli_query(Connect(), $query);

      if ($exe) {
        // Jika berhasil, beri pesan sukses dan alihkan ke halaman indeks lamaran
        $_SESSION['message'] = "Data sudah disimpan";
        $_SESSION['mType'] = "success";
        $id_datadiri = mysqli_insert_id(Connect());
        $_SESSION['id_datadiri'] = $id_datadiri;
        echo '<script>window.location = "?r=lihat_profile/index";</script>';
      } else {
        // Jika gagal, beri pesan error
        $_SESSION['message'] = "Gagal menyimpan data: " . mysqli_error(Connect());
        $_SESSION['mType'] = "danger";
        echo '<script>window.location = "?r=profile/index";</script>';
      }
    } else {
      // Jika gagal mengunggah file
      echo "Gagal mengunggah file.";
    }
  } else {
    // Jika terjadi kesalahan saat mengunggah file
    echo "Terjadi kesalahan saat mengunggah file.";
  }
}




function Update($id_lowongan)
{
  $nama_perus = $_POST['nama_perus'];
  $bidang = $_POST['bidang'];
  $valid_until = $_POST['valid_until'];
  $persyaratan_khusus = $_POST['persyaratan_khusus'];

  $query = "UPDATE `tbl_lowongan` SET 
            `nama_perus` = '$nama_perus',
            `bidang` = '$bidang',
            `valid_until` = '$valid_until',
            `persyaratan_khusus` = '$persyaratan_khusus'
            WHERE `id_lowongan` = '$id_lowongan'";
  $exe = mysqli_query(Connect(), $query);

  if ($exe) {
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=lowongan/index"
    </script>';
  } else {
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=lowongan/index"
    </script>';
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



if (isset($_POST['insert'])) {
  InsertProfile();
}
// } else if (isset($_POST['update'])) {
//   Update($_POST['id_profile']);
// } else if (isset($_POST['delete'])) {
//   Delete($_POST['id_profile']);
// }
