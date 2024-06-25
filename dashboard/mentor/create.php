<?php
require_once 'func.php';
?>

<div class='container'>
  <div class='col-sm-1'></div>
  <div class='col-sm-10'>
    <div class='panel panel-info'>
      <div class='panel-heading'>
        <h3>Form Input Mentor</h3>
      </div>
      <br>
      <div class='panel-body'>
        <form action='' method='POST'>

          <div class="form-group">
            <label for="nama_mentor">Nama Mentor</label>
            <input type="text" class="form-control" id="nama_mentor" name='nama_mentor' placeholder='Nama Mentor' required>
          </div>

          <input type='submit' name='insert' value='Save' class='btn btn-primary btn-lg'>
        </form>
      </div>
    </div>
  </div>
  <div class='col-sm-1'></div>
</div>
