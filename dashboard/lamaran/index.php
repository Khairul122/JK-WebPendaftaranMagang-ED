<?php
require_once 'func.php';
session_start();

?>

<h3>Lowongan</h3>

<br>

<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead>
      <tr class="text-center">
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
                    <form method='POST' action='?r=lamaran/lamar_datadiri'>
                      <input type='hidden' name='id_lowongan' value='" . $data['id_lowongan'] . "'>
                      <input type='submit' name='edit' value='Lamar' class='btn btn-warning btn-sm'>
                    </form>
                    &nbsp;
                   
                  </div>
                </td>";
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>