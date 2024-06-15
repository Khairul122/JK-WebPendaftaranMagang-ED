<?php
require_once 'func.php';
$id_berita = $_POST['id_berita'];
$one = GetOne($id_berita);
?>

<div class='container'>
  <div class='col-sm-1'></div>
  <div class='col-sm-10'>
    <div class='panel panel-info'>
      <div class='panel-heading'>
        <h3>Form Edit Berita</h3>
      </div>
      <div class='panel-body'>
        <form action='' method='POST' enctype="multipart/form-data">
          <input type='hidden' name='id_berita' value="<?php echo $_POST['id_berita']; ?>">
          <?php
          foreach ($one as $data) { ?>

            <div class="form-group">
              <label for="judul"> Judul:</label>
              <input type="text" class="form-control" id="judul" name='judul' value="<?php echo $data['judul']; ?>">
            </div>

            <div class="form-group">
              <label for="keterangan"> Keterangan:</label>
              <textarea class="form-control" id="keterangan" name='keterangan'><?php echo $data['keterangan']; ?></textarea>
            </div>

            <div class="form-group">
              <label for="foto"> Foto:</label>
              <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>


            <div class="form-group">
              <label for="tanggal"> Tanggal:</label>
              <input type="date" class="form-control" id="tanggal" name='tanggal' value="<?php echo $data['tanggal']; ?>">
            </div>

          <?php } ?>
          <input type='submit' name='update' value='Save' class='btn btn-warning btn-lg'>
        </form>

      </div>
    </div>
  </div>
</div>