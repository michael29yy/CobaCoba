<?php
	
	session_start();

	$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }  

    if (isset($_POST['login'])){
    	$uname = $_POST['uname'];
    	$pass = $_POST['pass'];
    	$query = "SELECT * FROM pegawai where level ='Manager' and username = '$uname' and password = '$pass'";
    	$result = mysqli_query($con,$query);

    	if (empty($uname) || empty($pass)){
    		header("location:halamanloginmngr.php?Empty= Isi Bagian Yang Kosong!!");
    	}
    	else{ 
    		if (mysqli_fetch_assoc($result)){
    			$_SESSION['User'] = $uname;
    			header("location:dataProduk.php");
    		}
    		else{
    			header("location:halamanloginmngr.php?Invalid= Username atau Password Salah!!");
    		}
    	}
    }
?>