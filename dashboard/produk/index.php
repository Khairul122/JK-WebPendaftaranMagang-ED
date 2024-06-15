<?php
require_once 'func.php';

?>

<h3>Produk</h3>

<a href='?r=produk/create' class='btn btn-info btn-sm'>Tambah</a>
<br>

<div class='table-responsive'>
  <table class='table table-bordered table-sm' align="center">
    <thead align="">
      <tr>
        <th>No</th>
        <th>produk</th>
        <th>satuan</th>
        <th>harga satuan</th>


        <th colspan='2'>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($_SESSION['hak'] == "admin") {
        $ga = GetAll();
      } else {
        $ga = GetByUser($_SESSION['id']);
      }



      $no = 1;
      if (isset($ga)) {
        foreach ($ga as $data) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['produk'] . "</td>";
          echo "<td>" . $data['satuan'] . "</td>";
          echo "<td>Rp." . $data['harga_satuan'] . "</td>";


          echo "<td>
        <div class=\"btn-group\" >

                <form method='POST' action='?r=produk/edit'>
                <input type='hidden' name='id' value='" . $data['id'] . "'>
                <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>

                

                </form>
                &nbsp;
                 <form method='POST' action=''>
                <input type='hidden' name='id' value='" . $data['id'] . "'>
                <input type='submit' name='delete' Value='Delete' class='btn btn-danger btn-sm'>
                </form>
              </td>
              </div>
              ";
          echo "</tr>";
        }
      }
      ?>


    </tbody>
  </table>
</div>