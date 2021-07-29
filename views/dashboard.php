<?php
$data=mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY no_induk ASC");
$no=1;
 ?>
<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
</ul>
<h4>Data Siswa/i Didik</h4>
<br>
<table class="table table-responsive table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>No. Induk</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Action</th>
    </tr>
  </thead>
<tbody>
  <?php while ($siswa=mysqli_fetch_array($data)) { ?>
  <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $siswa['no_induk'] ?></td>
    <td><?php echo $siswa['nama'] ?></td>
    <td><?php echo $siswa['kelas'] ?></td>
    <td><a href="index.php?page=data_siswa&&id=<?php echo $siswa['no_induk'] ?>" class="btn btn-warning btn-sm">Input Nilai</a></td>
  </tr>
  <?php $no++; } ?>
</tbody>
</table>
