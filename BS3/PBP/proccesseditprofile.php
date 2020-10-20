<?php

	$id = 0;
	$id_user = '';
	$nama = '';
	$email = '';
	$username = '';
	$password = '';
	$conf_pass = '';
    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
      if (mysqli_connect_errno()){
          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }  
    $query = "SELECT * FROM pegawai where id_pegawai = $id";
    $result = mysqli_query($con,$query); 

    while ($row = $result->fetch_assoc()) {
    	$id_user = $row['id_pegawai'];
    	$nama = $row['nama_lengkap'];
    	$email = $row['email'];
    	$username = $row['username'];
    }







?> 