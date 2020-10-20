<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin</title>

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
    <div class="sidebar" data-color="red" data-image="PBP/uploads/47471.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Boolean Music
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
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
                    <a class="navbar-brand" href="#">Table List</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Table Barang</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <?php 
                                    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
                                    if (mysqli_connect_errno()){
                                        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                                    }  
                                    $query = "SELECT * FROM barang";
                                    $result = mysqli_query($con,$query);
                                ?>                                
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Nama Barang</th>
                                    	<th>Kategori</th>
                                    	<th>Sub Kategori</th>
                                    	<th>Jumlah</th>
                                        <th>Harga</th>
                                        <th colspan="2" style="text-align: center;">Act</th>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $result->fetch_assoc()):?>
                                        <tr>
                                            <td><?php echo $row['id_barang'];?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <?php 
                                                $query2 = "SELECT kategori.nama as nama FROM kategori,barang where kategori.id_kategori=".$row['kategori'];
                                                $result2 = mysqli_query($con,$query2);
                                                $row2 = $result2->fetch_assoc();
                                            ?>
                                            <td><?php echo $row['kategori']." : ".$row2['nama'];?></td>
                                            <?php 
                                                $query3 = "SELECT sub_kategori.nama as nama FROM sub_kategori,barang where sub_kategori.idsub_kategori=".$row['sub_kategori'];
                                                $result3 = mysqli_query($con,$query3);
                                                $row3 = $result3->fetch_assoc();
                                            ?>
                                            <td><?php echo $row['sub_kategori']." : ".$row3['nama'];?></td>
                                            <td><?php echo $row['jumlah'];?></td>
                                            <td><?php echo $row['harga'];?></td>
                                            <td><a href="PBP/crudpegawai4.php" type="button" class="btn btn-primary">EDIT</a></td>
                                            <td><a href="PBP/crudpegawai4.php" type="button" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php endwhile; ?>     
                                    </tbody>
                                </table>
                                <div class="container-fluid">
                                    <a href="PBP/crudbarang1.php" type="button" class="btn btn-default">EDIT</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Table Kategori</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <?php 
                                    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
                                    if (mysqli_connect_errno()){
                                        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                                    }  
                                    $query = "SELECT * FROM kategori";
                                    $result = mysqli_query($con,$query);
                                ?>                                
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID Kategori</th>
                                        <th>Nama Kategori</th>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $result->fetch_assoc()):?>
                                        <tr>
                                            <td><?php echo $row['id_kategori'];?></td>
                                            <td><?php echo $row['nama'];?></td>
                                        </tr>
                                        <?php endwhile; ?>     
                                    </tbody>
                                </table>
                                <div class="container-fluid">
                                    <a href="PBP/crudkategori2.php" type="button" class="btn btn-default">EDIT</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Table Sub Kategori</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <?php 
                                    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
                                    if (mysqli_connect_errno()){
                                        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                                    }  
                                    $query = "SELECT * FROM sub_kategori";
                                    $result = mysqli_query($con,$query);
                                ?>                                
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID Sub Kategori</th>
                                        <th>Nama Sub Kategori</th>
                                        <th>ID Kategori</th>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $result->fetch_assoc()):?>
                                        <tr>
                                            <td><?php echo $row['idsub_kategori'];?></td>
                                            <td><?php echo $row['nama'];?></td>
                                            <td><?php echo $row['id_kategori']?></td>
                                        </tr>
                                        <?php endwhile; ?>     
                                    </tbody>
                                </table>
                                <div class="container-fluid">
                                    <a href="PBP/crudsubkategori3.php" type="button" class="btn btn-default">EDIT</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Table Pegawai</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <?php 
                                    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
                                    if (mysqli_connect_errno()){
                                        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                                    }  
                                    $query = "SELECT * FROM pegawai";
                                    $result = mysqli_query($con,$query);
                                ?>                                
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID Pegawai</th>
                                        <th>Nama Pegawai</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Level</th>
                                        <th colspan="2" style="text-align: center;">Act</th>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $result->fetch_assoc()):?>
                                        <tr>
                                            <td><?php echo $row['id_pegawai'];?></td>
                                            <td><?php echo $row['nama_lengkap'];?></td>
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['password'];?></td>
                                            <td><?php echo $row['level'];?></td>
                                            <td><a href="PBP/crudpegawai4.php" type="button" class="btn btn-primary">EDIT</a></td>
                                            <td><a href="PBP/crudpegawai4.php" type="button" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php endwhile; ?>     
                                    </tbody>
                                </table>
                                <div class="container-fluid">
                                    <a href="PBP/crudpegawai4.php" type="button" class="btn btn-default">EDIT</a>
                                </div>
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