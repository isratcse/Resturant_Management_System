<?php 
include 'connect.php';
?>

<html>
<head>
<title>Restaurant project</title>
<link rel='stylesheet' type='text/css' href='css/style2.css'/>
<style>
.wrapper{
	
	padding:1%;
	width:80%;
	margin:0 auto;
}
.text-center{
	text-align:center;
}
.clearfix{
	float:none;
	clear:both;
}
.menu{
	border-bottom:1px solid grey;
}
.menu ul{
	list-style-type:none;
}
.menu ul li{
	display:inline;
	padding:1%;
}
.menu ul li a{
	text-decoration:none;
	font-weight:bold;
	color:black;
}
.main-content{
	background:#f1f2f6;
	padding:3% 0;
}
.col-4{
	width:15%;
	background-color:white;
	margin:1%;
	padding:2%;
	float:left;
	
}
.footer{
background:red;
	

}
</style>
</head>
<body>
<div class="menu text-center">
<div class="wrapper">
<ul>
<li><a href="#">Home</a></li>
<li><a href="http://localhost/restaurant-project/admin/display.php/">Admin</a></li>
<li><a href="http://localhost/restaurant-project/admin/manage-category.php/">Category</a></li>
<li><a href="#">Food</a></li>

<li><a href="#">Order</a></li>
<li><a href="http://localhost/restaurant-project/admin/login.php/">Logout</a></li>
</ul>
</div>
</div>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
<?php
if(isset($_SESSION['upload']))
{
	echo $_SESSION['upload'];
	unset($_SESSION['upload']);
  
}
?>






        <form action="" method="POST"enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text"name="title"placeholder="title of the food">
</td>
</tr>
<tr>
<td>Description: </td>
<td>
    <textarea name="description"cols="30"rows="5"placeholder="Description of the Food"></textarea>
</td>

</tr>
<tr>
<td>Price: </td>
<td>
    <input type="number"name="price">

</td>


</tr>
<tr>
<td>Select Image: </td>
<td>
    <input type="file"name="image">
]
</td>
</tr>
<tr>
<td>Category: </td>
<td>
    <select name="category">
        <?php
        //create sql to get all active categories from the database
        $sql="SELECT * FROM tbl_category WHERE active='No'";
        //executing query
        $res=mysqli_query($con,$sql);
        //count rows to check wether we have categories or not
        $count=mysqli_num_rows($res);
        //if count is greater than zero, we have caategories else we do not have categories
        if($count>0){
            //we have categories
            while($row=mysqli_fetch_assoc($res)){
                //get all the details of categories
                $id=$row['id'];
                $title=$row['title'];
                ?>

                 <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                <?php
            }

        }
        else
        {
            //we do not have categories
            ?>
            <option value="0">No category found</option>

            <?php

        }
        ?>
      
</select>
    
</td>
</tr>
<tr>
<td>Featured: </td>
<td>
    <input type="radio"name="featured"value="Yes">Yes
    <input type="radio"name="featured"value="No">No
    
</td>
</tr>
<tr>
<td>Active: </td>
<td>
<input type="radio"name="active"value="Yes">Yes
    <input type="radio"name="active"value="No">No
</td>
</tr>
<tr>
    <td colspan="2">
        <input type="submit"name="submit"value="Add Food" class="btn-secondary">
    </td>
</tr>
</table>
</form>
<?php
//check wether the button click or not
if(isset($_POST['submit']))
{
    //Add the food in database
    //echo"Clicked";
    //Get the data from form
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    //check wether radio button for fetured and actiove are chaecked or not.
    if(isset($_POST['featured'])){
        $featured=$_POST['featured'];

    }
    else{
        $featured="No";//setting the default value

    }
    if(isset($_POST['active'])){
        $active=$_POST['active'];

    }
    else{
        $active="No";//setting the default value
    }

    //upload the image if selected
    //check wether the selected image is clicked or not and upload the image only if the image  is selected
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
        if($image_name=""){
            //image is selected
            //Get the extension from the selected image
            $ext=end(explode('.',$image_name));
            //cretate the new name for image
            $image_name="Food-Name-".rand(0000,9999).".".$ext;
            //upload the image
            //Get the src path and destination path
        

            //source path is the current location of the image
            $src=$_FILES['image']['tmp_name'];
            
  
            $dst="../images/category/".$image_name;
            $upload=move_uploaded_file($src,$dst);
            if($upload==false)
            {
               $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
               header('location:http://localhost/restaurant-project/admin/manage-food.php');
               die();
            }

        }

    }
    else{
        $image_name="";//setting the default value
    }

    //insert into database
    //create sql query to insert category in database
    $sql="INSERT INTO tbl_food SET
    title='$title',
    description='$description',
    price=$price,
   image_name='$image_name',
   category_id=$category,
    featured='$featured',
    active='$active'
    ";
//execute the query and save in database
        $res2=mysqli_query($con,$sql);
//check whether the  query execute or not and data add or not
 if($res2==true){
 //query execute and category added
    $_SESSION['add']="<div class='success'>food Added Successfully.</div>";
    header("location:http://localhost/restaurant-project/admin/manage-food.php");
    
 }
 else{
     $_SESSION['add']="<div class='error'>Faild to add category</div>";
      header('location:'.SITEURL.'admin/manage-food.php');
 }
}

?>
</div>
</div>
