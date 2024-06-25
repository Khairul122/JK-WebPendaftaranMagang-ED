<?php
require_once 'func.php';

$id_pendaftaran = $_POST['id_pendaftaran'];
$one = GetOne($id_pendaftaran);
$mentors = GetMentors();
?>

<div class='panel panel-info'>
  <div class='panel-heading'>
    <h3>Form Edit Status Pendaftaran</h3>
  </div>
  <div class='panel-body'>
    <form action='' method='POST'>
      <input type='hidden' name='id_pendaftaran' value="<?php echo $_POST['id_pendaftaran']; ?>">
      <?php
      foreach ($one as $data) { ?>
        <div class="form-group">
          <label for="nama_mentor">Nama Mentor</label>
          <select class="form-control" id="nama_mentor" name="nama_mentor">
            <?php foreach ($mentors as $mentor) { ?>
              <option value="<?php echo $mentor['nama_mentor']; ?>" <?php if ($data['nama_mentor'] == $mentor['nama_mentor']) echo 'selected'; ?>>
                <?php echo $mentor['nama_mentor']; ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Status Pendaftaran</label>
          <select class="form-control" id="status" name="status">
            <option value="Pending" <?php if ($data['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="Diterima" <?php if ($data['status'] == 'Diterima') echo 'selected'; ?>>Diterima</option>
            <option value="Ditolak" <?php if ($data['status'] == 'Ditolak') echo 'selected'; ?>>Ditolak</option>
            <option value="Lolos Berkas" <?php if ($data['status'] == 'Lolos Berkas') echo 'selected'; ?>>Lolos Berkas</option>
          </select>
        </div>
      <?php } ?>
      <input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
    </form>
  </div>
</div>