
<?php
require_once 'func.php';
?>

        <div class='panel panel-info'>
          <div class='panel-heading'><h3>Form Input produk</h3></div>
          <div class='panel-body'>
          <form action='' method='POST'>
          
              <div class="form-group">
                <label for="produk"> nama produk:</label>
                <input type="text" class="form-control" id="produk" name='produk' placeholder='produk'>
              </div>
              <div class="form-group">
                <label for="satuan"> satuan:</label>
                <input type="text" class="form-control" id="satuan" name='satuan' placeholder='satuan'>
              </div>
              <div class="form-group">
                <label for="harga_satuan"> harga satuan:</label>
                <input type="text" class="form-control" id="harga_satuan" name='harga_satuan' placeholder='harga_satuan'>
              </div>
              <div class="form-group">
                <label for="id_pengguna"> </label>
                <input type="hidden" class="form-control" id="id_pengguna" name='id_pengguna' placeholder='id_pengguna'  value="<?php echo $_SESSION['id']; ?>">
              </div><input type='submit' name='insert' value='Save' class='btn btn-sm btn-primary'>
          </form>
          </div>
        </div>
   

