<?php
  error_reporting(0);
  $data=mysqli_query($koneksi, "SELECT * FROM guru ORDER BY nama ASC");
  $no=1;
 ?>

<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li class="active">Data</li>
  <li class="active">Guru</li>
  <li class="active">List Guru</li>
</ul>

<?php if ($_GET['alert']): ?>
  <div class="alert alert-success">
    <strong>Sukses!</strong> <?php echo $_GET['alert'] ?>
  </div>
<?php endif; ?>
<h4 style="text-align:center"><b>List Data Guru</b></h4><br>
<table class="table table-hover table-responsive">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Status</th>
      <th>No. Telp (WhatsApp)</th>
      <th>Action</th>
    </tr>
    <tbody>
      <?php while ($guru=mysqli_fetch_array($data)) { ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $guru['nama']; ?></td>
        <td><?php echo $guru['status']; ?></td>
        <td><?php echo $guru['no_telp']; ?></td>
        <td>
          <a href="index.php?page=edit_guru&&prm=<?php echo $guru['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
          <a onclick="return confirm('Yakin ingin menghapus?')" href="proses_guru.php?delete=<?php echo $guru['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <?php $no++; } ?>
    </tbody>
  </thead>
</table>
