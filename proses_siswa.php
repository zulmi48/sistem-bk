<?php
include 'database.php';
$no_induk=$_POST['no_induk'];
$nama=$_POST['nama'];
$kelas=$_POST['kelas'];
$semester=$_POST['semester'];
$wali_kelas=$_POST['wali_kelas'];
$guru_pendamping=$_POST['guru_pendamping'];
$guru_bk=$_POST['guru_bk'];
$status_siswa=$_POST['status_siswa'];
$username=$_POST['username'];
$password=$_POST['password'];

if ($_POST['input_data']) {
    mysqli_query($koneksi, " INSERT INTO siswa VALUES
        (' ', '$no_induk', '$nama', '$kelas', '$semester', '$wali_kelas', '$guru_pendamping', '$guru_bk', '$status_siswa', '$username', '$password')");
    header('location:index.php?page=list_siswa&&alert=Data Baru Berhasil ditambahkan');
} elseif ($_POST['edit_data']) {
    mysqli_query($koneksi, "UPDATE siswa SET
        no_induk='$no_induk',
        nama='$nama',
        kelas='$kelas',
        semester='$semester',
        wali_kelas='$wali_kelas',
        guru_pendamping='$guru_pendamping',
        guru_bk='$guru_bk',
        status_siswa='$status_siswa' WHERE id='$_GET[id]' ");
    header('location:index.php?page=list_siswa&&alert=Data Berhasil diperbarui');
} elseif ($_GET['prm']) {
    mysqli_query($koneksi, "DELETE FROM siswa WHERE no_induk = '$_GET[prm]'");
    header('location:index.php?page=list_siswa&&alert=Data Telah dihapus');
} elseif ($_GET['naik_kelas']) {
    if ($_GET['naik_kelas']=="VII") {
        mysqli_query($koneksi, "UPDATE siswa SET kelas='VIII' WHERE id='$_GET[id]'");
        header('location:index.php?page=list_siswa');
    } elseif ($_GET['naik_kelas']=="VIII") {
        mysqli_query($koneksi, "UPDATE siswa SET kelas='IX' WHERE id='$_GET[id]'");
        header('location:index.php?page=list_siswa');
    } elseif ($_GET['naik_kelas']=="IX") {
        header('location:index.php?page=list_siswa');
    }
} elseif ($_GET['semester']) {
    if ($_GET['semester']=="Ganjil") {
        mysqli_query($koneksi, "UPDATE siswa SET semester='Genap' WHERE id='$_GET[id]'");
        header('location:index.php?page=list_siswa');
    } elseif ($_GET['semester']=="Genap") {
        mysqli_query($koneksi, "UPDATE siswa SET semester='Ganjil' WHERE id='$_GET[id]'");
        header('location:index.php?page=list_siswa');
    }
} elseif ($_POST['setting']) {
    mysqli_query($koneksi, "UPDATE siswa SET username = '$_POST[username]', password = '$_POST[password]' WHERE id = '$_POST[id]'");
    header('location:proses_login.php?logout=yes');
}
