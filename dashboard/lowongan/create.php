<?php
require_once 'func.php';
?>


<div class='panel panel-info'>

  <div class='panel-heading pt-2'>
    <h3>Form Input Lowongan</h3>
  </div>
  <div class='panel-body'>
  <form action='' method='POST'>
  <div class="form-group pt-3">
    <label for="nama_perusahaan">Nama Perusahaan</label>
    <input type="text" class="form-control" id="nama_perusahaan" name='nama_perusahaan' placeholder='Nama Perusahaan' required>
  </div>
  <div class="form-group pt-3">
    <label for="bidang">Bidang</label>
    <input type="text" class="form-control" id="bidang" name='bidang' placeholder='Bidang' required>
  </div>
  <div class="form-group pt-3">
    <label for="kuota">Kuota</label>
    <input type="number" class="form-control" id="kuota" name='kuota' placeholder='Kuota' required>
  </div>
  <div class="form-group">
    <label for="valid_until">Valid Until</label>
    <input type="date" class="form-control" id="valid_until" name='valid_until' required>
  </div>
  <div class="form-group">
    <label for="persyaratan">Persyaratan</label>
    <textarea class="form-control" id="persyaratan" name="persyaratan" rows="5" required></textarea>
  </div>
  <button type="submit" name="insert" class="btn btn-primary btn-lg btn-block">Simpan</button>
</form>
    <div class="pt-3">
      <a href='?r=lowongan/index' class="btn btn-secondary btn-lg btn-block">Kembali</a>
    </div>
  </div>
</div>