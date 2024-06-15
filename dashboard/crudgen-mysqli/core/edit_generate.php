<?php
function gen_edit($table){
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);

$string .= "
<?php
require_once 'func.php';
\$id = \$_POST['$pf'];
\$one = GetOne(\$id);
?>

        <div class='panel panel-info'>
          <div class='panel-heading'>Form Edit $table </div>
          <div class='panel-body'>
            <form action='' method='POST'>
            <input type='hidden' name='$pf' value=\"<?php echo \$_POST['$pf']; ?>\">
            <?php
            foreach(\$one as \$data){?>
               ";
              foreach($nopf as $field){
                $string .="
                <div class=\"form-group\">
                  <label for=\"".$field['column_name']."\"> ".$field['column_name'].":</label>
                  <input type=\"text\" class=\"form-control\" id=\"".$field['column_name']."\" name='".$field['column_name']."' value=\"<?php echo \$data['".$field['column_name']."']; ?>\">
                </div>
            ";
              }
            $string .="
            <?php } ?>
            ";
            $string .= "<input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
            </form>

          </div>
        </div>

    
";

createFile($string, "../".$table."/edit.php");
}
?>
