
<?php
require_once 'func.php';

?>
    <h3>Rencana Usaha</h3>

    <?php
    if(!empty($_SESSION['message'])){ ?>
      <div class="alert alert-<?php echo $_SESSION['mType'];?> alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Notif !</strong> <?php echo $_SESSION['message']; ?>
      </div>
      <br>
     
    <?php } ?>

    <a href='?r=rencana_usaha/create' class='btn btn-info btn-sm'>Tambah</a>
    <br>
    <div class='table-responsive'>
    <table class='table table-hover'>
  
      <tr>
      <th>Modal </th>
      <th>   <?php
      $ga = GetAll();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
       echo $data['modal'];
      }
    }
      ?></th>
      </tr>
      <tr>
      <th>Modal </th>
      <th>   <?php
      $ga = GetAll();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
       echo $data['modal'];
      }
    }
      ?></th>
       <tr>
      <th>Saham </th>
      <th>   <?php
      $ga = GetAll();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
       echo $data['saham'];
      }
    }
      ?></th>
      </tr>
      <tr>
      <th>Jumlah Tenaga Kerja</th>
      <th>   <?php
      $ga = GetAll();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
       echo $data['jumlah_tenaga_kerja'];
      }
    }
      ?></th>
       <tr>
      <th>Nilai Produksi</th>
      <th>   <?php
      $ga = GetAll();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
       echo $data['nilai_produksi'];
      }
    }
      ?></th>
       <tr>
      <th>Nilai Investasi</th>
      <th>   <?php
      $ga = GetAll();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
       echo $data['nilai_investasi'];
      }
    }
      ?></th>
        <tr>

<td>
<form method='POST' action='?r=rencana_usaha/edit'>
        <?php
$ga = GetOne($_SESSION['id']);
$no = 1;
if(isset($ga)){
foreach($ga as $data){
echo "  <input type='hidden' name='id' value='".$data['id']."'>";
}
}
?>
     
        <input type='submit' name='edit' Value='Ubah Rencana Usaha' class='btn btn-warning btn-sm'>
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
      
        <input type='submit' name='delete' Value='Hapus Rencana Usaha' class='btn btn-danger btn-sm'>
    
       
        

        </form>
</td>
</tr>
      </tr>
      </tr>
      </tr>
      </tr>
      
   
 
      


    </table>
    </div>

   



