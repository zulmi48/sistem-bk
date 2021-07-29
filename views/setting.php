<?php if ($_SESSION['akses']=="guru"):
$guru=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM guru WHERE username = '$_SESSION[username]'"));
   ?>
  <ul class="breadcrumb">
    <li><a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="active">Setting</li>
  </ul>

  <h4>Apakah anda ingin memperbarui Nama Pengguna dan Kata Sandi?</h4><br>
  <form action="proses_guru.php" method="post">
    <div class="form-group col-xs-6">
      <label for="">Nama Pengguna :</label>
      <input type="text" class="form-control" name="username" value="<?php echo $guru['username'] ?>"><br>
      <label for="">Kata Sandi :</label>
      <input type="text" class="form-control" name="password" value="<?php echo $guru['password'] ?>"><br>
      <input type="submit" class="btn btn-primary" name="setting" value="Selesai">
      <input type="text" name="id" value="<?php echo $guru['id'] ?>" hidden>
    </div>
  </form>
<?php else:
$siswa=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE username = '$_SESSION[username]'"));
   ?>
  <ul class="breadcrumb">
    <li><a href="index.php?page=data_siswa">Dashboard</a></li>
    <li class="active">Setting</li>
  </ul>

  <h4>Apakah anda ingin memperbarui Nama Pengguna dan Kata Sandi?</h4><br>
  <form action="proses_siswa.php" method="post">
    <div class="form-group col-xs-6">
      <label for="">Nama Pengguna :</label>
      <input type="text" class="form-control" name="username" value="<?php echo $siswa['username'] ?>"><br>
      <label for="">Kata Sandi :</label>
      <input type="text" class="form-control" name="password" value="<?php echo $siswa['password'] ?>"><br>
      <input type="submit" class="btn btn-primary" name="setting" value="Selesai">
      <input type="text" name="id" value="<?php echo $siswa['id'] ?>" hidden>
    </div>
  </form>
<?php endif; ?>
