<?php

$koneksi = mysqli_connect("localhost","root","","bk_smpn1prambon");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
