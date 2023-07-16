<?php
include 'connect.php';

?>

<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
	
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Restaurant-project</title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  
	</head>
	<body>
	<div class="container">
	
	<button class="btn btn-primary my-5"><a href="http://localhost/restaurant-project/admin/manage-admin.php/" 
	class="text-light">Add admin</a>
	
	</button>
	
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql="select* from tbl_admin";
  $result=mysqli_query($con,$sql);
  if($result){
	 while($row=mysqli_fetch_assoc($result)){
		 $id=$row['id'];
		 $name=$row['name'];
		 $email=$row['email'];
		 $mobile=$row['mobile'];
		 $password=$row['password'];
		 echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$mobile.'</td>
      <td>'.$password.'</td>
	  <td>
	  
	<button class="btn btn-primary"><a href="http://localhost/restaurant-project/admin/update.php?updateid='.$id.'"class="text-light">Update</a></button>
	<button class="btn btn-danger"><a href="http://localhost/restaurant-project/admin/delete.php?deleteid='.$id.'"class="text-light">Delete</a></button>
	</td>
    </tr>';
  }
  }
  
  ?>
  
   
  </tbody>
    </table>
	 </div>
	  </body>
	   </html>