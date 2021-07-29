<?php
$data=mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_induk='$_GET[prm]'");
$siswa=mysqli_fetch_array($data);
 ?>

<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li class="active">Data</li>
  <li><a href="index.php?page=siswa_edit">Siswa</a></li>
  <li class="active">Edit Siswa</li>
</ul>

  <h4>Perbarui Data Siswa</h4><br>
  <form action="proses_siswa.php?id=<?php echo $siswa['id'] ?>" method="post">
    <div class="form-group col-xs-4">
      <label for="no_induk">No. Induk :</label>
      <input type="text" name="no_induk" value="<?php echo $siswa['no_induk']; ?>" class="form-control ">
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="nama">Nama :</label>
      <input type="text" name="nama" value="<?php echo $siswa['nama'] ?>" class="form-control ">
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="kelas">Kelas : <?php echo $siswa['kelas'] ?></label>
      <select class="form-control" name="kelas">
        <option value="Belum diisi">Silahkan Pilih Kelas</option>
        <option value="VII">VII</option>
        <option value="VIII">VIII</option>
        <option value="IX">IX</option>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="semester">Semester : <?php echo $siswa['semester'] ?></label>
      <select class="form-control" name="semester">
        <option value="Belum diisi">Silahkan Pilih Semester</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="wali_kelas">Wali Kelas : <?php echo $siswa['wali_kelas'] ?></label>
      <select class="form-control" name="wali_kelas">
        <option value="Belum diisi">Silahkan Pilih Wali Kelas</option>
        <?php
        $data=mysqli_query($koneksi, "SELECT * FROM guru WHERE status='Wali Kelas' ");
        while ($guru=mysqli_fetch_array($data)) {
            ?>
         <option value="<?php echo $guru['nama'] ?>"><?php echo $guru['nama'] ?></option>
        <?php
        } ?>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="guru_pendamping">Guru Pendamping : <?php echo $siswa['guru_pendamping'] ?></label>
      <select class="form-control" name="guru_pendamping">
        <option value="Belum diisi">Silahkan Pilih Guru Pendamping</option>
        <?php
        $data=mysqli_query($koneksi, "SELECT * FROM guru WHERE status='Guru Pendamping' ");
        while ($guru=mysqli_fetch_array($data)) {
            ?>
         <option value="<?php echo $guru['nama'] ?>"><?php echo $guru['nama'] ?></option>
        <?php
        } ?>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="guru_bk">Guru BK : <?php echo $siswa['guru_bk'] ?></label>
      <select class="form-control" name="guru_bk">
        <option value="Belum diisi">Silahkan Pilih Guru BK</option>
        <?php
        $data=mysqli_query($koneksi, "SELECT * FROM guru WHERE status='Guru BK' ");
        while ($guru=mysqli_fetch_array($data)) {
            ?>
         <option value="<?php echo $guru['nama'] ?>"><?php echo $guru['nama'] ?></option>
        <?php
        } ?>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="status_siswa">Status Siswa :</label>
      <input type="text" name="status_siswa" value="<?php echo $siswa['status_siswa'] ?>" class="form-control ">
    </div><br><br><br><br>
    <input style="position:absolute; left:15%" class="btn btn-primary" type="submit" name="edit_data" value="Selesai">
  </form>
