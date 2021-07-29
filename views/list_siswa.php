<?php
$data=mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY no_induk ASC");
$no=1;
 ?>
<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li class="active">Data</li>
  <li class="active">Siswa</li>
  <li class="active">List Siswa</li>
</ul>

<?php if ($_GET['alert']): ?>
  <div class="alert alert-success">
  <strong>Sukses!</strong> <?php echo $_GET['alert'] ?>
</div>
<?php endif; ?>
<h4 style="text-align:center"><b>List Data Siswa</b></h4><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>No. Induk</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Semester</th>
      <th>Wali Kelas</th>
      <th>Guru Pendamping</th>
      <th>Guru BK</th>
      <th>Status Siswa</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($siswa=mysqli_fetch_array($data)) {   ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $siswa['no_induk'] ?></td>
      <td><?php echo $siswa['nama'] ?></td>
      <td><?php echo $siswa['kelas'] ?></td>
      <td><?php echo $siswa['semester'] ?></td>
      <td><?php echo $siswa['wali_kelas'] ?></td>
      <td><?php echo $siswa['guru_pendamping'] ?></td>
      <td><?php echo $siswa['guru_bk'] ?></td>
      <td><?php echo $siswa['status_siswa'] ?></td>
      <td>
        <a class="btn btn-default btn-sm" href="proses_siswa.php?naik_kelas=<?php echo $siswa['kelas'] ?>&&id=<?php echo $siswa['id'] ?>">Naik Kelas</a><br>
        <a class="btn btn-default btn-sm" href="proses_siswa.php?semester=<?php echo $siswa['semester'] ?>&&id=<?php echo $siswa['id'] ?>">Ubah Semester</a> </td>
    </tr>
  <?php $no++; } ?>
  </tbody>
</table>
