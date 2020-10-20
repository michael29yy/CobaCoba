<?php
    
    session_start();

    $id_kategori = '';
    $nama = '';
    $update = false;
    $id =0;

    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }       

    if(isset($_POST['save'])){
		$id_kategori = $_POST['id_kategori'];
		$nama = $_POST['nama'];

		$query = "INSERT INTO kategori (id_kategori,nama) VALUES ($id_kategori,'$nama')";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been added';
		$_SESSION['msg_type'] = 'success';

		header("location: crudkategori2.php");

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }

    }

    if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$query = "DELETE from kategori WHERE id_kategori =$id";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been deleted';
		$_SESSION['msg_type'] = 'danger';

		header("location: crudkategori2.php");
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
    }

    if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$query = "SELECT * FROM kategori WHERE id_kategori=$id";
		$result = mysqli_query($con,$query);

			$row = $result->fetch_array();
			$id_kategori = $row['id_kategori'];
			$nama = $row['nama'];
		
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$id_kategori = $_POST['id_kategori'];
		$nama = $_POST['nama'];

		$query = "UPDATE kategori SET id_kategori = '$id_kategori', nama = '$nama' WHERE id_kategori=$id";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been updated';
		$_SESSION['msg_type'] = 'warning';

		header('location: crudkategori2.php');

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

?>