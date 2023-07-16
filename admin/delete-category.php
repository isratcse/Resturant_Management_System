<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];
	$sql="DELETE FROM tbl_category WHERE id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		//echo "deleted successfully";
		header("Location: http://localhost/restaurant-project/admin/manage-category.php/");
	}
	else{
		die(mysqli_error($con));
	}
}
?>