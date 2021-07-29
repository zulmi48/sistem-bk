<?php
  $guru=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM guru WHERE id = '$_GET[prm]'"));
 ?>

<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li class="active">Data</li>
  <li><a href="index.php?page=list_guru">List Guru</a></li>
  <li class="active">Edit Guru</li>
</ul>

<h4>Perbarui Data Guru</h4><br>
<form action="proses_guru.php" method="post">
  <div class="form-group col-xs-6">
    <input type="text" hidden name="id" value="<?php echo $guru['id'] ?>">
    <label for="">Nama Guru :</label><br>
    <input type="text" class="form-control" name="nama" value="<?php echo $guru['nama'] ?>"><br>
    <label for="">Status Guru : <?php echo $guru['status'] ?></label><br>
    <select class="form-control" name="status">
      <option value="Belum diisi">Silahkan Pilih Status</option>
      <option value="Wali Kelas">Wali Kelas</option>
      <option value="Guru Pendamping">Guru Pendamping</option>
      <option value="Guru BK">Guru BK</option>
    </select><br>
    <label for="">No Telp (WhatsApp) :</label><br>
    <input type="text" class="form-control" name="no_telp" value="<?php echo $guru['no_telp'] ?>"><br>
    <input type="submit" class="btn btn-primary" name="edit_data" value="Selesai">
  </div>
</form>
