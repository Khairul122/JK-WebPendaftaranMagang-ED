
<?php
require_once 'func.php';

?>
    <h3>Kategori Usaha</h3>

    <?php
    if(!empty($_SESSION['message'])){ ?>
      <div class="alert alert-<?php echo $_SESSION['mType'];?> alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Notif !</strong> <?php echo $_SESSION['message']; ?>
      </div>
      <br>
     
    <?php } ?>
    <a href='?r=kategori_usaha/create' class='btn btn-info btn-sm'>Tambah</a>
    <br>

    <div class='table-responsive'>
    <table class='table table-hover'>
    <thead>
      <tr>
      <th>No</th>
    <th>nomor</th> 
<th>judul</th> 
<th>uraian</th> 

      <th colspan='2'>Opsi</th>
      </tr>
      </thead>
      <tbody>
    <?php
      $ga = GetAll();
      $no = 1;
      if(isset($ga)){
      foreach($ga as $data){
        echo "<tr>";
        echo "<td>".$no++."</td>"; 
echo "<td>".$data['nomor']."</td>"; 
echo "<td>".$data['judul']."</td>"; 
echo "<td>".$data['uraian']."</td>"; 

        echo "<td>

                <form method='POST' action='?r=kategori_usaha/edit'>
                <input type='hidden' name='id' value='".$data['id']."'>
                <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>

                

                </form>
              </td>";
        echo "<td>
                <form method='POST' action=''>
                <input type='hidden' name='id' value='".$data['id']."'>
                <input type='submit' name='delete' Value='Delete' class='btn btn-danger btn-sm'>
                </form>
                </td></tr>";
    }
  }
      ?>
      

    </tbody>
    </table>
    </div>

   



