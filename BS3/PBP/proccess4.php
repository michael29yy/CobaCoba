<?php
    
    session_start();

    $id_pegawai = '';
    $username = '';
    $nama = '';
    $email = '';
    $password = '';
    $level = '';
    $update = false;
    $id =0;
    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');

    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }       

	if(isset($_POST['save'])){
		$id_pegawai = $_POST['id_pegawai'];
		$username = $_POST['username'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$level = $_POST['level'];

		$query = "INSERT INTO pegawai (id_pegawai,username,nama_lengkap,email,password,level) VALUES ($id_pegawai,'$username', '$nama', '$email', '$password','$level')";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been added';
		$_SESSION['msg_type'] = 'success';

		header("location: crudpegawai4.php");

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$query = "DELETE from pegawai WHERE id_pegawai =$id";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been deleted';
		$_SESSION['msg_type'] = 'danger';

		header("location: crudpegawai4.php");
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$query = "SELECT * FROM pegawai WHERE id_pegawai=$id";
		$result = mysqli_query($con,$query);

			$row = $result->fetch_array();
			$id_pegawai = $row['id_pegawai'];
			$username = $row['username'];
			$nama = $row['nama_lengkap'];
			$email = $row['email'];
			$password = $row['password'];
			$level = $row['level'];
		
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$id_pegawai = $_POST['id_pegawai'];
		$username = $_POST['username'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$level = $_POST['level'];

		$query = "UPDATE pegawai SET id_pegawai = $id_pegawai, username = '$username', nama_lengkap = '$nama', email = '$email', password = '$password', level = '$level' WHERE id_pegawai=$id";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been updated';
		$_SESSION['msg_type'] = 'warning';

		header('location: crudpegawai4.php');

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}


	if(isset($_POST['savec'])){
		$id = $_POST['id'];
		$id_pegawai = $_POST['id_pegawai'];
		$username = $_POST['username'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$level = $_POST['level'];

		$query = "UPDATE pegawai SET nama_lengkap = '$nama', email = '$email', password = '$password' WHERE id_pegawai=$id";
		$result = mysqli_query($con,$query);

		$query2 = "SELECT * FROM pegawai WHERE id_pegawai=$id";
		$result2 = mysqli_query($con,$query2);
		$row = mysqli_fetch_assoc($result2);

		if ($row['level'] == 'Admin') {
			header('location: ../table.php');
		}
		else{
			if($row['level'] == 'Manager'){
				header('location: ../dataProduk.php');
			}
			else{
				header('location:profile.php');
			}
		}
		

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if (isset($_POST['cancel'])) {
		$id = $_POST['id'];
		$query2 = "SELECT * FROM pegawai WHERE id_pegawai=$id";
		$result2 = mysqli_query($con,$query2);
		$row = mysqli_fetch_assoc($result2);

		if ($row['level'] == 'Admin') {
			header('location: ../table.php');
		}
		else{
			if($row['level'] == 'Manager'){
				header('location: ../dataProduk.php');
			}
			else{
				header('location:profile.php');
			}
		}
	}
?>