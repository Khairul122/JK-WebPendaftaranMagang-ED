<?php 
require_once 'config/conn.php';
$email = $_POST['email'];
$pass  = $_POST ['password'];

$query = "SELECT * FROM  `pengguna` WHERE  `email` =  '$email' AND `password` = '$pass' ";
$exe = mysqli_query(Connect(),$query);

 
$rows = mysqli_num_rows($exe);
session_start();
if($rows == 1){
$data = mysqli_fetch_array($exe);

$_SESSION['id'] = $data['id'];
$_SESSION['auth_key'] = $data['id'].$_COOKIE["PHPSESSID"];
$_SESSION['nama'] = $data['nama'];
$_SESSION['email'] = $data['email'];
$_SESSION['hak'] = $data['hak_pengguna'];
echo '<script>window.location = "dashboard/index.php?r=welcome/index_admin"</script>';
}
else{
    $_SESSION['auth_msg'] = "Username Atau Password Anda Salah";
    echo '<script>window.location = "masuk.php"</script>';
  
}

?>