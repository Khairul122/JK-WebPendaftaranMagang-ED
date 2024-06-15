<?php
require_once 'func.php';
$id_lowongan = $_POST['id_lowongan'];
$one = GetOne($id_lowongan);
?>

<div class='panel panel-info'>
  <div class='panel-heading'>
    <h3>Form Edit Lowongan</h3>
  </div>
  <div class='panel-body'>
    <form action='' method='POST'>
      <input type='hidden' name='id_lowongan' value="<?php echo $_POST['id_lowongan']; ?>">
      <?php
      foreach ($one as $data) { ?>

        <div class="form-group">
          <label for="nama_perusahaan">Nama Perusahaan</label>
          <input type="text" class="form-control" id="nama_perusahaan" name='nama_perusahaan' value="<?php echo $data['nama_perusahaan']; ?>">
        </div>

        <div class="form-group">
          <label for="bidang">Bidang</label>
          <input type="text" class="form-control" id="bidang" name='bidang' value="<?php echo $data['bidang']; ?>">
        </div>

        <div class="form-group pt-3">
          <label for="kuota">Kuota</label>
          <input type="number" class="form-control" id="kuota" name='kuota' value="<?php echo $data['kuota']; ?>">
        </div>

        <div class="form-group">
          <label for="valid_until">Valid Until</label>
          <input type="date" class="form-control" id="valid_until" name='valid_until' value="<?php echo $data['valid_until']; ?>">
        </div>

        <div class="form-group">
          <label for="persyaratan">Persyaratan</label>
          <textarea class="form-control" id="persyaratan" name='persyaratan' rows="5"><?php echo $data['persyaratan']; ?></textarea>
        </div>

      <?php } ?>
      <input type='submit' name='update' value='Save' class='btn btn-primary btn-lg btn-block'>
      <a href='?r=lowongan/index' class="btn btn-secondary btn-lg btn-block">Kembali</a>
    </form>
  </div>
</div>
