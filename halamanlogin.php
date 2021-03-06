<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Boolean Musik </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  <?php require_once('login.php') ?>
  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Selamat Datang di Website</span>
    <span class="site-heading-lower"> Boolean Musik</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Boolean Musik</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Halaman Utama
              <span class="sr-only">(current)</span>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

<div class="row col-md-14" style="justify-content: center;">
<div class="card" style="background-color: #df902a">
  <form action="login.php" method="POST" class="text-center">
    <div class="header text-center">
        <h4 class="title">Login Pegawai Boolean Music</h4>
    </div>
      <div class="row" style="justify-content: center;">
        <div class="col-md-14">
          <?php
            if(@$_GET['Empty'] == true): 
          ?>
          <div class="form-group">                                 
              <div class="alert-light text-danger "><?php echo $_GET['Empty'] ?></div>
          </div>
          <?php endif; ?>
          <?php
            if(@$_GET['Invalid'] == true): 
          ?>
          <div class="form-group">
            <div class="alert-light text-danger "><?php echo $_GET['Invalid'] ?></div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-md-14">
          <div class="form-group">
            <label>Username: </label>
            <input type="text" class="form-control" name="uname">
          </div>
        </div>
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-md-14">
          <div class="form-group">
            <label>Password:  </label>
            <input type="password" class="form-control" name="pass">
          </div>
        </div>
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-md-14">
          <button style="color:rgba(47, 23, 15, 0.9);" type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
      </div>
      <div class="row" style="justify-content: center;">
        <div class="col-md-14">
          <a style="color:white;" href="shop.php">PENGUNJUNG? SILAHKAN KLIK DISINI</a>
        </div>
      </div>
    </form>
  </div>
  </div>
  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
