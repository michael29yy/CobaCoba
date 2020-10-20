<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
    <?php session_start(); ?>
<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="PBP/uploads/47471.jpg"">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Boolean Music
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dataProduk.php">
                        <i class="pe-7s-note2"></i>
                        <p>Data Produk</p>
                    </a>
                </li>
                <li>
                    <a href="rekapBarang.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Rekap Barang</p>
                    </a>
                </li>
                <li>
                    <a href="grafik.php">
                        <i class="pe-7s-graph"></i>
                        <p>Grafik</p>
                    </a>
                </li>
                <li class="active">
                    <a href="mngr.php">
                        <i class="pe-7s-user"></i>
                        <p>Admin Profile</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">User</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                                <p><?php 
                                    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
                                    if (mysqli_connect_errno()){
                                        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                                    }  
                                    if (isset($_SESSION['User'])){
                                        $query = "SELECT * FROM pegawai where username = '".$_SESSION['User']."'";
                                        $result = mysqli_query($con,$query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo 'Hello '.$row['level']."(".$_SESSION['User'].")";
                                    }
                                    else{
                                        echo '';
                                    }
                               ?></p>
                            </a>
                        </li>
                        <li>
                            <?php if (isset($_SESSION['User'])): ?>
                            <a href="../logout.php?logout">
                                <p>Log out</p>
                            </a>
                            <?php else: ?>
                                <a href="../halamanlogin.php">Log In</a>
                            <?php endif; ?>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <?php if(isset($_SESSION['User'])): ?>
                                <form method="POST">
                                    <?php
                                        $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
                                        if (mysqli_connect_errno()){
                                            die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                                        }  
                                        $query = "SELECT * FROM pegawai WHERE username = '".$_SESSION['User']."'";
                                        $result = mysqli_query($con,$query);
                                    ?>
                                    <?php while($row = $result->fetch_assoc()): ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>ID Pegawai (disabled)</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $row['id_pegawai']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Level</label>
                                                <input type="text" name="level" class="form-control" value="<?php echo $row['level']?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="<?php echo $row['username']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" value="<?php echo $row['email']?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" placeholder="Company" value="<?php echo $row['nama_lengkap']?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="<?php echo $row['password']?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="PBP/profile.php?edit= <?php echo $row['id_pegawai']?>" name="update" type="button" class="btn btn-info btn-fill pull-right">Update Profile</a>
                                    <div class="clearfix"></div>
                                    <?php endwhile; ?>
                                </form>
                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Silahkan Login Terlebih Dulu</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="index.php">Boolean Music</a>, Asik-asik JOSS!!!
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
