<?php
require_once 'func.php';
$id_mentor = $_POST['id_mentor'];
$one = GetOne($id_mentor);
?>

<div class='container'>
  <div class='col-sm-1'></div>
  <div class='col-sm-10'>
    <div class='panel panel-info'>
      <div class='panel-heading'>
        <h3>Form Edit Mentor</h3>
      </div>
      <div class='panel-body'>
        <form action='' method='POST'>
          <input type='hidden' name='id_mentor' value="<?php echo $_POST['id_mentor']; ?>">
          <?php
          foreach ($one as $data) { ?>

            <div class="form-group">
              <label for="nama_mentor"> Nama Mentor:</label>
              <input type="text" class="form-control" id="nama_mentor" name='nama_mentor' value="<?php echo $data['nama_mentor']; ?>">
            </div>

          <?php } ?>
          <input type='submit' name='update' value='Save' class='btn btn-warning btn-lg'>
        </form>

      </div>
    </div>
  </div>
</div>
