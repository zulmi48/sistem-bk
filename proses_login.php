<?php
include 'database.php';
$username = $_POST['username'];
$password = $_POST['password'];

if ($_POST['guru']) {
    $login=mysqli_query($koneksi, "SELECT * FROM guru WHERE username='$username' AND password='$password' ");
    $cek=mysqli_num_rows($login);

    if ($cek > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['akses'] = "guru";
        header('location:index.php?page=dashboard');
    } else {
        header('location:login.php?gagal=yes');
    }
} elseif ($_POST['ortu']) {
    $login=mysqli_query($koneksi, "SELECT * FROM siswa WHERE username='$username' AND password='$password' ");
    $cek=mysqli_num_rows($login);

    if ($cek > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['akses'] = "ortu";
        header('location:index.php?page=data_siswa');
    } else {
        header('location:login.php?gagal=yes');
    }
} elseif ($_GET['logout']) {
    session_start();
    session_destroy();
    header('location:index.php');
}
