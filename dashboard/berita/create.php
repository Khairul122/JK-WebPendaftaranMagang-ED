<?php
require_once 'func.php';
?>

<div class='container'>
  <div class='col-sm-1'></div>
  <div class='col-sm-10'>
    <div class='panel panel-info'>
      <div class='panel-heading'>
        <h3>Form Input Berita</h3>
      </div>
      <br>
      <div class='panel-body'>
        <form action='' method='POST' enctype="multipart/form-data">

          <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control" id="judul" name='judul' placeholder='Judul Berita' required>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan Berita</label>
            <textarea class="form-control" id="keterangan" name='keterangan' rows='5' placeholder='Keterangan Berita' required></textarea>
          </div>
          <div class="form-group">
            <label for="foto">Upload Foto</label>
            <input type="file" class="form-control-file" id="foto" name="foto" accept=".jpg, .jpeg, .png">
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal Berita</label>
            <input type="date" class="form-control" id="tanggal" name='tanggal' required>
          </div>
          <input type='submit' name='insert' value='Save' class='btn btn-primary btn-lg'>
        </form>
      </div>
    </div>
  </div>
  <div class='col-sm-1'></div>
</div>