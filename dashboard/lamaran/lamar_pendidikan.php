<?php
require_once 'func.php';
$current_page = isset($_GET['r']) ? $_GET['r'] : '';

// Ambil id_lowongan dari session
$id_lowongan = $_SESSION['id_lowongan'] ?? '';

// Jika id_lowongan tidak kosong, dapatkan data dari database
if (!empty($id_lowongan)) {
    $one = GetOne($id_lowongan);

    if (!empty($one)) {
        foreach ($one as $data) {
            // echo "<p>ID Lowongan: " . $data['id_lowongan'] . "</p>";
            // echo "<p>Bidang: " . $data['bidang'] . "</p>";
            // echo "<p>Nama Perusahaan: " . $data['nama_perus'] . "</p>";
            // echo "<p>Nama Perusahaan: " . $data['id_datadiri'] . "</p>";

        }
    } else {
        echo "<h4>Data tidak ditemukan</h4>";
    }
} else {
    echo "<h4>ID Lowongan tidak valid</h4>";
}
?>

<?php
// session_start();

// echo '<h2>Daftar Session:</h2>';
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>



<section>
    <div class="row">
        <div class="card <?php echo ($current_page === 'lamaran/lamar_datadiri') ? 'bg-warning' : 'bg-secondary'; ?> text-white mb-3" style="width: 200px; height: 80px;">
            <div class="card-body text-center ">
                <h3 class="card-title text-dark">Data Diri</h3>
            </div>
        </div>

        <div style="padding-left:2%;">
            <div class="card <?php echo ($current_page === 'lamaran/lamar_pendidikan') ? 'bg-warning' : 'bg-secondary'; ?> text-white mb-3" style="width: 200px; height: 80px;">
                <div class="card-body text-center ">
                    <h3 class="card-title text-dark">Pendidikan</h3>
                </div>
            </div>
        </div>
        <div style="padding-left:2%;">
            <div class="card <?php echo ($current_page === 'lamaran/lamar_pengalamaan') ? 'bg-warning' : 'bg-secondary'; ?> text-white mb-3" style="width: 200px; height: 80px;">
                <div class="card-body text-center ">
                    <h3 class="card-title text-dark">Pengalaman</h3>
                </div>
            </div>
        </div>
        <div style="padding-left:2%;">
            <div class="card <?php echo ($current_page === 'lamaran/lamar_keahlian') ? 'bg-warning' : 'bg-secondary'; ?> text-white mb-3" style="width: 200px; height: 80px;">
                <div class="card-body text-center ">
                    <h3 class="card-title text-dark">Keahlian</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<div class='panel panel-info'>
    <div class='panel-heading'>
        <h3>Form Data Pendidikan</h3>
    </div>
    <div class='panel-body'>
        <form action='' method='POST' enctype="multipart/form-data">
            <input type='hidden' name='id_lowongan' value="<?php echo $id_lowongan; ?>">
            <?php
            foreach ($one as $data) { ?>
                <br>
                <div class="form-group">
                    <label for="pendidikan_terkakhir">Pendidikan Terkakhir</label>
                    <input type="text" class="form-control" id="pendidikan_terkakhir" name='pendidikan_terkakhir' required>
                </div>

                <div class="form-group">
                    <label for="asal_sekolah">Asal</label>
                    <input type="text" class="form-control" id="asal_sekolah" name='asal_sekolah' required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name='jurusan' required>
                </div>

                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                    <input type="number" class="form-control" id="tahun_masuk" name='tahun_masuk' required>
                </div>

                <div class="form-group">
                    <label for="tahun_lulus">Tanggal Lulus</label>
                    <input type="number" class="form-control" id="tahun_lulus" name='tahun_lulus' required>
                </div>

                <div class="form-group">
                    <label for="IPK">IPK</label>
                    <input type="text" class="form-control" id="IPK" name='IPK' required>
                </div>

            <?php } ?>
            <input type='submit' name='insert_data_pendidikan' value='Selanjutnya' class='btn btn-primary btn-lg btn-block'>
        </form>
    </div>
</div>
