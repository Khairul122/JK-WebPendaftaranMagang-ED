<?php
require_once 'func.php';;
?>



<h3>Kelola Mentor</h3>

<a href='?r=mentor/create' class='btn btn-info btn-sm'>Tambah</a>
<br>
<br>
<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Mentor</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      // Memanggil fungsi GetAll untuk mendapatkan semua data
      $datas = GetAll();

      // Menampilkan data dalam tabel
      if (!empty($datas)) {
        $no = 1;
        foreach ($datas as $data) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['nama_mentor'] . "</td>";
          echo "<td>
                  <div class=\"btn-group\">
                    <form method='POST' action='?r=mentor/edit'>
                      <input type='hidden' name='id_mentor' value='" . $data['id_mentor'] . "'>
                      <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>
                    </form>
                    &nbsp;
                    <form method='POST' action=''>
                      <input type='hidden' name='id_mentor' value='" . $data['id_mentor'] . "'>
                      <input type='submit' name='delete' Value='Delete' class='btn btn-danger btn-sm'>
                    </form>
                  </div>
                </td>";
          echo "</tr>";

          $no++;
        }
      } else {
        echo "<tr><td colspan='7'>Tidak ada data yang tersedia.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>