<?php
function gen_create($table){
$string .= "
<?php
require_once 'func.php';
?>

        <div class='panel panel-info'>
          <div class='panel-heading'>Form Input $table </div>
          <div class='panel-body'>
          <form action='' method='POST'>
          ";
            $nopf = NoPrimaryField($table);
            foreach($nopf as $field){
              $string .="
              <div class=\"form-group\">
                <label for=\"".$field['column_name']."\"> ".$field['column_name'].":</label>
                <input type=\"text\" class=\"form-control\" id=\"".$field['column_name']."\" name='".$field['column_name']."' placeholder='".$field['column_name']."'>
              </div>";
            }
          $string .= "<input type='submit' name='insert' value='Save' class='btn btn-sm btn-primary'>
          </form>
          </div>
        </div>
   

";
createFile($string, "../".$table."/create.php");
}
?>
