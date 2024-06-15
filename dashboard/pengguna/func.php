<?php


function GetAll(){
  $query = "SELECT * FROM pengguna";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'],
		'nama' => $data['nama'],
		'no_hp' => $data['no_hp'],
		'email' => $data['email'],
		'password' => $data['password'],
		'hak_pengguna' => $data['hak_pengguna'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `pengguna` WHERE  `id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'], 
		'nama' => $data['nama'], 
		'no_hp' => $data['no_hp'], 
		'email' => $data['email'], 
		'password' => $data['password'], 
		'hak_pengguna' => $data['hak_pengguna'], 
		
    );
  }
return $datas;
}

function Insert(){
  $nama=$_POST['nama']; 
		$no_hp=$_POST['no_hp']; 
		$email=$_POST['email']; 
		$password=$_POST['password']; 
		$hak_pengguna=$_POST['hak_pengguna']; 
		
  $query = "INSERT INTO `pengguna` (`id`,`nama`,`no_hp`,`email`,`password`,`hak_pengguna`)
VALUES (NULL,'$nama','$no_hp','$email','$password','$hak_pengguna')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=pengguna/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=pengguna/index"
    </script>'; 
  }
}
function Update($id){
  $nama=$_POST['nama']; 
		$no_hp=$_POST['no_hp']; 
		$email=$_POST['email']; 
		$password=$_POST['password']; 
		$hak_pengguna=$_POST['hak_pengguna']; 
		
  $query = "UPDATE `pengguna` SET `nama` = '$nama',`no_hp` = '$no_hp',`email` = '$email',`password` = '$password',`hak_pengguna` = '$hak_pengguna' WHERE  `id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=pengguna/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=pengguna/index"
    </script>'; 
  }
}
function Delete($id){
  $query = "DELETE FROM `pengguna` WHERE `id` = '$id'";
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
