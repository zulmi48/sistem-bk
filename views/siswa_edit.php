<?php
$data=mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY no_induk ASC");
$no=1;
 ?>

<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li class="active">Data</li>
  <li class="active">Siswa</li>
</ul>

<h4 style="text-align:center"><b>Data Siswa</b></h4><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>No. Induk</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Semester</th>
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
      <td><?php echo $siswa['semester'] ?></td>
      <td>
        <a class="btn btn-warning btn-sm" href="index.php?page=edit_siswa&&prm=<?php echo $siswa['no_induk'] ?>">Edit</a>
        <a onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm" href="proses_siswa.php?prm=<?php echo $siswa['no_induk'] ?>">Delete</a> 
      </td>
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>
