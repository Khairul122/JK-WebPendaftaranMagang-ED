
<?php
require_once 'func.php';
$id = $_POST['id'];
$one = GetOne($id);
?>

        <div class='panel panel-info'>
          <div class='panel-heading'>Form Edit kategori_usaha </div>
          <div class='panel-body'>
            <form action='' method='POST'>
            <input type='hidden' name='id' value="<?php echo $_POST['id']; ?>">
            <?php
            foreach($one as $data){?>
               
                <div class="form-group">
                  <label for="nomor"> nomor:</label>
                  <input type="text" class="form-control" id="nomor" name='nomor' value="<?php echo $data['nomor']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="judul"> judul:</label>
                  <input type="text" class="form-control" id="judul" name='judul' value="<?php echo $data['judul']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="uraian"> uraian:</label>
                  <input type="text" class="form-control" id="uraian" name='uraian' value="<?php echo $data['uraian']; ?>">
                </div>
            
            <?php } ?>
            <input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
            </form>

          </div>
        </div>

    
