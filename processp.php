<?php
	
	$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
	if (mysqli_connect_errno()){
		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
	}


	$gambar = '';
	$harga = '';
	$nama = '';
	$id = 0;
	if (isset($_GET['kate'])){
		$id= $_GET['kate'];
		$query = "SELECT * FROM barang WHERE kategori = $id";
		$result = mysqli_query($con,$query);
		
		$row = $result->fetch_assoc();
			$gambar =$row['gambar'];
			$harga= $row['harga'];
			$nama= $row['nama'];

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
		
	}

	if (isset($_GET['cari'])){
		$nmb = $_GET['carinama'];

		header('location:shop.php?nmb='.$nmb);
		

    }
?>