<!DOCTYPE html>
<html>
<head>
	<title>CRUD Kategori</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php require_once'proccess2.php'; ?>

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
		<label id="t1" style="font-size: 25px;font-family:Times New Roman;" ><b>Info Kategori</b></label>
	</div>
	<?php 
		$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    	if (mysqli_connect_errno()){
       		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
		}  
		$query = "SELECT * FROM kategori";
		$result = mysqli_query($con,$query);
	?>
	<div class="row justify-content-left">
		<table class="table">
			<thead>
				<tr>
					<th>ID Kategori</th>
					<th>Nama Barang</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php
				while($row = $result->fetch_assoc()):
			?>
			<tr>
				<td><?php echo $row['id_kategori'];?></td>
				<td><?php echo $row['nama'];?></td>
				<td>
					<a href="crudkategori2.php?edit= <?php echo $row['id_kategori']?>#f1" class="btn btn-info" >Edit</a>
					<a href="proccess2.php?delete=<?php echo $row['id_kategori']?>" class="btn btn-danger">Delete</a>
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
		<form action="proccess2.php" method="POST">
			<h5 id="f1" style="font-size: 25px; font-family: Times New Roman;"><b>Pengisian</b></h5>
			<hr>
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<div class="form-group">
				<label>ID Kategori</label>
				<input type="text" name="id_kategori" class="form-control" 
				value="<?php echo $id_kategori;?>" placeholder="id_kategori">
			</div>

			<div class="form-group">
				<label>Nama Kategori</label>
				<input type="text" name="nama" class="form-control" 
				value="<?php echo $nama;?>" placeholder="Nama Kategori">
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