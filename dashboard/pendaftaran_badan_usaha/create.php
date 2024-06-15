
<?php
require_once 'func.php';
?>
<head>
<link href="dist/select2.min.css" rel="stylesheet" />
<script src="dist/select2.min.js"></script>
</head>
        <div class='panel panel-info'>
          <div class='panel-heading'>Pendaftaran Badah Usaha </div>
          <div class='panel-body'>
          <form action='' method='POST'>
          
              <div class="form-group">
                <label for="nama_usaha"> nama usaha:</label>
                <input type="text" class="form-control" id="nama_usaha" name='nama_usaha' placeholder='nama usaha'>
              </div>
              <div class="form-group">
                <label for="pemilik_usaha"> pemilik usaha:</label>
                <input type="text" class="form-control" id="pemilik_usaha" name='pemilik_usaha' placeholder='pemilik usaha'>
              </div>
              <div class="form-group">
                <label for="alamat"> alamat:</label>
                <input type="text" class="form-control" id="alamat" name='alamat' placeholder='alamat'>
              </div>
              <div class="form-group">
                <label for="provinsi"> provinsi:</label>
                <input type="text" class="form-control" id="provinsi" name='provinsi' placeholder='provinsi' value="Nusa Tengara Barat">
              </div>
              <div class="form-group">
                <label for="kota"> kota:</label>
                <input type="text" class="form-control" id="kota" name='kota' placeholder='kota'>
              </div>
              <div class="form-group">
                <label for="kecamatan"> kecamatan:</label>
                <input type="text" class="form-control" id="kecamatan" name='kecamatan' placeholder='kecamatan'>
              </div>
              <div class="form-group">
                <label for="komoditas">komoditas:</label>
             
               
                <select  class="form-control" id="komoditas" name='komoditas' multiple>
          
              <?php 
              $query = mysqli_query(Connect(),"SELECT * FROM komoditas ORDER BY komoditas");
              while($data = mysqli_fetch_array($query)){
              ?>
                <option><?= $data['komoditas'] ?></option>
                <?php } ?>
              </select>
          
              </div>
              <div class="form-group">
                <label for="kategori_usaha"> kategori usaha:</label>
            
              <select  class="form-control" id="kategori_usaha" name='kategori_usaha'>
              <option value="">-- Pilih Kategori --</option>
                <option>Besar</option>
                <option>Menengah</option>
                <option>Kecil</option>
                <option>Mikro</option>
              </select>
              </div>
              <div class="form-group">
                <label for="bentuk_usaha"> bentuk usaha:</label>
               
              <select class="form-control" id="bentuk_usaha" name='bentuk_usaha'>
                <option value="">-- Pilih Bentuk Usaha --</option>
    <option>Perusahaan Perseorangan (PO)</option>
    <option>Persekutuan Perdata (PP)</option>
    <option>Persekutuan Firma (PF)</option>
    <option>Persekutan Komanditer (CV)</option>
    <option>Perseroan Terbatas (PT)</option>
              </select>
              </div>
              <div class="form-group">
                <label for="status_tanah_usaha"> status tanah usaha:</label>
                
                <select  class="form-control" id="status_tanah_usaha" name='status_tanah_usaha'>
                <option value="">-- Pilih Status Tanah Usaha --</option>
                  <option>Hak Milik</option>
                  <option>Sewa</option>
                </select>
              </div><input type='submit' name='insert' value='Kirim' class='btn btn-sm btn-primary'>
          </form>
          </div>
        </div>
   

