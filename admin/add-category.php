<?php 
include 'connect.php';
?>
<!--add category form start-->
<div class="main-content">
<div class="wrapper">
<h1>Add category<h1>
<?php
if(isset($_SESSION['add']))
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
  
}
if(isset($_SESSION['upload']))
{
	echo $_SESSION['upload'];
	unset($_SESSION['upload']);
  
}

?>
  <form action="add-category.php" method="POST"enctype="multipart/form-data">
  <table class="tbl-30">
  <tr>
  <td>Title:</td>
  <td>
  <input type="text"name="title" placeholder="Category Title">
  </td>
  </tr>
  <tr>
  <td>Select Image:</td>
  <td>
  <input type="file"name="image"placeholder="choose image">
  </td>
  </tr>
  <tr>
  <td>Featured:</td>
  <td>
  <input type="radio"name="featured"value="Yes">Yes
  <input type="radio"name="featured"value="No">No
  </td>
  </tr>
  <tr>
    <td>Active:</td>
    <td>
    <input type="radio"name="active"value="Yes">Yes
    <input type="radio"name="active"value="No">No
    </td>
  </tr>
  
<tr>
  <td colspan="2">
  <input type="submit"name="submit"value="Add Category"class="btn-secondary">
  
  </td>
  </tr>
  
  </table>
  </form>
  <!--Add category form end-->

 
<?php
 //check wether the submit button click or not
if(isset($_POST['submit']))
{   //get the value form the category
	$title=$_POST['title'];
  // for radio input, we need to check whether the button is selected or not
	if(isset($_POST['featured'])){
    //Get the value from form
		$featured = $_POST['featured'];
		
}
else
{
  //set the default value
  $featured="No";

} 
       if(isset($_POST['active'])){

	    	    $active=$_POST['active'];
		
}
else
{    $active="No";

}

//check whether the image is selected or not and set the value for image name accordingly
//print_r($_FILES['image']);
//die();//break the code here

if(isset($_FILES['image']['name'])){
  //upload the image
  //to upload image we need image name,source path and destination path
  $image_name=$_FILES['image']['name'];
  
  //auto rename our  image
  //get the extension
  $ext=end(explode('.',$image_name));
  //rename the image
  $image_name="Food_Category_".rand(000,999).'.'.$ext;
   $source_path=$_FILES['image']['tmp_name'];
  
   $destination_path="../images/category/".$image_name;
   $upload=move_uploaded_file($source_path,$destination_path);
   if($upload==false)
   {
      $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
      header('location:http://localhost/restaurant-project/admin/add-category.php');
      die();
   }
  }
  else{
  
    //don't upload image and set the image_name value as blank
    $image_name="";
  }
  
   //image_name='$image_name',
  if(isset($_SESSION['upload']))
  {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
  }
//create sql query to insert category in database
     $sql="INSERT INTO tbl_category SET
        title='$title',
       image_name='$image_name',
        featured='$featured',
        active='$active'
        ";
   //execute the query and save in database
	        $res=mysqli_query($con,$sql);
   //check whether the  query execute or not and data add or not
	 if($res==true){
     //query execute and category added
        $_SESSION['add']="<div class='success'>Category Added Successfully.</div>";
        header("location:http://localhost/restaurant-project/admin/manage-category.php");
        
	 }
	 else{
		 $_SESSION['add']="<div class='error'>Faild to add category</div>";
		  header('location:'.SITEURL.'admin/add-category.php');
	 }
}
?>	
  </div>
  </div>
  
