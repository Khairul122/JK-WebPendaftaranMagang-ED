
<?php
require_once 'func.php';
$id = $_POST['id'];
$one = GetOne($id);
?>

        <div class='panel panel-info'>
          <div class='panel-heading'><h3>Form Edit badan usaha</h3> </div>
          <div class='panel-body'>
            <form action='' method='POST'>
            <input type='hidden' name='id' value="<?php echo $_POST['id']; ?>">
            <?php
            foreach($one as $data){?>
               
                <div class="form-group">
                  <label for="nama_usaha"> nama usaha:</label>
                  <input type="text" class="form-control" id="nama_usaha" name='nama_usaha' value="<?php echo $data['nama_usaha']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="pemilik_usaha"> pemilik usaha:</label>
                  <input type="text" class="form-control" id="pemilik_usaha" name='pemilik_usaha' value="<?php echo $data['pemilik_usaha']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="alamat"> alamat:</label>
                  <input type="text" class="form-control" id="alamat" name='alamat' value="<?php echo $data['alamat']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="provinsi"> provinsi:</label>
                  <input type="text" class="form-control" id="provinsi" name='provinsi' value="<?php echo $data['provinsi']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="kota"> kota:</label>
                  <input type="text" class="form-control" id="kota" name='kota' value="<?php echo $data['kota']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="kecamatan"> kecamatan:</label>
                  <input type="text" class="form-control" id="kecamatan" name='kecamatan' value="<?php echo $data['kecamatan']; ?>">
                </div>
                <div class="form-group">
                <label for="komoditas">komoditas:</label>
                <input type="text" class="form-control" id="komoditas" name='komoditas' value="<?php echo $data['komoditas']; ?>">
              </div>
                <div class="form-group">
                  <label for="kategori_usaha"> kategori usaha:</label>
                  <input type="text" class="form-control" id="kategori_usaha" name='kategori_usaha' value="<?php echo $data['kategori_usaha']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="bentuk_usaha"> bentuk usaha:</label>
                  <input type="text" class="form-control" id="bentuk_usaha" name='bentuk_usaha' value="<?php echo $data['bentuk_usaha']; ?>">
                </div>
            
                <div class="form-group">
                  <label for="status_tanah_usaha"> status tanah usaha:</label>
                  <input type="text" class="form-control" id="status_tanah_usaha" name='status_tanah_usaha' value="<?php echo $data['status_tanah_usaha']; ?>">
                </div>
            
            <?php } ?>
            <input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
            </form>

          </div>
        </div>

    
