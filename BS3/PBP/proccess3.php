<?php
    session_start();

    $idsub_kategori = '';
    $nama = '';
    $id_kategori= '';
    $update = false;
    $id =0;

    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }       

    if(isset($_POST['save'])){
		$idsub_kategori = $_POST['idsub_kategori'];
		$nama = $_POST['nama'];
		$id_kategori = $_POST['kategori'];

		$query = "INSERT INTO sub_kategori (idsub_kategori,nama,id_kategori) VALUES ($idsub_kategori,'$nama',$id_kategori)";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been added';
		$_SESSION['msg_type'] = 'success';

		header("location: crudsubkategori3.php");

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }

    }

    if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$query = "DELETE from sub_kategori WHERE idsub_kategori =$id";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been deleted';
		$_SESSION['msg_type'] = 'danger';

		header("location: crudsubkategori3.php");
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
    }

    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$query = "SELECT * FROM sub_kategori WHERE idsub_kategori=$id";
		$result = mysqli_query($con,$query);

			$row = $result->fetch_array();
			$idsub_kategori = $row['idsub_kategori'];
			$nama = $row['nama'];
			$id_kategori = $row['id_kategori'];
		
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$idsub_kategori = $_POST['idsub_kategori'];
		$nama = $_POST['nama'];
		$id_kategori = $_POST['kategori'];

		$query = "UPDATE sub_kategori SET idsub_kategori = '$idsub_kategori', nama = '$nama', id_kategori=$id_kategori WHERE idsub_kategori=$id";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been updated';
		$_SESSION['msg_type'] = 'warning';

		header('location: crudsubkategori3.php');

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

?>