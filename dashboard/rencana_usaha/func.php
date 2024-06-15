<?php


function GetAll(){
  $query = "SELECT * FROM rencana_usaha";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'],
		'modal' => $data['modal'],
		'saham' => $data['saham'],
		'jumlah_tenaga_kerja' => $data['jumlah_tenaga_kerja'],
		'nilai_produksi' => $data['nilai_produksi'],
		'nilai_investasi' => $data['nilai_investasi'],
		
    );
  }
  return $datas;
}

function GetOne($id){
  $query = "SELECT * FROM  `rencana_usaha` WHERE  `id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'], 
		'modal' => $data['modal'], 
		'saham' => $data['saham'], 
		'jumlah_tenaga_kerja' => $data['jumlah_tenaga_kerja'], 
		'nilai_produksi' => $data['nilai_produksi'], 
		'nilai_investasi' => $data['nilai_investasi'], 
		
    );
  }
return $datas;
}

function Insert(){
  $id = $_SESSION['id'];
  $modal=$_POST['modal']; 
		$saham=$_POST['saham']; 
		$jumlah_tenaga_kerja=$_POST['jumlah_tenaga_kerja']; 
		$nilai_produksi=$_POST['nilai_produksi']; 
		$nilai_investasi=$_POST['nilai_investasi']; 
		
  $query = "INSERT INTO `rencana_usaha` (`id`,`modal`,`saham`,`jumlah_tenaga_kerja`,`nilai_produksi`,`nilai_investasi`)
VALUES ($id,'$modal','$saham','$jumlah_tenaga_kerja','$nilai_produksi','$nilai_investasi')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=rencana_usaha/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=rencana_usaha/index"
    </script>'; 
  }
}
function Update($id){
  $modal=$_POST['modal']; 
		$saham=$_POST['saham']; 
		$jumlah_tenaga_kerja=$_POST['jumlah_tenaga_kerja']; 
		$nilai_produksi=$_POST['nilai_produksi']; 
		$nilai_investasi=$_POST['nilai_investasi']; 
		
  $query = "UPDATE `rencana_usaha` SET `modal` = '$modal',`saham` = '$saham',`jumlah_tenaga_kerja` = '$jumlah_tenaga_kerja',`nilai_produksi` = '$nilai_produksi',`nilai_investasi` = '$nilai_investasi' WHERE  `id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=rencana_usaha/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=rencana_usaha/index"
    </script>'; 
  }
}
function Delete($id){
  $query = "DELETE FROM `rencana_usaha` WHERE `id` = '$id'";
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
