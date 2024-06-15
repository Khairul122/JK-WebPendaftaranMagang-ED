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
        <label for="nama_perus">Nama Perusahaan</label>
        <input type="text" class="form-control" id="nama_perus" name='nama_perus' placeholder='Nama Perusahaan'>
      </div>
      <div class="form-group pt-3">
        <label for="bidang">Bidang</label>
        <input type="text" class="form-control" id="bidang" name='bidang' placeholder='Bidang'>
      </div>
      <div class="form-group">
        <label for="valid_until">Valid Until</label>
        <input type="date" class="form-control" id="valid_until" name='valid_until'>
      </div>
      <div class="form-group">
        <label for="persyaratan_khusus">Persyaratan Khusus</label>
        <textarea class="form-control" id="persyaratan_khusus" name="persyaratan_khusus" rows="5"></textarea>
      </div>
      <div class="form-group">
        <label for="id_pengguna"> </label>
        <input type="hidden" class="form-control" id="id_pengguna" name='id_pengguna' placeholder='id_pengguna' value="<?php echo $_SESSION['id']; ?>">
      </div><input type='submit' name='insert' value='Save' class='btn btn-primary btn-lg btn-block'>
    </form>
    <div class="pt-3">
      <a href='?r=lowongan/index' class="btn btn-secondary btn-lg btn-block">Kembali</a>
    </div>
  </div>
</div>