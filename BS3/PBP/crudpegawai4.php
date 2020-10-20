<!DOCTYPE html>
<html>
<head>
	<title>CRUD Pegawai</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

	<?php require_once'proccess4.php'; ?>

	<?php
		if(isset($_SESSION['message'])):
	?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif?>

	<div class="container">
	<div>
		<label id="t1" style="font-size: 25px;font-family:Times New Roman;" ><b>Info Pegawai</b></label>
	</div>
	<?php 
		$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    	if (mysqli_connect_errno()){
       		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
		}  
		$query = "SELECT * FROM pegawai";
		$result = mysqli_query($con,$query);
	?>
	<div class="row justify-content-left">
		<table class="table">
			<thead>
				<tr>
					<th>ID Pegawai</th>
					<th>username</th>
					<th>Nama Lengkap</th>
					<th>E-mail</th>
					<th>Password</th>
					<th>Level</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php
				while($row = $result->fetch_assoc()):
			?>
			<tr>
				<td><?php echo $row['id_pegawai'];?></td>
				<td><?php echo $row['username'];?></td>
				<td><?php echo $row['nama_lengkap'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['password'];?></td>
				<td><?php echo $row['level'];?></td>
				<td>
					<a href="crudpegawai4.php?edit= <?php echo $row['id_pegawai']?>#f1" class="btn btn-info" >Edit</a>
					<a href="proccess4.php?delete=<?php echo $row['id_pegawai']?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php endwhile; ?> 
		</table>
	</div>
	<?php
		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}
	?>
		<div class="row justify-content-left">
		<form action="proccess4.php" method="POST">		
			<h5 id="f1" style="font-size: 25px; font-family: Times New Roman;"><b>Pengisian</b></h5>
			<hr>
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<div class="form-group">
				<label>ID Pegawai</label>
				<input type="text" name="id_pegawai" class="form-control" 
				value="<?php echo $id_pegawai;?>" placeholder="ID Pegawai">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" 
				value="<?php echo $username;?>" placeholder="Username">
			</div>
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama" class="form-control" 
				value="<?php echo $nama;?>" placeholder="Nama Lengkap">
			</div>
			<div class="form-group">
				<label>E-mail</label>
				<input type="text" name="email" class="form-control" 
				value="<?php echo $email;?>" placeholder="E-mail">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control" 
				value="<?php echo $password;?>" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Level</label>
				<select name="level" class="form-control">
					<option value="<?php echo $level;?>">--Level Pegawai--</option>
					<option value="Admin">Admin</option>
					<option value="Manager">Manager</option>
				</select>
			</div>

			<div class="form-group">
				<?php
					if($update == true):
				?>
				<button type="submit" class="btn btn-info" name="update">Update</button>
				<?php else:?>
				<button type="submit" class="btn btn-primary" name="save">Save</button>
				<?php endif?>
				<a href="../table.php" class="btn btn-danger">Cancel</a>
				<a href="#t1"  class="btn btn-default">Up</a>
			</div>
		</form>
		</div>
	</div>

</body>
</html>