<?php
require_once 'func.php';
$id_profile = $_POST['id_profile'];
$one = GetOne($id_profile);
?>

<form action='' method='POST' enctype="multipart/form-data">
  <div class="form-group">
    <label for="id_profile"> </label>
    <input type="hidden" class="form-control" id="id_profile" name='id_profile' value="<?php echo $_SESSION['id_profile']; ?>">
  </div>
  <div class="form-group pt-3">
    <label for="no_ktp">No KTP</label>
    <input type="number" class="form-control" id="no_ktp" name='no_ktp' value="<?php echo $data['no_ktp']; ?>">
  </div>

  <div class="form-group pt-3">
    <label for="nama_lengkap">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama_lengkap" name='nama_lengkap' value="<?php echo $data['nama_lengkap']; ?>">
  </div>

  <div class="form-group pt-3">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name='email' value="<?php echo $data['email']; ?>">
  </div>

  <div class="form-group pt-3">
    <label for="tempat_lahir">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempat_lahir" name='tempat_lahir' value="<?php echo $data['tempat_lahir']; ?>">
  </div>

  <div class="form-group pt-3">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tanggal_lahir" name='tanggal_lahir' value="<?php echo $data['tanggal_lahir']; ?>">
  </div>

  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
      <option value="pria">Pria</option>
      <option value="wanita">Wanita</option>
    </select>
  </div>

  <div class="form-group">
    <label for="umur">Umur</label>
    <input type="text" class="form-control" id="umur" name="umur" value="<?= $data['umur'] ?>">
  </div>

  <div class="form-group">
    <label for="ibu">Nama Ibu Kandung</label>
    <input type="text" class="form-control" id="ibu" name="ibu" value="<?= $data['ibu'] ?>">
  </div>

  <div class="form-group">
    <label for="no_hp">No Handphone</label>
    <input type="number" class="form-control" id="no_hp" name='no_hp' value="<?php echo $data['no_hp']; ?>">
  </div>

  <div class="form-group">
    <label for="status_diri">Status Diri</label>
    <select class="form-control" id="status_diri" name="status_diri">
      <option value="1">Belum Menikah</option>
      <option value="2">Menikah</option>
      <option value="3">Duda/Janda</option>
    </select>
  </div>

  <div class="form-group">
    <label for="alamat">Alamat Sesuai KTP</label>
    <input type="text" class="form-control" id="alamat" name='alamat' value="<?php echo $data['alamat']; ?>">
  </div>

  <div class="form-group">
    <label for="alamat_domisili">Alamat Domisili</label>
    <input type="text" class="form-control" id="alamat_domisili" name='alamat_domisili' value="<?php echo $data['alamat_domisili']; ?>">
  </div>

  <div class="form-group">
    <label for="provinsi">Provinsi</label>
    <input type="text" class="form-control" id="provinsi" name='provinsi' value="<?php echo $data['provinsi']; ?>">
  </div>

  <div class="form-group">
    <label for="kabupaten">Kabupaten</label>
    <input type="text" class="form-control" id="kabupaten" name='kabupaten' value="<?php echo $data['kabupaten']; ?>">
  </div>

  <div class="form-group">
    <label for="kecamatan">Kecamatan</label>
    <input type="text" class="form-control" id="kecamatan" name='kecamatan' value="<?php echo $data['kecamatan']; ?>">
  </div>

  <div class="form-group">
    <label for="foto_pelamar">Foto Pelamar (PNG atau JPG)</label>
    <input type="file" class="form-control-file" id="foto_pelamar" name="foto_pelamar" accept=".png, .jpg, .jpeg">
  </div>

  <div class="form-group">
    <label for="cv_pelamar">CV Pelamar (PDF atau DOCX)</label>
    <input type="file" class="form-control-file" id="cv" name="cv" accept=".pdf, .docx">
  </div>

  <div class="form-group">
    <label for="str">STR (PDF atau DOCX)</label>
    <input type="file" class="form-control-file" id="str" name="str" accept=".pdf, .docx">
  </div>

  <!-- Ijazah -->
  <div class="form-group">
    <label for="ijazah">Ijazah (PDF atau DOCX)</label>
    <input type="file" class="form-control-file" id="ijazah" name="ijazah" accept=".pdf, .docx">
  </div>

  <!-- Transkrip -->
  <div class="form-group">
    <label for="transkrip">Transkrip (PDF atau DOCX)</label>
    <input type="file" class="form-control-file" id="transkrip" name="transkrip" accept=".pdf, .docx">
  </div>

  <!-- KTP -->
  <div class="form-group">
    <label for="ktp">KTP (PDF atau JPG)</label>
    <input type="file" class="form-control-file" id="ktp" name="ktp" accept=".pdf, .jpg, .jpeg">
  </div>

  <!-- Surat Lamaran -->
  <div class="form-group">
    <label for="surat_lamaran">Surat Lamaran (PDF atau DOCX)</label>
    <input type="file" class="form-control-file" id="surat_lamaran" name="surat_lamaran" accept=".pdf, .docx">
  </div>

  <input type='submit' name='update' value='Save' class='btn btn-primary btn-lg btn-block'>
</form>

<?php

?>