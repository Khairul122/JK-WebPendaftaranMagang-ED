<?php
require_once 'func.php';

?>


<h3>Input Lowongan</h3>

<br>
<div class='table-responsive'>
  <table class='table table-hover table-bordered table-sm'>
    <thead>
      <tr>
        <th>No</th>
        <th>Perusahaan</th>
        <th>Bidang</th>
        <th>Valid Until</th>
        <th>Persyararan Khusus</th>
        <th>Aksi</th>
  

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
          echo "<td>" . $data['nama_usaha'] . "</td>";
          echo "<td>" . $data['pemilik_usaha'] . "</td>";
          echo "<td>" . $data['alamat'] . "</td>";
          echo "<td>" . $data['provinsi'] . "</td>";
          echo "<td>" . $data['kota'] . "</td>";
          echo "<td>" . $data['kecamatan'] . "</td>";
          echo "<td>" . $data['kategori_usaha'] . "</td>";
          echo "<td>" . $data['bentuk_usaha'] . "</td>";
          echo "<td>" . $data['status_tanah_usaha'] . "</td>";
          echo "<td>" . $data['status'] . "</td>";

          echo "<td>
                 <div class=\"btn-group\">
                <form method='POST' action='?r=badan_usaha/edit'>
                <input type='hidden' name='id' value='" . $data['id'] . "'>
                <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>

                

                </form>
                &nbsp;
                <form method='POST' action='' onsubmit=\"return confirm('Kamu Yakin Akan Menghapus Data ini ?')\">
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