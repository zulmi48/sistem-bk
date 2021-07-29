<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';
switch ($page) {
  case 'dashboard': // $page == home (jika isi dari $page adalah home)
  include "views/dashboard.php"; // load file home.php yang ada di folder views
  break;

  case 'data_siswa': // $page == berita (jika isi dari $page adalah berita)
  include "views/data_siswa.php"; // load file berita.php yang ada di folder views
  break;

  case 'data_nilai': // $page == tentang (jika isi dari $page adalah tentang)
  include "views/data_nilai.php"; // load file tentang.php yang ada di folder views
  break;

  case 'informasi_siswa':
  include "views/informasi_siswa.php";
  break;

  case 'list_siswa':
  include "views/list_siswa.php";
  break;

  case 'input_siswa':
  include "views/input_siswa.php";
  break;

  case 'siswa_edit':
  include "views/siswa_edit.php";
  break;

  case 'edit_siswa':
  include "views/edit_siswa.php";
  break;

  case 'isi_data_nilai': // $page == tentang (jika isi dari $page adalah tentang)
  include "views/isi_data_nilai.php"; // load file tentang.php yang ada di folder views
  break;

  case 'list_guru':
  include "views/list_guru.php";
  break;

  case 'edit_guru':
  include "views/edit_guru.php";
  break;

  case 'input_guru':
  include "views/input_guru.php";
  break;

  case 'setting':
  include "views/setting.php";
  break;

  case 'lihat_nilai':
  include "views/lihat_nilai.php";
  break;

  default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
  include "views/dashboard.php";
}
