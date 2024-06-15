<?php
require_once 'func.php';
?>

<h3>Riwayat Pendaftaran</h3>

<br>

<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Bidang</th>
        <th>Nama Perusahaan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $lowongans = GetAll();
      $no = 1;
      if (!empty($lowongans)) {
        foreach ($lowongans as $data) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['nama_lengkap'] . "</td>";
          echo "<td>" . $data['jenis_kelamin'] . "</td>";
          echo "<td>" . $data['bidang'] . "</td>";
          echo "<td>" . $data['nama_perusahaan'] . "</td>";
          echo "<td>" . $data['status'] . "</td>";
        }
      } else {
        echo "<tr><td colspan='7' class='text-center'>Tidak ada data pendaftaran.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
