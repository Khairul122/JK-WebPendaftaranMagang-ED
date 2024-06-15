
<?php
require_once 'func.php';
?>

        <div class='panel panel-info'>
          <div class='panel-heading'>Form Input kategori_usaha </div>
          <div class='panel-body'>
          <form action='' method='POST'>
          
              <div class="form-group">
                <label for="nomor"> nomor:</label>
                <input type="text" class="form-control" id="nomor" name='nomor' placeholder='nomor'>
              </div>
              <div class="form-group">
                <label for="judul"> judul:</label>
                <input type="text" class="form-control" id="judul" name='judul' placeholder='judul'>
              </div>
              <div class="form-group">
                <label for="uraian"> uraian:</label>
                <input type="text" class="form-control" id="uraian" name='uraian' placeholder='uraian'>
              </div><input type='submit' name='insert' value='Save' class='btn btn-sm btn-primary'>
          </form>
          </div>
        </div>
   

