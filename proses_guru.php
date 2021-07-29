<?php
include 'database.php';
if ($_POST['input_data']) {
    mysqli_query($koneksi, "INSERT INTO guru VALUES (NULL, '$_POST[nama]', '$_POST[status]', '$_POST[no_telp]', '$_POST[username]', '$_POST[password]')");
    header('location:index.php?page=list_guru&&alert=Data Baru Berhasil ditambahkan');
} elseif ($_POST['edit_data']) {
    mysqli_query($koneksi, "UPDATE guru SET nama = '$_POST[nama]', status = '$_POST[status]', no_telp = '$_POST[no_telp]' WHERE id = '$_POST[id]'");
    header('location:index.php?page=list_guru&&alert=Data Berhasil diperbarui');
} elseif ($_GET['delete']) {
    mysqli_query($koneksi, "DELETE FROM guru WHERE id = '$_GET[delete]'");
    header('location:index.php?page=list_guru&&alert=Data Telah dihapus');
} elseif ($_POST['setting']) {
    mysqli_query($koneksi, "UPDATE guru SET username = '$_POST[username]', password = '$_POST[password]' WHERE id = '$_POST[id]'");
    header('location:proses_login.php?logout=yes');
}
