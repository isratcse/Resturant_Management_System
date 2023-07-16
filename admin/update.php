<?php 
include 'connect.php';

//$id=$_GET['updateid'];

if(isset($_POST['submit'])){
	$id=$_POST['updateid'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];
	
	
	$sql="update tbl_admin set id=$id,name='$name',email='$email',mobile='$mobile',password='$password'where id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		//echo "Data update successfully";
		header("Location: http://localhost/restaurant-project/admin/display.php");
	}
	else{
		die(mysqli_error($con));
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Restaurant project</title>
  </head>
  <body>
    <div class="container my-5">
		<form method="post" action="update.php">
		  <div class="form-group">
		  <?php 
		 //echo '<input type="hidden" name="id" value = '.$id.'>';
		  ?>
		<?php
		  	$id = $_GET['updateid'];
			$sql="select* from tbl_admin WHERE id=".$id;
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_assoc($result);

			echo 
				'<input type="hidden" name="updateid" value = '.$row['id'].'>
				<label>Name</label>
				<input type="text" class="form-control" placeholder="Enter your name"name="name" value = '.$row['name'].' autocomplete="off">
				</div>
				<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="Enter your Email"name="email" value = '.$row['email'].'  autocomplete="off">
				</div>
				<div class="form-group">
				<label>Mobile</label>
				<input type="text" class="form-control" placeholder="Enter your Mobile number"name="mobile" value = '.$row['mobile'].'  autocomplete="off">
				</div>
				<div class="form-group">
				<label>Password</label>
				<input type="text" class="form-control" placeholder="Enter your password"name="password" value = '.$row['password'].'  autocomplete="off">
				</div>
				<button type="submit" class="btn btn-primary"name="submit">Update</button>';
		?>
		</form>
	</div>

    
    
  </body>
</html>