<?php
require_once 'func.php';;
?>



<h3>Kelola Pengguna</h3>
<br>

<a href='?r=pengguna/create' class='btn btn-info btn-sm'>Tambah</a>
<br>
<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>nama</th>
        <th>nomor handphone</th>
        <th>email</th>
        <th>password</th>
        <th>hak pengguna</th>

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
          echo "<td>" . $data['nama'] . "</td>";
          echo "<td>" . $data['no_hp'] . "</td>";
          echo "<td>" . $data['email'] . "</td>";
          echo "<td>" . $data['password'] . "</td>";
          echo "<td>" . $data['hak_pengguna'] . "</td>";

          echo "<td>
        <div class=\"btn-group\" >
                <form method='POST' action='?r=pengguna/edit'>
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
          echo "</tr>";
        }
      }
      ?>


    </tbody>
  </table>
</div>