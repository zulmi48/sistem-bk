<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li class="active">Data</li>
  <li class="active">Siswa</li>
  <li class="active">Input Siswa</li>
</ul>

  <h4>Input Data Siswa Baru</h4><br>
  <form action="proses_siswa.php" method="post">
    <div class="form-group col-xs-4">
      <label for="no_induk">No. Induk :</label>
      <input type="text" name="no_induk" value="" class="form-control ">
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="nama">Nama :</label>
      <input type="text" name="nama" value="" class="form-control ">
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="kelas">Kelas :</label>
      <select class="form-control" name="kelas">
        <option value="Belum diisi">Silahkan Pilih Kelas</option>
        <option value="VII">VII</option>
        <option value="VIII">VIII</option>
        <option value="IX">IX</option>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="semester">Semester :</label>
      <select class="form-control" name="semester">
        <option value="Belum diisi">Silahkan Pilih Semester</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="wali_kelas">Wali Kelas :</label>
      <select class="form-control" name="wali_kelas">
        <option value="Belum diisi">Silahkan Pilih Wali Kelas</option>
        <?php
        $data=mysqli_query($koneksi,"SELECT * FROM guru WHERE status='Wali Kelas' ");
        while ($guru=mysqli_fetch_array($data)) {
         ?>
         <option value="<?php echo $guru['nama'] ?>"><?php echo $guru['nama'] ?></option>
        <?php } ?>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="guru_pendamping">Guru Pendamping :</label>
      <select class="form-control" name="guru_pendamping">
        <option value="Belum diisi">Silahkan Pilih Guru Pendamping</option>
        <?php
        $data=mysqli_query($koneksi,"SELECT * FROM guru WHERE status='Guru Pendamping' ");
        while ($guru=mysqli_fetch_array($data)) {
         ?>
         <option value="<?php echo $guru['nama'] ?>"><?php echo $guru['nama'] ?></option>
        <?php } ?>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="guru_bk">Guru BK</label>
      <select class="form-control" name="guru_bk">
        <option value="Belum diisi">Silahkan Pilih Guru BK</option>
        <?php
        $data=mysqli_query($koneksi,"SELECT * FROM guru WHERE status='Guru BK' ");
        while ($guru=mysqli_fetch_array($data)) {
         ?>
         <option value="<?php echo $guru['nama'] ?>"><?php echo $guru['nama'] ?></option>
        <?php } ?>
      </select>
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="status_siswa">Status Siswa :</label>
      <input type="text" name="status_siswa" value="" class="form-control ">
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="username">Username Orang Tua :</label>
      <input type="text" name="username" value="" class="form-control ">
    </div><br><br><br><br>
    <div class="form-group col-xs-4">
      <label for="password">Password :</label>
      <input type="text" name="password" value="" class="form-control ">
    </div><br><br><br><br>
    <input style="position:absolute; left:15%" class="btn btn-primary" type="submit" name="input_data" value="Selesai">
  </form>
