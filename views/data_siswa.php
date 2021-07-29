<?php
if ($_SESSION['akses']=="ortu") {
    $username=$_SESSION['username'];
    $data=mysqli_query($koneksi, "SELECT * FROM siswa WHERE username='$username'");
    $siswa=mysqli_fetch_array($data); ?>
  <ul class="breadcrumb">
    <li><a href="index.php?page=data_siswa">Dashboard</a></li>
  </ul>

<?php
} else {
        $id=$_GET['id'];
        $data=mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_induk='$id'");
        $siswa=mysqli_fetch_array($data); ?>
  <ul class="breadcrumb">
    <li><a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="active">Data Siswa</li>
  </ul>
<?php
    } ?>

<h4 style="text-align:center"><b>Data Pribadi Siswa</b></h4>
<br>
<table class="table table-condensed">
  <tbody>
    <tr>
      <td><b>No. Induk</b></td>
      <td>:</td>
      <td><?php echo $siswa['no_induk'] ?></td>
    </tr>
    <tr>
      <td><b>Nama</b></td>
      <td>:</td>
      <td><?php echo $siswa['nama'] ?></td>
    </tr>
    <tr>
      <td><b>Kelas</b></td>
      <td>:</td>
      <td><?php echo $siswa['kelas'] ?></td>
    </tr>
    <tr>
      <td><b>Semester</b></td>
      <td>:</td>
      <td><?php echo $siswa['semester'] ?></td>
    </tr>
    <tr>
      <td><b>Wali Kelas</b></td>
      <td>:</td>
      <td><?php echo $siswa['wali_kelas'] ?></td>
    </tr>
    <tr>
      <td><b>Guru Pendamping</b></td>
      <td>:</td>
      <td><?php echo $siswa['guru_pendamping'] ?></td>
    </tr>
    <tr>
      <td><b>Guru BK</b></td>
      <td>:</td>
      <td><?php echo $siswa['guru_bk'] ?></td>
    </tr>
    <tr>
      <td><b>Status Siswa</b></td>
      <td>:</td>
      <td><?php echo $siswa['status_siswa'] ?></td>
    </tr>
  </tbody>
</table>
<div class="row">
  <div class="col-sm-6">
      <?php if ($_SESSION['akses']=="ortu"): ?>
        <a href="index.php?page=data_nilai" class="btn btn-success btn-lg">Data Nilai</a>
      <?php else: ?>
        <a href="index.php?page=isi_data_nilai&&id=<?php echo $siswa['no_induk'] ?>" class="btn btn-success btn-lg">Data Nilai</a>
      <?php endif; ?>
  </div>
  <div class="col-sm-6">
    <?php if ($_SESSION['akses']=="ortu"): ?>
      <a href="index.php?page=informasi_siswa&&siswa=yes" class="btn btn-primary btn-lg">Informasi</a>
    <?php else: ?>
      <a href="index.php?page=informasi_siswa&&id=<?php echo $siswa['no_induk'] ?>" class="btn btn-primary btn-lg">Informasi</a>
    <?php endif; ?>
  </div>
</div>
