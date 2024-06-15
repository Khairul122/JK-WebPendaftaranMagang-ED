<?php
require_once 'func.php';

?>

<h3>Lowongan</h3>
<div class="col-md-12 d-flex justify-content-between align-items-center">
      <h3 class="text-center flex-grow-1"></h3>
      <a href='?r=lowongan/create' class='btn btn-primary btn-lg'>Tambah</a>
    </div>
<br>

<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Bidang</th>
        <th>Kuota</th>
        <th>Valid Until</th>
        <th>Persyaratan Khusus</th>
        <th colspan='2'>Opsi</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php
      $lowongans = GetAll();
      $no = 1;
      if (isset($lowongans)) {
        foreach ($lowongans as $data) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['nama_perusahaan'] . "</td>";
          echo "<td>" . $data['bidang'] . "</td>";
          echo "<td>" . $data['kuota'] . "</td>";
          echo "<td>" . date('d F Y', strtotime($data['valid_until'])) . "</td>";
          echo "<td>";
          $persyaratanKhusus = explode("\n", $data['persyaratan']);
          foreach ($persyaratanKhusus as $index => $persyaratan) {
            echo ($index + 1) . ". " . trim($persyaratan) . "<br>";
          }

          echo "<td>
                  <div class=\"btn-group\">
                    <form method='POST' action='?r=lowongan/edit'>
                      <input type='hidden' name='id_lowongan' value='" . $data['id_lowongan'] . "'>
                      <input type='submit' name='edit' value='Edit' class='btn btn-warning btn-sm'>
                    </form>
                    &nbsp;
                    <form method='POST' action=''>
                      <input type='hidden' name='id_lowongan' value='" . $data['id_lowongan'] . "'>
                      <input type='submit' name='delete' value='Delete' class='btn btn-danger btn-sm'>
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