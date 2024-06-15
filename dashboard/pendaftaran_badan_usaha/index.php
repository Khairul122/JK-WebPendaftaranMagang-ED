
<?php
require_once 'func.php';

?>


<h3>Badan Usaha</h3>
    <a href='?r=pendaftaran_badan_usaha/create' class='btn btn-info btn-sm'>Daftar</a>
    <br>
    <div class='table-responsive'>
    <table class='table table-bordered'>

      <tr>
      <th>Nama Usaha</th>
 
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['nama_usaha'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Pemilik Usaha </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['pemilik_usaha'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Alamat </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['alamat'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Provinsi </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['provinsi'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Kabupaten/Kota </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['kota'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Kecamatan </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['kecamatan'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Komoditas </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['komoditas'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Kategori Usaha </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['kategori_usaha'];
    }
  }
      ?></th> 
      </tr>
     <tr>
      <th>Bentuk Usaha </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['bentuk_usaha'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Status Tanah Usaha </th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['status_tanah_usaha'];
    }
  }
      ?></th> 
      </tr>
      <tr>
      <th>Status Verifikasi</th>
      <th> <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo $data['status'];
    }
  }
      ?></th> 
      </tr>
      <tr>

        <td>
        <form method='POST' action='?r=pendaftaran_badan_usaha/edit'>
                <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo "  <input type='hidden' name='id' value='".$data['id']."'>";
    }
  }
      ?>
             
                <input type='submit' name='edit' Value='Ubah Data Usaha' class='btn btn-warning btn-sm'>
                </form>   
        </td>

        <td>
        <form method='POST' action=''>
    <?php
      $ga = GetOne($_SESSION['id']);
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
     echo "  <input type='hidden' name='id' value='".$data['id']."'>";
    }
  }
      ?>
              
                <input type='submit' name='delete' Value='Hapus Data Usaha' class='btn btn-danger btn-sm'>
            
               
                

                </form>
        </td>
      </tr>

 


   
      


    </table>
    
              
    </div>

   



