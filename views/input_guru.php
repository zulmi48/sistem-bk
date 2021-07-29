<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li class="active">Data</li>
  <li class="active">Guru</li>
  <li class="active">Input Guru</li>
</ul>

<h4>Input Data Guru Baru</h4><br>
<form action="proses_guru.php" method="post">
  <div class="form-group col-xs-6">
    <label for="">Nama Guru :</label><br>
    <input type="text" class="form-control" name="nama" value=""><br>
    <label for="">Status Guru :</label><br>
    <select class="form-control" name="status">
      <option value="Belum diisi">Silahkan Pilih Status</option>
      <option value="Wali Kelas">Wali Kelas</option>
      <option value="Guru Pendamping">Guru Pendamping</option>
      <option value="Guru BK">Guru BK</option>
    </select><br>
    <label for="">No Telp (WhatsApp) :</label><br>
    <input type="text" class="form-control" name="no_telp" value=""><br>
    <label for="">Username :</label><br>
    <input type="text" class="form-control" name="username" value=""><br>
    <label for="">Password :</label><br>
    <input type="text" class="form-control" name="password" value=""><br>
    <input type="submit" class="btn btn-primary" name="input_data" value="Selesai">
  </div>
</form>
