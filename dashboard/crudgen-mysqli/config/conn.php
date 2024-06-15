
<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Jakarta');
define ("HOST","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME","db_simpesa");
define ("BASE_URL","http://localhost/simpesa/dashboard/");

function Connect(){
    $connect = mysqli_connect(HOST, DB_USER, DB_PASSWORD,DB_NAME);
    if($connect){
        return $connect;
    } else {
      return FALSE;
    }
}
?>
