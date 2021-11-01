<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "syalibahotel");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SyalibaHotel</title>
  <link rel="icon" type="image/x-icon" href="assets/img/logo aja.png" >

  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/custom.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
  <div class="container">
    <div class="row text-center ">
      <div class="col-md-12">
        <img class="imgSignUp" src="assets/img/img-1.png" alt="hotel" width="450" height="350">
        <h2>Syaliba Hotel - Admin</h2>
        <br />
      </div>
    </div>
    <div class="row ">

      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <form role="form" method="post">
              <br />
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                <input 
                  type="text" 
                  class="form-control" 
                  name="user" 
                  placeholder="Username" />
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input 
                  type="password" 
                  class="form-control" 
                  name="pass" 
                  placeholder="Password" />
              </div>
              <button class="btn btn-primary btn-block" name="login">Login</button>
            </form>

            <!-- Proses loginnya -->
            <?php

            if (isset($_POST['login'])) {
              $ambil = $koneksi->query("SELECT*FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");

              $yangcocok = $ambil->num_rows;

              if ($yangcocok == 1) {
                $_SESSION['admin'] = $ambil->fetch_assoc();
                echo "<div class='alert alert-info'>Login Sukses</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
              } else {
                echo "<div class='alert alert-danger'>Login Gagal</div>";
                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
              }
            }
            ?>
          </div>

        </div>
      </div>


    </div>
  </div>

  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>

</body>

</html>