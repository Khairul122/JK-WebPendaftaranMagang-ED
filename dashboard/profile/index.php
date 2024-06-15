<?php
require_once 'func.php';
session_start();
?>


<div class='panel panel-info'>

  <div class='panel-heading pt-2'>
    <h3>Basic Information</h3>
  </div>
  <div class='panel-body'>
    <form action='' method='POST' enctype="multipart/form-data">

      <div class="form-group pt-3">
        <label for="no_ktp">No KTP</label>
        <input type="number" class="form-control" id="no_ktp" name='no_ktp' placeholder=''>
      </div>

      <div class="form-group pt-3">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name='nama_lengkap' placeholder=''>
      </div>

      <div class="form-group pt-3">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name='email' placeholder=''>
      </div>

      <div class="form-group pt-3">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name='tempat_lahir' placeholder=''>
      </div>

      <div class="form-group pt-3">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name='tanggal_lahir' placeholder=''>
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
        <input type="number" class="form-control" id="umur" name='umur'>
      </div>

      <div class="form-group">
        <label for="ibu">Nama Ibu Kandung</label>
        <input type="text" class="form-control" id="ibu" name='ibu'>
      </div>


      <div class="form-group">
        <label for="no_hp">No Handphone</label>
        <input type="number" class="form-control" id="no_hp" name='no_hp'>
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
        <input type="text" class="form-control" id="alamat" name='alamat'>
      </div>

      <div class="form-group">
        <label for="alamat_domisili">Alamat Domisili</label>
        <input type="text" class="form-control" id="alamat_domisili" name='alamat_domisili'>
      </div>

      <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <input type="text" class="form-control" id="provinsi" name='provinsi'>
      </div>

      <div class="form-group">
        <label for="kabupaten">Kabupaten</label>
        <input type="text" class="form-control" id="kabupaten" name='kabupaten'>
      </div>

      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <input type="text" class="form-control" id="kecamatan" name='kecamatan'>
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

      <div class="form-group">
        <label for="id_pengguna"> </label>
        <input type="hidden" class="form-control" id="id_pengguna" name='id_pengguna' placeholder='id_pengguna' value="<?php echo $_SESSION['id']; ?>">
      </div>
      <input type='submit' name='insert' value='Save' class='btn btn-primary btn-lg btn-block'>
    </form>
    <div class="pt-3">

    </div>
  </div>
</div>