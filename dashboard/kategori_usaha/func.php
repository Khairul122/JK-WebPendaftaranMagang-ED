<?php


function GetAll(){
  $query = "SELECT * FROM kategori_usaha";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'],
		'nomor' => $data['nomor'],
		'judul' => $data['judul'],
		'uraian' => $data['uraian'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `kategori_usaha` WHERE  `id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'], 
		'nomor' => $data['nomor'], 
		'judul' => $data['judul'], 
		'uraian' => $data['uraian'], 
		
    );
  }
return $datas;
}

function Insert(){
  $nomor=$_POST['nomor']; 
		$judul=$_POST['judul']; 
		$uraian=$_POST['uraian']; 
		
  $query = "INSERT INTO `kategori_usaha` (`id`,`nomor`,`judul`,`uraian`)
VALUES (NULL,'$nomor','$judul','$uraian')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=kategori_usaha/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=kategori_usaha/index"
    </script>'; 
  }
}
function Update($id){
  $nomor=$_POST['nomor']; 
		$judul=$_POST['judul']; 
		$uraian=$_POST['uraian']; 
		
  $query = "UPDATE `kategori_usaha` SET `nomor` = '$nomor',`judul` = '$judul',`uraian` = '$uraian' WHERE  `id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=kategori_usaha/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=kategori_usaha/index"
    </script>'; 
  }
}
function Delete($id){
  $query = "DELETE FROM `kategori_usaha` WHERE `id` = '$id'";
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
