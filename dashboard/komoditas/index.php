<?php
require_once 'func.php';

?>

<h3>Komoditas</h3>

<a href='?r=lowongan/create' class='btn btn-info btn-sm'>Tambah</a>
<br>

<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>komoditas</th>
        <th>deskripsi</th>

        <th colspan='2'>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $ga = GetAll();
      $no = 1;
      if (isset($ga)) {
        foreach ($ga as $data) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['komoditas'] . "</td>";
          echo "<td>" . $data['deskripsi'] . "</td>";

          echo "<td>
        <div class=\"btn-group\" >
                <form method='POST' action='?r=komoditas/edit'>
                <input type='hidden' name='id' value='" . $data['id'] . "'>
                <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>

                

                </form>
                &nbsp;
                <form method='POST' action=''>
                <input type='hidden' name='id' value='" . $data['id'] . "'>
                <input type='submit' name='delete' Value='Delete' class='btn btn-danger btn-sm'>
                </form>
                </div>
              </td>";
          echo "
             
                </tr>";
        }
      }
      ?>


    </tbody>
  </table>
</div>