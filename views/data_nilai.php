<ul class="breadcrumb">
  <li><a href="index.php?page=data_siswa">Dashboard</a></li>
  <li class="active">Data Nilai</li>
</ul>

<!-- Tabs -->
<ul class="nav nav-tabs" style="position:absolute; left:40%">
  <li class="active"><a data-toggle="tab" href="#absensi">Absensi Siswa</a></li>
  <li><a data-toggle="tab" href="#perilaku">Perilaku Siswa</a></li>
</ul><br><hr>

<!-- ///////////////////////// TABS ABSENSI /////////////////////////////// -->
<?php
$siswa=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE username='$_SESSION[username]'"));
 ?>
<div class="tab-content">
  <div id="absensi" class="tab-pane fade in active">
    <!-- Isi tab Absensi -->
    Berikut adalah absensi siswa saat tidak mengikuti aktifitas sekolah.<br><br>
    <button class="btn btn-success" data-toggle="collapse" data-target="#sakit">SAKIT</button><br>
    <div id="sakit" class="collapse">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
<?php $data=mysqli_query($koneksi, "SELECT * FROM absensi_siswa WHERE no_induk='$siswa[no_induk]' AND kategori ='SAKIT'");
while ($absensi=mysqli_fetch_array($data)) { ?>
          <tr>
            <td><?php echo date("d - M - Y", strtotime($absensi['tanggal'])) ?></td>
            <td><?php echo $absensi['keterangan'] ?></td>
          </tr>
<?php          } ?>
        </tbody>
      </table>
    </div><br>

    <button class="btn btn-success" data-toggle="collapse" data-target="#ijin">IJIN</button><br>
    <div id="ijin" class="collapse">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
<?php $data=mysqli_query($koneksi, "SELECT * FROM absensi_siswa WHERE no_induk='$siswa[no_induk]' AND kategori ='IJIN'");
while ($absensi=mysqli_fetch_array($data)) { ?>
          <tr>
            <td><?php echo $absensi['tanggal'] ?></td>
            <td><?php echo $absensi['keterangan'] ?></td>
          </tr>
<?php          } ?>
        </tbody>
      </table>
    </div><br>

    <button class="btn btn-success" data-toggle="collapse" data-target="#tanpa_keterangan">TANPA KETERANGAN</button><br>
    <div id="tanpa_keterangan" class="collapse">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
<?php $data=mysqli_query($koneksi, "SELECT * FROM absensi_siswa WHERE no_induk='$siswa[no_induk]' AND kategori ='TANPA KETERANGAN'");
while ($absensi=mysqli_fetch_array($data)) { ?>
          <tr>
            <td><?php echo $absensi['tanggal'] ?></td>
            <td><?php echo $absensi['keterangan'] ?></td>
          </tr>
<?php          } ?>
        </tbody>
      </table>
    </div><br>
    <!-- End -->
  </div>

<!-- ///////////////////////// TABS PERILAKU /////////////////////////////// -->
<?php
error_reporting(0);
if ($_POST['pilih_tanggal']) {
    $perkembangan=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM perkembangan_siswa INNER JOIN siswa USING(no_induk) WHERE tanggal = '$_POST[tanggal]' AND username = '$_SESSION[username]'"));
} else {
    $perkembangan=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM perkembangan_siswa INNER JOIN siswa USING(no_induk) WHERE username = '$_SESSION[username]' ORDER BY tanggal DESC"));
}
 ?>
  <div id="perilaku" class="tab-pane fade">
    <!-- Isi tab Perilaku -->
    <h4>Laporan Perkembangan Siswa Tanggal <?php echo date('d-M-Y', strtotime($perkembangan['tanggal'])) ?></h4><br>
    <h5>Kelas : <?php echo $perkembangan['kelas'] ?></h5>
    <h5>Semester : <?php echo $perkembangan['semester'] ?></h5><br><br>
    <table class="table table-bordered">
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
          <td><?php echo $perkembangan['membaca'] ?></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Menghitung</td>
          <td><?php echo $perkembangan['menghitung'] ?></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Perilaku</td>
          <td><?php echo $perkembangan['perilaku'] ?></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Vokasional</td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td>a. Disiplin</td>
          <td><?php echo $perkembangan['disiplin'] ?></td>
        </tr>
        <tr>
          <td></td>
          <td>b. Kerja Keras</td>
          <td><?php echo $perkembangan['kerja_keras'] ?></td>
        </tr>
        <tr>
          <td></td>
          <td>c. Kreatif</td>
          <td><?php echo $perkembangan['kreatif'] ?></td>
        </tr>
        <tr>
          <td></td>
          <td>d. Mandiri</td>
          <td><?php echo $perkembangan['mandiri'] ?></td>
        </tr>
        <tr>
          <td></td>
          <td>e. Rasa Ingin Tahu</td>
          <td><?php echo $perkembangan['rasa_ingin_tahu'] ?></td>
        </tr>
        <tr>
          <td></td>
          <td>f. Tanggung Jawab</td>
          <td><?php echo $perkembangan['tanggung_jawab'] ?></td>
        </tr>
      </tbody>
    </table>
    <form action="index.php?page=data_nilai" method="post">
      <div class="form-group col-xs-3">
        <select class="form-control" name="tanggal">
          <option value="">Pilih Tanggal</option>
          <?php
          $data=mysqli_query($koneksi, "SELECT * FROM perkembangan_siswa INNER JOIN siswa USING(no_induk) WHERE username = '$_SESSION[username]' ORDER BY tanggal DESC");
          while ($perkembangan=mysqli_fetch_array($data)) { ?>
          <option value="<?php echo $perkembangan['tanggal'] ?>"><?php echo $perkembangan['tanggal'] ?></option>
          <?php  } ?>
        </select>
      </div>
      <input type="submit" name="pilih_tanggal" value="Lihat" class="btn btn-info">
    </form><br>
    <!-- End -->
  </div>

</div>
<!-- End of Tabs -->
