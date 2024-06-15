<?php
require_once 'func.php';

// Inisialisasi nilai awal untuk pencarian
$searchNama = isset($_GET['searchNama']) ? $_GET['searchNama'] : '';
$searchBidang = isset($_GET['searchBidang']) ? $_GET['searchBidang'] : '';
?>

<h3>Riwayat Pendaftaran</h3>

<br>

<form method="GET" class="mb-3">
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" name="searchNama" id="searchNama" placeholder="Cari berdasarkan nama" value="<?php echo $searchNama; ?>">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="searchBidang" id="searchBidang" placeholder="Cari berdasarkan bidang" value="<?php echo $searchBidang; ?>">
    </div>
    <div class="col">
      <button type="submit" class="btn btn-primary">Cari</button>
    </div>
  </div>
</form>

<div class='table-responsive'>
  <table class='table table-bordered table-sm' id="dataTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Bidang</th>
        <th>Nama Perusahaan</th>
        <th>Status</th>
        <th>Aksi</th>
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
          echo "<td>" . $data['nama_perus'] . "</td>";
          echo "<td>" . $data['status'] . "</td>";
          echo "<td>
                <div class=\"btn-group\">
                  <form method='POST' action='?r=konfirmasi_status_lamaran/edit'>
                    <input type='hidden' name='id_pendaftaran' value='" . $data['id_pendaftaran'] . "'>
                    <input type='submit' name='edit' value='Edit' class='btn btn-warning btn-sm'>
                  </form>
                  &nbsp;
                  <form method='POST' action=''>
                    <input type='hidden' name='id_pendaftaran' value='" . $data['id_pendaftaran'] . "'>
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

<script>
  function search() {
    var searchNama = document.getElementById('searchNama').value.toLowerCase();
    var searchBidang = document.getElementById('searchBidang').value.toLowerCase();
    var rows = document.querySelectorAll('#dataTable tbody tr');

    for (var i = 0; i < rows.length; i++) {
      var rowData = rows[i].innerText.toLowerCase();

      if (
        (searchNama === '' || rowData.includes(searchNama)) &&
        (searchBidang === '' || rowData.includes(searchBidang))
      ) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }
</script>
