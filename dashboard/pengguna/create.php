
<?php
require_once 'func.php';
?>

    <div class='container'>
      <div class='col-sm-1'></div>
      <div class='col-sm-10'>
        <div class='panel panel-info'>
          <div class='panel-heading'><h3>Form Input pengguna</h3></div>
          <div class='panel-body'>
          <form action='' method='POST'>
          
              <div class="form-group">
                <label for="nama"> nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name='nama' placeholder='nama Lengkap' required>
              </div>
              <div class="form-group">
                <label for="no_hp"> no handphone:</label>
                <input type="text" class="form-control" id="no_hp" name='no_hp' placeholder='nomor handphone' required>
              </div>
              <div class="form-group">
                <label for="email"> email:</label>
                <input type="email" class="form-control" id="email" name='email' placeholder='email' required>
              </div>
              <div class="form-group">
                <label for="password"> password:</label>
                <input type="text" class="form-control" id="password" name='password' placeholder='password' required>
              </div>
              <div class="form-group">
                <label for="hak_pengguna"> hak pengguna:</label>
                <select class="form-control" id="hak_pengguna" name='hak_pengguna' required>
                  <option value="">Pilih hak pengguna</option>
                  <option>user</option>
                  <option>admin</option>
                </select>
              </div><input type='submit' name='insert' value='Save' class='btn btn-sm btn-primary'>
          </form>
          </div>
        </div>
      </div>
      <div class='col-sm-1'></div>
    </div>
  

