<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    
	<title>Manager</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <!-- Memanggil grafik -->
    <script src="assets/js/grafik.js"></script>
</head>
<body>
    <?php session_start(); ?>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="PBP/uploads/47471.jpg">

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
                <li class="active">
                    <a href="grafik.php">
                        <i class="pe-7s-graph"></i>
                        <p>Grafik</p>
                    </a>
                </li>
                <li>
                    <a href="mngr.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
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
                    <a class="navbar-brand" href="#">Grafik</a>
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
            <div class="container">
                 <h2>Grafik Data Produk</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Grafik Batang</div>
                                    <div class="panel-body"><iframe src="processGrafik.php" width="500" height="500"></iframe></div>
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