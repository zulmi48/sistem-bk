<ul class="breadcrumb">
  <li><a href="index.php?page=dashboard">Dashboard</a></li>
  <li><a href="index.php?page=data_siswa&&id=<?php echo $_GET['id'] ?>">Data Siswa</a></li>
  <li><a href="index.php?page=isi_data_nilai&&id=<?php echo $_GET['id'] ?>">Data Siswa</a></li>
  <li class="active">Lihat Nilai</li>
</ul>

<!-- Tabs -->
<ul class="nav nav-tabs" style="position:absolute; left:40%">
  <li class="active"><a data-toggle="tab" href="#absensi">Absensi Siswa</a></li>
  <li><a data-toggle="tab" href="#perilaku">Perilaku Siswa</a></li>
</ul><br><hr>

<!-- ///////////////////////// TABS ABSENSI /////////////////////////////// -->
<?php
$siswa=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_induk='$_GET[id]'"));
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php $data=mysqli_query($koneksi, "SELECT * FROM absensi_siswa WHERE no_induk='$siswa[no_induk]' AND kategori ='SAKIT'");
while ($absensi=mysqli_fetch_array($data)) { ?>
          <tr>
            <td><?php echo date("d - M - Y", strtotime($absensi['tanggal'])) ?></td>
            <td><?php echo $absensi['keterangan'] ?></td>
            <td>
              <a href="proses_nilai.php?del_absensi=<?php echo $absensi['no_induk'] ?>&&tgl=<?php echo $absensi['tanggal']  ?>" class="btn btn-danger">Hapus</a>
            </td>
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
            <td>
              <a href="proses_nilai.php?del_absensi=<?php echo $absensi['no_induk'] ?>&&tgl=<?php echo $absensi['tanggal']  ?>" class="btn btn-danger">Hapus</a>
            </td>
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
            <td>
              <a href="proses_nilai.php?del_absensi=<?php echo $absensi['no_induk'] ?>&&tgl=<?php echo $absensi['tanggal']  ?>" class="btn btn-danger">Hapus</a>
            </td>
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
$perkembangan=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM perkembangan_siswa INNER JOIN siswa USING(no_induk) WHERE tanggal = '$_GET[tgl]' ORDER BY tanggal DESC"));
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
    <!-- End -->
  </div>

</div>
<!-- End of Tabs -->
