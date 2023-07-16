<?php 
include 'connect.php';
?>
<!--add category form start-->
<div class="main-content">
<div class="wrapper">
<h1>Update category<h1>
<?php

if(isset($_POST['id']))
{
 
	$id=$_POST['id'];

  $title = $_POST['title'];
  $featured = $_POST['featured'];
  $active = $_POST['active'];


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

    }
    else{
      //don't upload image and set the image_name value as blank
      $image_name="";
    }


    $sql="UPDATE tbl_category 
          SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
          WHERE
            id = '$id'
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
    $_SESSION['no-category-found']="<div class='error'>Category not found.</div>";
    header("location:http://localhost/restaurant-project/admin/manage-category.php");
  }

}
else if(isset($_GET['updateid']))
{
  //die("asdfasdf");
	$id=$_GET['updateid'];
  $sql="SELECT * FROM tbl_category WHERE id=$id";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count==1){
    //get all the data
    $row=mysqli_fetch_assoc($res);
    $title=$row['title'];
    $image=$row['image_name'];
    $featured=$row['featured'];
    $active=$row['active'];

  }
  else{
    $_SESSION['no-category-found']="<div class='error'>Category not found.</div>";
    header("location:http://localhost/restaurant-project/admin/manage-category.php");
  }
}
else{
  //header("location:http://localhost/restaurant-project/admin/manage-category.php");
}
?>
  <form action="update-category.php" method="POST"enctype="multipart/form-data">
  <table class="tbl-30">
  <tr>
  <td>Title:</td>
  <td>
  <input type="hidden"name="id" value="<?php echo $id; ?>">
  <input type="text"name="title" value="<?php echo $title; ?>">
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
  <input type="radio"name="featured"value="Yes" <?php if($featured == "Yes")echo "checked"; ?>>Yes
  <input type="radio"name="featured"value="No" <?php if($featured == "No")echo "checked"; ?>>No
  </td>
  </tr>
  <tr>
    <td>Active:</td>
    <td>
    <input type="radio"name="active"value="Yes" <?php if($active=="Yes")echo "checked"; ?>>Yes
    <input type="radio"name="active"value="No" <?php if($active=="No")echo "checked"; ?>>No
    </td>
  </tr>
  
<tr>
  <td colspan="2">
  <input type="submit"name="submit"value="Upadate Category"class="btn-secondary">
  
  </td>
  </tr>
  
  </table>
  </form>
  <!--Add category form end-->

 

  </div>
  </div>
  
