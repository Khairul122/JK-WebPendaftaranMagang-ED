<?php


function GetAll(){
  $query = "SELECT * FROM produk";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'],
		'produk' => $data['produk'],
		'satuan' => $data['satuan'],
		'harga_satuan' => $data['harga_satuan'],
		'id_pengguna' => $data['id_pengguna'],
		
    );
  }
  return $datas;
}
function GetByUser($id_pengguna){
  $query = "SELECT * FROM produk WHERE id_pengguna = '$id_pengguna'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'],
		'produk' => $data['produk'],
		'satuan' => $data['satuan'],
		'harga_satuan' => $data['harga_satuan'],
		'id_pengguna' => $data['id_pengguna'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `produk` WHERE  `id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'], 
		'produk' => $data['produk'], 
		'satuan' => $data['satuan'], 
		'harga_satuan' => $data['harga_satuan'], 
		'id_pengguna' => $data['id_pengguna'], 
		
    );
  }
return $datas;
}

function Insert(){
  $produk=$_POST['produk']; 
		$satuan=$_POST['satuan']; 
		$harga_satuan=$_POST['harga_satuan']; 
		$id_pengguna=$_POST['id_pengguna']; 
		
  $query = "INSERT INTO `produk` (`id`,`produk`,`satuan`,`harga_satuan`,`id_pengguna`)
VALUES (NULL,'$produk','$satuan','$harga_satuan','$id_pengguna')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=produk/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=produk/index"
    </script>'; 
  }
}
function Update($id){
  $produk=$_POST['produk']; 
		$satuan=$_POST['satuan']; 
		$harga_satuan=$_POST['harga_satuan']; 
		$id_pengguna=$_POST['id_pengguna']; 
		
  $query = "UPDATE `produk` SET `produk` = '$produk',`satuan` = '$satuan',`harga_satuan` = '$harga_satuan',`id_pengguna` = '$id_pengguna' WHERE  `id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=produk/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=produk/index"
    </script>'; 
  }
}
function Delete($id){
  $query = "DELETE FROM `produk` WHERE `id` = '$id'";
  $exe = mysqli_query(Connect(),$query);
    if($exe){
      // kalau berhasil
      $_SESSION['message'] = " Data Sudah dihapus ";
      $_SESSION['mType'] = "success ";
  
    }
    else{
      $_SESSION['message'] = " Data Gagal dihapus ";
      $_SESSION['mType'] = "danger ";

    }
}


if(isset($_POST['insert'])){
  Insert();
}
else if(isset($_POST['update'])){
  Update($_POST['id']);
}
else if(isset($_POST['delete'])){
  Delete($_POST['id']);
}
?>
