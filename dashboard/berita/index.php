<?php
require_once 'func.php';;
?>



<h3>Kelola Berita</h3>

<a href='?r=berita/create' class='btn btn-info btn-sm'>Tambah</a>
<br>
<br>
<div class='table-responsive'>
  <table class='table table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Keterangan</th>
        <th>Foto</th>
        <th>Tanggal</th>
        <th colspan='2'>Opsi</th>
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
          echo "<td>" . $data['judul'] . "</td>";
          echo "<td>" . $data['keterangan'] . "</td>";
          echo "<td class='text-center'><img src='../assets/img/berita/{$data['foto']}' alt='Foto Berita' style='width: 15%; height: 15%;'></td>";
          echo "<td>" . date('d-m-Y', strtotime($data['tanggal'])) . "</td>";

          echo "<td>
      <div class=\"btn-group\">
        <form method='POST' action='?r=berita/edit'>
          <input type='hidden' name='id_berita' value='" . $data['id_berita'] . "'>
          <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>
        </form>
        &nbsp;
        <form method='POST' action=''>
          <input type='hidden' name='id_berita' value='" . $data['id_berita'] . "'>
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