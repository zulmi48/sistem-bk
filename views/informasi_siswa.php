<?php if ($_SESSION['akses']=="ortu"):
  $username=$_SESSION['username'];
  $info=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM informasi_siswa INNER JOIN siswa USING (no_induk) WHERE username = '$username'"));
   ?>
   <ul class="breadcrumb">
     <li><a href="index.php?page=data_siswa">Dashboard</a></li>
     <li class="active">Informasi Siswa</li>
   </ul>
  <h4>Berikut Informasi yang dapat Kami sampaikan minggu ini.</h4><br>
  <dl>
      <dt>Rangkuman</dt>
      <dd>
        - <?php echo $info['rangkuman'] ?>
      </dd><br>
      <dt>Saran</dt>
      <dd>
        - <?php echo $info['saran'] ?>
      </dd><br>
      <dt>Guru yang Bisa dihubungi</dt>
      <?php $guru=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM guru WHERE nama = '$info[nama_guru]'")) ?>
      <dd>
        - <?php echo "$info[nama_guru], WhatsApp $guru[no_telp]"; ?>
      </dd>
  </dl>
<?php else: ?>
  <ul class="breadcrumb">
    <li><a href="index.php?page=dashboard">Dashboard</a></li>
    <li><a href="index.php?page=data_siswa&&id=<?php echo $_GET['id'] ?>">Data Siswa</a></li>
    <li class="active">Informasi Siswa</li>
  </ul>
  <h4>Silahkan isi informasi yang akan disampaikan minggu ini.</h4><br>
  <?php
    $siswa=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_induk = '$_GET[id]'"));
   ?>
  <form action="proses_nilai.php" method="post">
    <div class="form-group col-xs-6">
      <h5><?php echo "Nama : $siswa[nama]"; ?></h5>
      <h5><?php echo "Kelas : $siswa[kelas]"; ?></h5><br>
      <label for="no_induk">No. Induk : </label>
      <input name="no_induk" type="text" class="form-control" readonly value="<?php echo $siswa['no_induk'] ?>"><br>
      <label for="tanggal">Tanggal :</label>
      <input type="date" class="form-control" name="tanggal" value=""><br>
      <label for="rangkuman">Rangkuman :</label>
      <textarea name="rangkuman" class="form-control" rows="5" cols="80"></textarea><br>
      <label for="saran">Saran :</label>
      <textarea name="saran" class="form-control" rows="5" cols="80"></textarea><br>
      <label for="">Guru yang Bisa dihubungi :</label>
      <select class="form-control" name="nama">
      <?php $data=mysqli_query($koneksi, "SELECT * FROM guru WHERE status = 'Guru Pendamping'"); ?>
        <option value="Belum diisi">Pilih Guru</option>
      <?php while ($guru=mysqli_fetch_array($data)) { ?>
        <option value="<?php echo $guru['nama'] ?>"><?php echo $guru['nama'] ?></option>
      <?php  } ?>
    </select><br>
      <input type="submit" name="input_informasi" value="Selesai" class="btn btn-primary">
    </div>
  </form>
<?php endif; ?>
