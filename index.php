
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem BK</title>
  <!-- Bootstrap Styles-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FontAwesome Styles-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Morris Chart Styles-->
  <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- Custom Styles-->
  <link href="assets/css/custom-styles.css" rel="stylesheet" />
  <!-- Google Fonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <!-- Koneksi Database-->
  <?php
    include "database.php";
    session_start();
    if ($_SESSION['akses']=="ortu") {
        $d=mysqli_query($koneksi, "SELECT * FROM siswa WHERE username ='$_SESSION[username]'");
        $user=mysqli_fetch_array($d);
    } elseif ($_SESSION['akses']=="guru") {
        $d=mysqli_query($koneksi, "SELECT * FROM guru WHERE username ='$_SESSION[username]'");
        $user=mysqli_fetch_array($d);
    }



    if ($_SESSION['status'] != "login") {
        header('location:login.php');
    }
  ?>
</head>

<body>
  <div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
      <div class="navbar-header">
        <div class="navbar-brand">
          <img style="float:right" src="img\SMPN 1 PRAMBON.png" width="30px" alt="">
          <h5>SMPN 1 PRAMBON</h5>
        </div>
      </div>

      <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            <?php
              if ($_SESSION['akses']=="ortu") {
                  echo "Wali Murid ($user[nama])";
              } else {
                  echo $user['nama'];
              }
             ?>
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="index.php?page=setting"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="proses_login.php?logout=yes"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
    </nav>
    <!--/. NAV TOP  -->

    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li>
            <a class="active-menu" href="#"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <?php if ($_SESSION['akses']=="guru") { ?>
          <li>
            <a href="#"><i class="fa fa-archive"></i> Data<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="#"><i class="fa fa-group"></i>Data Siswa<span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                  <li>
                    <a href="index.php?page=list_siswa">- List Siswa</a>
                  </li>
                  <li>
                    <a href="index.php?page=input_siswa">- Input Data</a>
                  </li>
                  <li>
                    <a href="index.php?page=siswa_edit">- Edit Data</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#"><i class="fa fa-group"></i>Data Guru<span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                  <li>
                    <a href="index.php?page=list_guru">- List Guru</a>
                  </li>
                  <li>
                    <a href="index.php?page=input_guru">- Input Data</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        <?php } ?>
        </ul>

      </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper">
      <div id="page-inner">
          <?php include "config.php"; // Load file config.php?>
      </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

  </div>
  <!-- /. WRAPPER  -->

  <!-- JS Scripts-->
  <!-- jQuery Js -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- Bootstrap Js -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Metis Menu Js -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- Custom Js -->
  <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
