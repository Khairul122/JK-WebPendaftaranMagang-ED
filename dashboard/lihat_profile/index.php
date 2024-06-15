<?php
require_once 'func.php';
session_start();

?>

<style>
  .custom-scrollbar {
    overflow-x: auto;
    white-space: nowrap;
  }
</style>

<h3>Lihat Profile</h3>

<br>

<div class="table-responsive custom-scrollbar">
  <form>
    <?php
    $id_pengguna_login = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    $profiles = GetAll();
    if (!empty($profiles)) {
      $data = $profiles[0];
    ?>

      <div class="form-group">
        <label for="foto">Pas Foto</label>
        <br>
        <?php
        $foto_path = "../assets/img/uploads/" . basename($data['foto']);
        $foto_url = "http://localhost/simpesa/assets/img/uploads/" . basename($data['foto']);
        if (file_exists($foto_path)) {
          echo "<img src='$foto_url' alt='Foto Profil' style='width:300px;height:400px;'>";
        } else {
          echo "<p>Foto tidak tersedia</p>";
        }
        ?>
      </div>

      <div class="form-group">
        <label for="no_ktp">No KTP</label>
        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $data['no_ktp'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $data['email'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="no_hp">No Handphone</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>" readonly>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" readonly>
      </div>

      <br>

      <!-- Display CV -->
      <div class="form-group">
        <label for="cv">CV (Curriculum Vitae)</label>
        <br>
        <?php
        $cv_path = "../assets/img/uploads/" . basename($data['cv']);
        $cv_url = "http://localhost/simpesa/assets/img/uploads/" . basename($data['cv']);
        if (file_exists($cv_path)) {
          echo "<a href='$cv_url' target='_blank'>Lihat CV</a>";
        } else {
          echo "<p>CV tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display Transkrip Nilai -->
      <div class="form-group">
        <label for="transkrip_nilai">Transkrip Nilai</label>
        <br>
        <?php
        $transkrip_nilai_path = "../assets/img/uploads/" . basename($data['transkrip_nilai']);
        $transkrip_nilai_url = "http://localhost/simpesa/assets/img/uploads/" . basename($data['transkrip_nilai']);
        if (file_exists($transkrip_nilai_path)) {
          echo "<a href='$transkrip_nilai_url' target='_blank'>Lihat Transkrip Nilai</a>";
        } else {
          echo "<p>Transkrip Nilai tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display Surat Lamaran -->
      <div class="form-group">
        <label for="surat_lamaran">Surat Lamaran</label>
        <br>
        <?php
        $surat_lamaran_path = "../assets/img/uploads/" . basename($data['surat_lamaran']);
        $surat_lamaran_url = "http://localhost/simpesa/assets/img/uploads/" . basename($data['surat_lamaran']);
        if (file_exists($surat_lamaran_path)) {
          echo "<a href='$surat_lamaran_url' target='_blank'>Lihat Surat Lamaran</a>";
        } else {
          echo "<p>Surat Lamaran tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display Surat Rekomendasi -->
      <div class="form-group">
        <label for="surat_rekomendasi">Surat Rekomendasi</label>
        <br>
        <?php
        $surat_rekomendasi_path = "../assets/img/uploads/" . basename($data['surat_rekomendasi']);
        $surat_rekomendasi_url = "http://localhost/simpesa/assets/img/uploads/" . basename($data['surat_rekomendasi']);
        if (file_exists($surat_rekomendasi_path)) {
          echo "<a href='$surat_rekomendasi_url' target='_blank'>Lihat Surat Rekomendasi</a>";
        } else {
          echo "<p>Surat Rekomendasi tidak tersedia</p>";
        }
        ?>
      </div>

      <!-- Display KTP -->
      <div class="form-group">
        <label for="ktp">KTP</label>
        <br>
        <?php
        $ktp_path = "../assets/img/uploads/" . basename($data['ktp']);
        $ktp_url = "http://localhost/simpesa/assets/img/uploads/" . basename($data['ktp']);
        if (file_exists($ktp_path)) {
          echo "<a href='$ktp_url' target='_blank'>Lihat KTP</a>";
        } else {
          echo "<p>KTP tidak tersedia</p>";
        }
        ?>
      </div>

    <?php
    } else {
      echo "<p>Tidak ada data profile yang ditemukan.</p>";
    }
    ?>
  </form>
</div>
