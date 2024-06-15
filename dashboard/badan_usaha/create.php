
<?php
require_once 'func.php';
var_dump($_POST);
?>

        <div class='panel panel-info'>
          <div class='panel-heading'>Form Input badanusaha </div>
          <div class='panel-body'>
          <form action='' method='POST'>
          
              <div class="form-group">
                <label for="nama_usaha"> nama_usaha:</label>
                <input type="text" class="form-control" id="nama_usaha" name='nama_usaha' placeholder='nama_usaha'>
              </div>
              <div class="form-group">
                <label for="pemilik_usaha"> pemilik_usaha:</label>
                <input type="text" class="form-control" id="pemilik_usaha" name='pemilik_usaha' placeholder='pemilik_usaha'>
              </div>
              <div class="form-group">
                <label for="alamat"> alamat:</label>
                <input type="text" class="form-control" id="alamat" name='alamat' placeholder='alamat'>
              </div>
              <div class="form-group">
                <label for="provinsi"> provinsi:</label>
                <input type="text" class="form-control" id="provinsi" name='provinsi' placeholder='provinsi'>
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
                <input type="text" class="form-control" id="komoditas" name='komoditas' placeholder='komoditas'>
              </div>
              <div class="form-group">
                <label for="kategori_usaha"> kategori_usaha:</label>
                <select  class="form-control" id="kategori_usaha" name='kategori_usaha'>
              <option value="">-- Pilih Kategori --</option>
                <option>Besar</option>
                <option>Menengah</option>
                <option>Kecil</option>
                <option>Mikro</option>
              </select>
              </div>
              <div class="form-group">
                <label for="bentuk_usaha"> bentuk_usaha:</label>
              
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
                <label for="status_tanah_usaha"> status_tanah_usaha:</label>
        
                <select  class="form-control" id="status_tanah_usaha" name='status_tanah_usaha'>
                <option value="">-- Pilih Status Tanah Usaha --</option>
                  <option>Hak Milik</option>
                  <option>Sewa</option>
                </select>
              </div><input type='submit' name='insert' value='Save' class='btn btn-sm btn-primary'>
          </form>
          </div>
        </div>
   

