<?php
include 'database.php';
if ($_POST['input_absensi']) {
    mysqli_query($koneksi, "INSERT INTO absensi_siswa VALUES(NULL, '$_POST[no_induk]', '$_POST[kategori]', '$_POST[tanggal]', '$_POST[keterangan]')");
    header("location:index.php?page=isi_data_nilai&&id=$_POST[no_induk]");
} elseif ($_POST['input_perilaku']) {
    mysqli_query($koneksi, "INSERT INTO perkembangan_siswa VALUES
      (NULL, '$_POST[no_induk]', '$_POST[tanggal]', '$_POST[membaca]', '$_POST[menghitung]', '$_POST[perilaku]',
      '$_POST[disiplin]', '$_POST[kerja_keras]', '$_POST[kreatif]', '$_POST[mandiri]', '$_POST[rasa_ingin_tahu]',
      '$_POST[tanggung_jawab]')");
    header("location:index.php?page=isi_data_nilai&&id=$_POST[no_induk]");
} elseif ($_POST['input_informasi']) {
    $cek=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM informasi_siswa WHERE no_induk = '$_POST[no_induk]'"));
    if ($cek == 0) {
        mysqli_query($koneksi, "INSERT INTO informasi_siswa VALUES (NULL, '$_POST[no_induk]', '$_POST[tanggal]', '$_POST[rangkuman]', '$_POST[saran]', '$_POST[nama_guru]')");
        header("location:index.php?page=informasi_siswa&&id=$_POST[no_induk]");
    } elseif ($cek > 0) {
        mysqli_query($koneksi, "UPDATE informasi_siswa SET tanggal = '$_POST[tanggal]', rangkuman = '$_POST[rangkuman]', saran = '$_POST[saran]', nama = '$_POST[nama_guru]' WHERE no_induk = '$_POST[no_induk]'");
        header("location:index.php?page=informasi_siswa&&id=$_POST[no_induk]");
    }
} elseif ($_GET['del_perilaku']) {
    mysqli_query($koneksi, "DELETE FROM perkembangan_siswa WHERE no_induk = '$_GET[del_perilaku]' AND tanggal = '$_GET[tgl]'");
    header("location:index.php?page=isi_data_nilai&&id=$_GET[del_perilaku]");
} elseif ($_GET['del_absensi']) {
    mysqli_query($koneksi, "DELETE FROM absensi_siswa WHERE no_induk = '$_GET[del_absensi]' AND tanggal = '$_GET[tgl]'");
    header("location:index.php?page=lihat_nilai&&id=$_GET[del_absensi]");
}
