<?php
require_once 'func.php';
session_start();
?>

<style>
  .custom-scrollbar {
    overflow-x: auto;
    white-space: nowrap;
    /* Mencegah wrap untuk teks dalam sel */
  }
</style>

<h3>Lihat Profile</h3>

<div class="table-responsive custom-scrollbar pt-3">
  <table class='table table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>No KTP</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>No Handphone</th>
        <th>Alamat</th>
        <th>Pas Foto</th>
        <th>CV</th>
        <th>Transkrip Nilai</th>
        <th>Surat Lamaran</th>
        <th>Surat Rekomendasi</th>
        <th>KTP</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $profiles = GetAll(); // Memanggil fungsi GetAll untuk mengambil data
      if (!empty($profiles)) {
        $no = 1;
        foreach ($profiles as $data) {
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $data['no_ktp'] . "</td>";
          echo "<td>" . $data['nama_lengkap'] . "</td>";
          echo "<td>" . $data['email'] . "</td>";
          echo "<td>" . $data['tempat_lahir'] . "</td>";
          echo "<td>" . $data['tanggal_lahir'] . "</td>";
          echo "<td>" . $data['jenis_kelamin'] . "</td>";
          echo "<td>" . $data['no_hp'] . "</td>";
          echo "<td>" . $data['alamat'] . "</td>";
          echo "<td><img src='{$data['foto']}' alt='Pas Foto' style='width:50px;height:67px;'></td>";
          echo "<td><a href='{$data['cv']}' target='_blank'>Lihat CV</a></td>";
          echo "<td><a href='{$data['transkrip_nilai']}' target='_blank'>Lihat Transkrip Nilai</a></td>";
          echo "<td><a href='{$data['surat_lamaran']}' target='_blank'>Lihat Surat Lamaran</a></td>";
          echo "<td><a href='{$data['surat_rekomendasi']}' target='_blank'>Lihat Surat Rekomendasi</a></td>";
          
          $ktp_path = "../assets/img/uploads/" . basename($data['ktp']);
          $ktp_url = "http://localhost/simpesa/assets/img/uploads/" . basename($data['ktp']);
          if (file_exists($ktp_path)) {
            echo "<td><a href='$ktp_url' target='_blank'>Lihat KTP</a></td>";
          } else {
            echo "<td>KTP tidak tersedia</td>";
          }

          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='15' class='text-center'>Tidak ada data profile yang ditemukan.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
