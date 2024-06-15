
<?php
require_once 'func.php';
$id = $_POST['id'];
$one = GetOne($id);
?>

        <div class='panel panel-info'>
          <div class='panel-heading'><h3>Form Edit produk</h3></div>
          <div class='panel-body'>
            <form action='' method='POST'>
            <input type='hidden' name='id' value="<?php echo $_POST['id']; ?>">
            <?php
            foreach($one as $data){?>
               
                <div class="form-group">
                  <label for="produk"> nama produk:</label>
                  <input type="text" class="form-control" id="produk" name='produk' value="<?php echo $data['produk']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="satuan"> satuan:</label>
                  <input type="text" class="form-control" id="satuan" name='satuan' value="<?php echo $data['satuan']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="harga_satuan"> harga satuan:</label>
                  <input type="text" class="form-control" id="harga_satuan" name='harga_satuan' value="<?php echo $data['harga_satuan']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="id_pengguna"></label>
                  <input type="hidden" class="form-control" id="id_pengguna" name='id_pengguna' value="<?php echo $data['id_pengguna']; ?>">
                </div>
            
            <?php } ?>
            <input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
            </form>

          </div>
        </div>

    
