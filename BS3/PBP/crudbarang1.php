<!DOCTYPE html>
<html>
<head>
	<title>CRUD Barang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php require_once'proccess1.php'; ?>

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
	<div class="row justify-content-left">
		<label id="t1" style="font-size: 25px;font-family:Times New Roman;" ><b>Info Barang</b></label>
	</div>
	<?php 
		$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
    	if (mysqli_connect_errno()){
       		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
		}  
		$query = "SELECT * FROM barang";
		$result = mysqli_query($con,$query);
	?>
	<div class="row justify-content-left">
		<table class="table">
			<thead>
				<tr>
					<th>ID barang</th>
					<th>Nama Barang</th>
					<th>Kategori</th>
					<th>Sub Kategori</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Gambar</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php
				while($row = $result->fetch_assoc()):
			?>
			<tr>
				<td><?php echo $row['id_barang'];?></td>
				<td><?php echo $row['nama'];?></td>
				<?php 
					$query2 = "SELECT kategori.nama as nama FROM kategori,barang where kategori.id_kategori=".$row['kategori'];
					$result2 = mysqli_query($con,$query2);
					$row2 = $result2->fetch_assoc();
				?>
				<td><?php echo $row['kategori']." : ".$row2['nama'];?></td>
				<?php 
					$query3 = "SELECT sub_kategori.nama as nama FROM sub_kategori,barang where sub_kategori.idsub_kategori=".$row['sub_kategori'];
					$result3 = mysqli_query($con,$query3);
					$row3 = $result3->fetch_assoc();
				?>
				<td><?php echo $row['sub_kategori']." : ".$row3['nama'];?></td>
				<td><?php echo $row['jumlah'];?></td>
				<td><?php echo $row['harga'];?></td>
				<td><?php echo "<img src='{$row['gambar']}' width = '50' height = '50' alt ='Gambar'> " ?></td>
				<td>
					<a href="crudbarang1.php?edit= <?php echo $row['id_barang']?>#f1" class="btn btn-info" >Edit</a>
					<a href="proccess1.php?delete=<?php echo $row['id_barang']?>" class="btn btn-danger">Delete</a>
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
		<form action="proccess1.php" method="POST" enctype="multipart/form-data">
			<h5 id="f1" style="font-size: 25px; font-family: Times New Roman;"><b>Pengisian</b></h5>
			<hr>
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<div class="form-group">
				<label>Nama Barang</label>
				<input type="text" name="name" class="form-control" 
				value="<?php echo $name;?>" placeholder="Nama barang">
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<select name="kategori" class="form-control">
					<?php
						$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
				    	if (mysqli_connect_errno()){
				       		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
						}  
						$query = "SELECT * FROM kategori";
						$result = mysqli_query($con,$query);
					?>
					<option value="<?php echo $kategori;?>">--Pilih Kategori--</option>
					<?php while($row = $result->fetch_assoc()): ?>
					<option value="<?php echo  $row['id_kategori'];?>"> <?php echo $row['id_kategori'];?> : <?php echo $row['nama'];?></option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Sub Kategori</label>
				<select name="sub_kategori" class="form-control">
					<?php
						$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
				    	if (mysqli_connect_errno()){
				       		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
						}  
						$query = "SELECT * FROM sub_kategori";
						$result = mysqli_query($con,$query);
					?>
					<option value="<?php echo $sub_kategori;?>">--Pilih Kategori--</option>
					<?php while($row = $result->fetch_assoc()): ?>
					<option value="<?php echo  $row['idsub_kategori'];?>"> <?php echo $row['idsub_kategori'];?> : <?php echo $row['nama'];?></option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="text" name="jumlah" class="form-control" 
				value="<?php echo $jumlah;?>" placeholder="Jumlah barang">
			</div>
			<div class="form-group">
				<label>Harga Barang</label>
				<input type="text" name="harga" class="form-control" 
				value="<?php echo $harga;?>" placeholder="Harga barang">
			</div>
			<div class="form-group">
				<label for="userfile">Upload a file:</label><br/>
				<input type="file" name="userfile" id="userfile" value="<?php echo $gambar;?>" />
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