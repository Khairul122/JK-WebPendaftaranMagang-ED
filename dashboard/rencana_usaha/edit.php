
<?php
require_once 'func.php';
$id = $_POST['id'];
$one = GetOne($id);
?>

        <div class='panel panel-info'>
          <div class='panel-heading'>Form Edit rencana_usaha </div>
          <div class='panel-body'>
            <form action='' method='POST'>
            <input type='hidden' name='id' value="<?php echo $_POST['id']; ?>">
            <?php
            foreach($one as $data){?>
               
                <div class="form-group">
                  <label for="modal"> modal:</label>
                  <input type="text" class="form-control" id="modal" name='modal' value="<?php echo $data['modal']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="saham"> saham:</label>
                  <input type="text" class="form-control" id="saham" name='saham' value="<?php echo $data['saham']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="jumlah_tenaga_kerja"> jumlah_tenaga_kerja:</label>
                  <input type="text" class="form-control" id="jumlah_tenaga_kerja" name='jumlah_tenaga_kerja' value="<?php echo $data['jumlah_tenaga_kerja']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="nilai_produksi"> nilai_produksi:</label>
                  <input type="text" class="form-control" id="nilai_produksi" name='nilai_produksi' value="<?php echo $data['nilai_produksi']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="nilai_investasi"> nilai_investasi:</label>
                  <input type="text" class="form-control" id="nilai_investasi" name='nilai_investasi' value="<?php echo $data['nilai_investasi']; ?>">
                </div>
            
            <?php } ?>
            <input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
            </form>

          </div>
        </div>

    
