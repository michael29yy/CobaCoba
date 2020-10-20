<?php
    session_start();

    $name = '';
    $kategori = '';
    $sub_kategori = '';
    $jumlah = '';
    $harga = '';
    $update = false;
    $gambar = '';
    $id =0;
    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }       

	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$kategori = $_POST['kategori'];
		$sub_kategori = $_POST['sub_kategori'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES['userfile']['name']);
		$upload_ok = 1;
		$file_type = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['userfile']['tmp_name'],$target_file);

		$query = "INSERT INTO barang (nama,kategori,sub_kategori,jumlah,harga,gambar) VALUES ('$name',$kategori,$sub_kategori,$jumlah,$harga,'$target_file')";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been added';
		$_SESSION['msg_type'] = 'success';

		header("location: crudbarang1.php");

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$query = "DELETE from barang WHERE id_barang =$id";
		$result = mysqli_query($con,$query);

		$_SESSION['message'] = 'Record has been deleted';
		$_SESSION['msg_type'] = 'danger';

		header("location: crudbarang1.php");
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$query = "SELECT * FROM barang WHERE id_barang=$id";
		$result = mysqli_query($con,$query);

			$row = $result->fetch_array();
			$name = $row['nama'];
			$kategori = $row['kategori'];
			$sub_kategori = $row['sub_kategori'];
			$jumlah = $row['jumlah'];
			$harga = $row['harga'];
		
		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$kategori = $_POST['kategori'];
		$sub_kategori = $_POST['sub_kategori'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES['userfile']['name']);
		$upload_ok = 1;
		$file_type = pathinfo($target_file,PATHINFO_EXTENSION);
		if (is_uploaded_file($_FILES['userfile']['tmp_name'])){
			move_uploaded_file($_FILES['userfile']['tmp_name'],$target_file);
			$query = "UPDATE barang SET nama = '$name', kategori = $kategori, sub_kategori = $sub_kategori, jumlah=$jumlah, harga = $harga, gambar= '$target_file' WHERE id_barang=$id";
			$result = mysqli_query($con,$query);
		}else{
			$query2 = "UPDATE barang SET nama = '$name', kategori = $kategori, sub_kategori = $sub_kategori, jumlah=$jumlah, harga = $harga WHERE id_barang=$id";
			$result2 = mysqli_query($con,$query2);
		}

		$_SESSION['message'] = 'Record has been updated';
		$_SESSION['msg_type'] = 'warning';

		header('location: crudbarang1.php');

		if (!$result){
            die ("Could not query the database: <br />". mysqli_error($con));
        }
	}
?>