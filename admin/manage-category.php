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
	
	<button class="btn btn-primary my-5"><a href="http://localhost/restaurant-project/admin/add-category.php" 
	class="text-light">Add Category</a>
	
	</button>
	<?php
if(isset($_SESSION['add']))
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
}
if(isset($_SESSION['no-category-found']))
{
	echo $_SESSION['no-category-found'];
	unset($_SESSION['no-category-found']);
}
?>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Featured</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>
	  
      
    </tr>
	<?php
	
   //execute the query and save in database
	$sql="SELECT * FROM tbl_category";
	$res=mysqli_query($con,$sql);
	
	$count= 0;
	
	
	while($row=mysqli_fetch_assoc($res)){
		$count= $count+1;
		$id=$row['id'];
		$title=$row['title'];
		$image_name=$row['image_name'];
		$featured=$row['featured'];
		$active=$row['active'];
		
	
		echo '<tr>
			<td>'.$id.'</td>
			<td>'.$title.'</td>
			<td>'.$image_name.'</td>
			<td>'.$featured.'</td>
			<td>'.$active.'</td>
			<td>
			<button class="btn btn-primary"><a href="http://localhost/restaurant-project/admin/update-category.php?updateid='.$id.'"class="text-light">Update category</a></button>
			<button class="btn btn-danger"><a href="http://localhost/restaurant-project/admin/delete-category.php?deleteid='.$id.'"class="text-light">Delete category</a></button>
			</td>
			
		</tr>';
		
	}
	
	if($count==0)
	{
		?>
        <tr>
		<td colspan="6"><div class="error">No category added.</div></td>
		</tr>
		<?php
	}
	?>
	
  </thead>
  <tbody>
  
  </tbody>
    </table>
	 </div>
	  </body>
	   </html>