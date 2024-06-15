<?php



function GetOne($id){
  $query = "SELECT * FROM  `badan_usaha` WHERE  `id` =  '$id'";
  $exe = mysqli_query(Connect(),$query);
  while($data = mysqli_fetch_array($exe)){
    $datas[] = array('id' => $data['id'], 
		'nama_usaha' => $data['nama_usaha'], 
		'pemilik_usaha' => $data['pemilik_usaha'], 
		'alamat' => $data['alamat'], 
		'provinsi' => $data['provinsi'], 
		'kota' => $data['kota'], 
    'kecamatan' => $data['kecamatan'], 
    'komoditas' => $data['komoditas'],
		'kategori_usaha' => $data['kategori_usaha'], 
		'bentuk_usaha' => $data['bentuk_usaha'], 
    'status_tanah_usaha' => $data['status_tanah_usaha'], 
    'status' => $data['status'], 
		
    );
  }
return $datas;
}

function Insert(){
  $id = $_SESSION['id'];
  $nama_usaha=$_POST['nama_usaha']; 
		$pemilik_usaha=$_POST['pemilik_usaha']; 
		$alamat=$_POST['alamat']; 
		$provinsi=$_POST['provinsi']; 
		$kota=$_POST['kota']; 
    $kecamatan=$_POST['kecamatan']; 
    $komoditas=$_POST['komoditas']; 
		$kategori_usaha=$_POST['kategori_usaha']; 
		$bentuk_usaha=$_POST['bentuk_usaha']; 
    $status_tanah_usaha=$_POST['status_tanah_usaha']; 
    $status = "Menunggu";
		
  $query = "INSERT INTO `badan_usaha` (`id`,`nama_usaha`,`pemilik_usaha`,`alamat`,`provinsi`,`kota`,`kecamatan`,`komoditas`,`kategori_usaha`,`bentuk_usaha`,`status_tanah_usaha`,`status`)
VALUES ('$id','$nama_usaha','$pemilik_usaha','$alamat','$provinsi','$kota','$kecamatan','$komoditas','$kategori_usaha','$bentuk_usaha','$status_tanah_usaha','$status')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah disimpan ";
    $_SESSION['mType'] = "success ";
  echo '<script>window.location = "?r=pendaftaran_badan_usaha/index"</script>';
  }
  else{
    $_SESSION['message'] = " Data Gagal disimpan ";
    $_SESSION['mType'] = "danger ";
    echo '<script>window.location = "?r=pendaftaran_badan_usaha/index"</script>';
  }
}
function Update($id){
  $nama_usaha=$_POST['nama_usaha']; 
		$pemilik_usaha=$_POST['pemilik_usaha']; 
		$alamat=$_POST['alamat']; 
		$provinsi=$_POST['provinsi']; 
		$kota=$_POST['kota']; 
    $kecamatan=$_POST['kecamatan']; 
    $komoditas=$_POST['komoditas']; 
		$kategori_usaha=$_POST['kategori_usaha']; 
		$bentuk_usaha=$_POST['bentuk_usaha']; 
		$status_tanah_usaha=$_POST['status_tanah_usaha']; 
		
    $query = "UPDATE `badan_usaha` SET `nama_usaha` = '$nama_usaha',`pemilik_usaha` = '$pemilik_usaha',`alamat` = '$alamat',`provinsi` = '$provinsi',`kota` = '$kota',`kecamatan` = '$kecamatan',`komoditas` = '$komoditas',`kategori_usaha` = '$kategori_usaha',`bentuk_usaha` = '$bentuk_usaha',`status_tanah_usaha` = '$status_tanah_usaha' WHERE  `id` =  '$id'";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    $_SESSION['message'] = " Data Sudah diubah ";
    $_SESSION['mType'] = "success ";
    echo '
    <script>
    window.location = "?r=pendaftaran_badan_usaha/index"
    </script>'; 
  }
  else{
    $_SESSION['message'] = " Data Gagal diubah ";
    $_SESSION['mType'] = "danger ";
    echo '
    <script>
    window.location = "?r=pendaftaran_badan_usaha/index"
    </script>'; 
 
  }
}
function Delete($id){
  $query = "DELETE FROM `badan_usaha` WHERE `id` = '$id'";
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
