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
            <div class="card <?php echo ($current_page === 'lamaran/lamar_pengalaman') ? 'bg-warning' : 'bg-secondary'; ?> text-white mb-3" style="width: 200px; height: 80px;">
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
        <h3>Form Data Pengalaman</h3>
    </div>
    <div class='panel-body'>
        <form action='' method='POST' enctype="multipart/form-data">
        <input type='hidden' name='id_lowongan' value="<?php echo $id_lowongan; ?>">
            <?php
            foreach ($one as $data) { ?>
                <br>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan Sebelumnya</label>
                    <input type="text" class="form-control" id="keahlian" name='keahlian'>
                </div>

                <div class="form-group">
                    <label for="posisi_terakhir">Posisi Terakhir</label>
                    <input type="text" class="form-control" id="posisi_terakhir" name='posisi_terakhir'>
                </div>

                <div class="form-group">
                    <label for="jobdesk">Jobdesk</label>
                    <input type="text" class="form-control" id="jobdesk" name='jobdesk'>
                </div>
                <div class="form-group">
                    <label for="penghasilan">Penghasilan</label>
                    <input type="number" class="form-control" id="penghasilan" name='penghasilan'>
                </div>
                <div class="form-group">
                    <label for="alasan">Alasan</label>
                    <input type="text" class="form-control" id="alasan" name='alasan'>
                </div>
            <?php } ?>
            <input type='submit' name='insert_data_pengalaman' value='Selanjutnya' class='btn btn-primary btn-lg btn-block'>
        </form>
    </div>
</div>