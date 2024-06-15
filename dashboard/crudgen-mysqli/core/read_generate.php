<?php
function gen_read($table){
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);
$string ="
<?php
require_once 'func.php';

?>


    <?php
    if(!empty(\$_SESSION['message'])){ ?>
      <div class=\"alert alert-<?php echo \$_SESSION['mType'];?> alert-dismissable\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
        <strong>Notif !</strong> <?php echo \$_SESSION['message']; ?>
      </div>
      <br>
     
    <?php } ?>
    <a href='create.php' class='btn btn-info btn-sm'>Tambah</a>
    <br>
    <div class='table-responsive'>
    <table class='table table-hover'>
    <thead>
      <tr>
      <th>No</th>
    ";
        foreach ($nopf as $th) {
         $string .= "<th>".$th['column_name']."</th> \n";
        }
    $string .= "
      <th colspan='2'>Opsi</th>
      </tr>
      </thead>
      <tbody>
    <?php
      \$ga = GetAll();
      \$no = 1;
      foreach(\$ga as \$data){
        echo \"<tr>\";
        echo \"<td>\".\$no++.\"</td>\"; \n";
        foreach ($nopf as $field) {
          $string .="echo \"<td>\".\$data['".$field['column_name']."'].\"</td>\"; \n";
        }
    $string .= "
        echo \"<td>

                <form method='POST' action='edit.php'>
                <input type='hidden' name='$pf' value='\".\$data['$pf'].\"'>
                <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>

                

                </form>
              </td>\";
        echo \"<td>
                <form method='POST' action='func.php'>
                <input type='hidden' name='$pf' value='\".\$data['$pf'].\"'>
                <input type='submit' name='delete' Value='Delete' class='btn btn-danger btn-sm'>
                </form>
                </td></tr>\";
    }
      ?>
      ";

    $string .="

    </tbody>
    </table>
    </div>

   



";
createFile($string, "../".$table."/index.php");
}
?>
