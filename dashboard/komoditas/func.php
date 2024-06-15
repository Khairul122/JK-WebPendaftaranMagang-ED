<?php


function GetAll(){
  $query = "SELECT * FROM komoditas";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'],
		'komoditas' => $data['komoditas'],
		'deskripsi' => $data['deskripsi'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `komoditas` WHERE  `id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'], 
		'komoditas' => $data['komoditas'], 
		'deskripsi' => $data['deskripsi'], 
		
    );
  }
return $datas;
}

function Insert(){
  $komoditas=$_POST['komoditas']; 
		$deskripsi=$_POST['deskripsi']; 
		
  $query = "INSERT INTO `komoditas` (`id`,`komoditas`,`deskripsi`)
VALUES (NULL,'$komoditas','$deskripsi')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=komoditas/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=komoditas/index"
    </script>'; 
  }
}
function Update($id){
  $komoditas=$_POST['komoditas']; 
		$deskripsi=$_POST['deskripsi']; 
		
  $query = "UPDATE `komoditas` SET `komoditas` = '$komoditas',`deskripsi` = '$deskripsi' WHERE  `id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=komoditas/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=komoditas/index"
    </script>'; 
  }
}
function Delete($id){
  $query = "DELETE FROM `komoditas` WHERE `id` = '$id'";
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
