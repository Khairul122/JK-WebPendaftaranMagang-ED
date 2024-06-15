
<?php
require_once 'func.php';
$id = $_POST['id'];
$one = GetOne($id);
?>

        <div class='panel panel-info'>
          <div class='panel-heading'><h3>Form Edit komoditas</h3></div>
          <div class='panel-body'>
            <form action='' method='POST'>
            <input type='hidden' name='id' value="<?php echo $_POST['id']; ?>">
            <?php
            foreach($one as $data){?>
               
                <div class="form-group">
                  <label for="komoditas"> komoditas:</label>
                  <input type="text" class="form-control" id="komoditas" name='komoditas' value="<?php echo $data['komoditas']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="deskripsi"> deskripsi:</label>
                  <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="<?php echo $data['deskripsi']; ?>">
                </div>
            
            <?php } ?>
            <input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
            </form>

          </div>
        </div>

    
