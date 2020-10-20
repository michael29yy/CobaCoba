<?php
	
	session_start();

	$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }  

    if (isset($_POST['login'])){
    	$uname = $_POST['uname'];
    	$pass = $_POST['pass'];
    	$query = "SELECT * FROM pegawai where username = '$uname' and password = '$pass'";
    	$result = mysqli_query($con,$query);

    	if (empty($uname) || empty($pass)){
    		header("location:halamanlogin.php?Empty= Isi Bagian Yang Kosong!!");
    	}
    	else{ 
            $row = mysqli_fetch_assoc($result);
            if ($row['level'] == 'Admin'){
        		$_SESSION['User'] = $uname;
        		header("location:BS3/table.php");
        	}
        	else{
                if ($row['level'] == 'Manager'){
                    $_SESSION['User'] = $uname;
                    header("location:BS3/dataProduk.php");
                }
                else{
                    header("location:halamanlogin.php?Invalid= Username atau Password Salah!!");
                }       
            }    
    	}
    }
?>