<?php
$data=mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_induk = '$_GET[id]'");
$siswa=mysqli_fetch_array($data);
 ?>

<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li><a href="index.php?page=data_siswa&&id=<?php echo $_GET['id'] ?>">Data Siswa</a></li>
  <li class="active">Data Nilai</li>
</ul>

<!-- Tabs -->
<ul class="nav nav-tabs" style="position:absolute; left:40%">
  <li class="active"><a data-toggle="tab" href="#absensi">Absensi Siswa</a></li>
  <li><a data-toggle="tab" href="#perilaku">Perilaku Siswa</a></li>
</ul><br><hr>

<!-- ///////////////////////// TABS ABSENSI /////////////////////////////// -->
<div class="tab-content">
  <div id="absensi" class="tab-pane fade in active">
    <!-- Isi tab Absensi -->
      <h4>Silahkan masukkan data absensi.</h4><br>
      <h5>Nama : <?php echo $siswa['nama'] ?></h5>
      <h5>Kelas : <?php echo $siswa['kelas'] ?></h5><br>
      <h5>Lihat Absensi Sebelumnya :</h5>
      <a class="btn btn-info" href="index.php?page=lihat_nilai&&id=<?php echo $siswa['no_induk'] ?>">Lihat</a><br><hr>
      <form action="proses_nilai.php" method="post">
        <div class="form-group col-xs-4">
          <label for="no_induk">No. Induk :</label>
          <input class="form-control" readonly type="text" name="no_induk" value="<?php echo $siswa['no_induk'] ?>">
        </div><br><br><br><br>
        <div class="form-group col-xs-4">
          <label for="kategori">Kategori :</label>
          <select class="form-control" name="kategori">
            <option value="">Silahkan dipilih</option>
            <option value="SAKIT">Sakit</option>
            <option value="IJIN">Ijin</option>
            <option value="TANPA KETERANGAN">Tanpa Keterangan</option>
          </select>
        </div><br><br><br><br>
        <div class="form-group col-xs-4">
          <label for="tanggal">Tanggal :</label>
          <input class="form-control" type="date" name="tanggal" value="">
        </div><br><br><br><br>
        <div class="form-group col-xs-4">
          <label for="keterangan">Keterangan :</label>
          <textarea class="form-control" name="keterangan" rows="5" cols="80"></textarea>
        </div><br><br><br><br>
        <input class="btn btn-primary" type="submit" name="input_absensi" value="Selesai">
      </form>
    <!-- End -->
  </div>

<!-- ///////////////////////// TABS PERILAKU /////////////////////////////// -->
  <div id="perilaku" class="tab-pane fade">
    <!-- Isi tab Perilaku -->
    <h4>Laporan Perkembangan Siswa</h4><br>
    <form action="proses_nilai.php" method="post">
      <div class="col-xs-3" style="float:right">
        <label for="">Tanggal :</label>
        <input class="form-control" type="date" name="tanggal" required value="">
        <input type="text" name="no_induk" hidden value="<?php echo $siswa['no_induk'] ?>">
      </div>
      <div class="form-group">
        <table class="table table-striped table-responsive">
          <thead>
            <tr>
              <th>No.</th>
              <th>Program Bimbingan</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Membaca</td>
              <td><textarea name="membaca" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Menghitung</td>
              <td><textarea name="menghitung" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Perilaku</td>
              <td><textarea name="perilaku" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td>4</td>
              <td>Vokasional</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>a. Disiplin</td>
              <td><textarea name="disiplin" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td>b. Kerja Keras</td>
              <td><textarea name="kerja_keras" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td>c. Kreatif</td>
              <td><textarea name="kreatif" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td>d. Mandiri</td>
              <td><textarea name="mandiri" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td>e. Rasa Ingin Tahu</td>
              <td><textarea name="rasa_ingin_tahu" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td>f. Tanggung Jawab</td>
              <td><textarea name="tanggung_jawab" class="form-control" rows="3" cols="50"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><input type="submit" name="input_perilaku" value="Selesai" class="btn btn-primary btn-lg"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </form><br>
    <h4>Histori :</h4>
    <?php
    $data=mysqli_query($koneksi, "SELECT * FROM perkembangan_siswa WHERE no_induk = '$siswa[no_induk]'");
     ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; while ($perkembangan=mysqli_fetch_array($data)) {  ?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo date("d - M - Y", strtotime($perkembangan['tanggal']))  ?></td>
          <td>
            <a onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger" href="proses_nilai.php?del_perilaku=<?php echo $perkembangan['no_induk'] ?>&&tgl=<?php echo $perkembangan['tanggal'] ?>">Delete</a>
            <a class="btn btn-info" href="index.php?page=lihat_nilai&&id=<?php echo $perkembangan['no_induk'] ?>&&tgl=<?php echo $perkembangan['tanggal'] ?>">Lihat</a>
          </td>
        </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
    <!-- End -->
  </div>

</div>
<!-- End of Tabs -->
