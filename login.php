
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.5/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="proses_login.php" method="post">
      <?php
      error_reporting(0);
      if ($_GET['gagal']) { ?>
        <div class="alert alert-danger">
          <strong>Gagal!</strong> Pastikan Nama Pengguna dan Sandi Benar.
        </div>
      <?php } ?>

      <img class="mb-4" src="img\SMPN 1 PRAMBON.png" alt="" width="72" >
      <h3 class="h3 mb-3 font-weight-normal">SMP Negeri 1 Prambon</h3>
      <label for="username" class="sr-only"></label>
      <input name="username" type="text" class="form-control" placeholder="Nama Pengguna" required autofocus>
      <label for="password" class="sr-only"></label>
      <input name="password" type="password" class="form-control" placeholder="Kata Sandi" required>
      <div class="checkbox mb-3 radio">
        <h6>Masuk Sebagai?</h6>
        <label><input value="Guru" type="radio" name="guru"> Guru</label><br>
        <label><input value="Orang Tua" type="radio" name="ortu"> Orang Tua</label>
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Masuk">

      <p class="mt-5 mb-3 text-muted">&copy; SMPN 1 PRAMBON 2020</p>
    </form>
</body>
</html>
