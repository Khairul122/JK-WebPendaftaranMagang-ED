
<?php
require_once 'func.php';

?>


<h3>Verifikasi Usaha</h3>

    <br>
    <div class='table-responsive'>
    <table class='table table-hover table-bordered table-sm'>
    <thead>
      <tr>
      <th>No</th>
    <th>namausaha</th> 
<th>pemilik</th> 
<th>alamat</th> 
<th>provinsi</th> 
<th>kota</th> 
<th>kecamatan</th> 
<th>kategori usaha</th> 
<th>bentuk usaha</th> 
<th>status</th> 

      <th colspan='2'>Persetujuan</th>
      </tr>
      </thead>
      <tbody>
    <?php
      $ga = GetByStatus();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
        echo "<tr>";
        echo "<td>".$no++."</td>"; 
echo "<td>".$data['nama_usaha']."</td>"; 
echo "<td>".$data['pemilik_usaha']."</td>"; 
echo "<td>".$data['alamat']."</td>"; 
echo "<td>".$data['provinsi']."</td>"; 
echo "<td>".$data['kota']."</td>"; 
echo "<td>".$data['kecamatan']."</td>"; 
echo "<td>".$data['kategori_usaha']."</td>"; 
echo "<td>".$data['bentuk_usaha']."</td>"; 
echo "<td><font color='red'>".$data['status']."</font></td>"; 

        echo "<td>
                 <div class=\"btn-group\">
                <form method='POST' action=''>
                <input type='hidden' name='id' value='".$data['id']."'>
                <input type='submit' name='verifikasi' Value='Verifikasi' class='btn btn-success btn-sm'>

                

                </form>
              
                
              </td>";
        echo "</tr>";
    }
  }
      ?>
      

    </tbody>
    </table>
    </div>

   



