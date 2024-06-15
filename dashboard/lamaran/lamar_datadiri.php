<?php
require_once 'func.php';
$current_page = isset($_GET['r']) ? $_GET['r'] : '';

$id_lowongan = $_POST['id_lowongan'];
$one = GetOne($id_lowongan);

if (!empty($one)) {
  foreach ($one as $data) {
    // echo "<p>ID Lowongan: " . $data['id_lowongan'] . "</p>";
    // echo "<p>Bidang: " . $data['bidang'] . "</p>";
    // echo "<p>Nama Perusahaan: " . $data['nama_perus'] . "</p>";
  }
} else {
  echo "<h4>Data tidak ditemukan</h4>";
}
?>

<section>
  <div class="row">
    <div class="card <?php echo ($current_page === 'lamaran/lamar_datadiri') ? 'bg-warning' : 'bg-secondary'; ?> text-white mb-3" style="width: 200px; height: 80px;">
      <div class="card-body text-center ">
        <h3 class="card-title text-dark">Data Diri</h3>
      </div>
    </div>

  </div>
</section>

<div class='panel panel-info pt-4'>
  <div class='panel-heading'>
    <h3>Form Data Diri</h3>
  </div>
  <div class='panel-body'>
    <form action='' method='POST' enctype="multipart/form-data">
      <input type='hidden' name='id_lowongan' value="<?php echo $_POST['id_lowongan']; ?>">
      <div class="form-group">
        <label for="no_ktp">NO KTP</label>
        <input type="number" class="form-control" id="no_ktp" name='no_ktp' required>
      </div>

      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name='nama_lengkap' required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name='email' required>
      </div>

      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name='tempat_lahir' required>
      </div>

      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name='tanggal_lahir' required>
      </div>

      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div class="form-group">
        <label for="no_hp">No Handphone</label>
        <input type="number" class="form-control" id="no_hp" name='no_hp' required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name='alamat' required>
      </div>

      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control-file" id="foto" name="foto" accept=".png, .jpg, .jpeg" required>
      </div>
      
      <div class="form-group">
        <label for="surat_lamaran">Surat Lamaran</label>
        <input type="file" class="form-control-file" id="surat_lamaran" name="surat_lamaran" accept=".pdf, .docx" required>
      </div>

      <div class="form-group">
        <label for="cv">CV</label>
        <input type="file" class="form-control-file" id="cv" name="cv" accept=".pdf, .docx" required>
      </div>

      <div class="form-group">
        <label for="transkrip_nilai">Transkrip Nilai</label>
        <input type="file" class="form-control-file" id="transkrip_nilai" name="transkrip_nilai" accept=".pdf, .docx" required>
      </div>

      <div class="form-group">
        <label for="surat_rekomendasi">Surat Rekomendasi</label>
        <input type="file" class="form-control-file" id="surat_rekomendasi" name="surat_rekomendasi" accept=".pdf, .docx" required>
      </div>

      <div class="form-group">
        <label for="ktp">KTP</label>
        <input type="file" class="form-control-file" id="ktp" name="ktp" accept=".pdf, .jpg, .jpeg" required>
      </div>

      <div class="pt-3">
        <input type='submit' name='insert_data_diri' value='Selanjutnya' class='btn btn-primary btn-lg btn-block'>
      </div>
    </form>
  </div>
</div>