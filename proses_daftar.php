<?php
require_once 'config/conn.php';

$nama=$_POST['nama']; 
		$no_hp=$_POST['no_hp']; 
		$email=$_POST['email']; 
		$password=$_POST['password']; 
        $hak_pengguna = 'user';
		
  $query = "INSERT INTO `pengguna` (`id`,`nama`,`no_hp`,`email`,`password`,`hak_pengguna`)
VALUES (NULL,'$nama','$no_hp','$email','$password','$hak_pengguna')";
$exe = mysqli_query(Connect(),$query);
  if($exe){
    // kalau berhasil
    echo '
    <script>
   alert("Telah Berhasil Mendaftar")
    </script>'; 
    echo '
    <script>
    window.location = "masuk.php"
    </script>'; 
  }
  else{
    alert("Gagal  Mendaftar");
    echo '
    <script>
    window.location = "daftar.php"
    </script>'; 
  }
?>