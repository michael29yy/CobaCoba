<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
</head>
<body>
  <?php require_once'proccess4.php'; ?>

  <?php
    $con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
      if (mysqli_connect_errno()){
          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }  
  ?>  

  <div class="container">
    <h2>Edit Profile</h2>
    <hr>
  <div class="row">
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info">
        <h3>Personal info</h3>
        
        <form action="proccess4.php" class="form-horizontal" role="form" method="POST">
          <?php
            $query = "SELECT * FROM pegawai where id_pegawai=$id";
            $result = mysqli_query($con,$query); 
            $row = $result->fetch_assoc();
          ?>
          <input type="hidden" name="id" value="<?php echo $id;?>">
           <div class="form-group">
            <label class="col-lg-3 control-label">ID Pegawai</label>
            <div class="col-lg-6">
              <input class="form-control" type="text" value="<?php echo $id_pegawai;?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama Lengkap:</label>
            <div class="col-lg-6">
              <input class="form-control" type="text" name="nama" value="<?php echo $nama;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-6">
              <input class="form-control" type="text" name="email" value="<?php echo $email;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-6">
              <input class="form-control" type="text" name="username" value="<?php echo $username;?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-6">
              <input class="form-control" type="password" name="password" value="<?php echo $password;?>" data-toggle="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary" name="savec">Save Changes</button>
              <span></span>
              <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
            </div>
          </div>
        </form>
      </div>
      <script type="text/javascript">
        $("#password").password('toggle');
      </script>
  </div>
</div>
<hr>
</body>
</html>