
<?php
require_once 'func.php';
?>

        <div class='panel panel-info'>
          <div class='panel-heading'><h3>Form Input komoditas</h3> </div>
          <div class='panel-body'>
          <form action='' method='POST'>
          
              <div class="form-group">
                <label for="komoditas"> komoditas:</label>
                <input type="text" class="form-control" id="komoditas" name='komoditas' placeholder='komoditas'>
              </div>
              <div class="form-group">
                <label for="deskripsi"> deskripsi:</label>
                <input type="text" class="form-control" id="deskripsi" name='deskripsi' placeholder='deskripsi'>
              </div><input type='submit' name='insert' value='Save' class='btn btn-sm btn-primary'>
          </form>
          </div>
        </div>
   

