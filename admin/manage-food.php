<?php 
include 'connect.php';
?>
<html>
<head>
<title>Restaurant project</title>
<link rel='stylesheet' type='text/css' href='css/style2.css'/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
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
	padding:5%;
	float:left;
	
}

.footer{
background:red;
	

}
.main content{
        border:1px solid grey;
        width:20%;
        margin:10% auto;
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

<br>
<div class="main content">
    <div class="wrapper">
        <h1>Manage Food<h1>
            <br/>
            <!--Button to add admin-->
            <a href="http://localhost/restaurant-project/admin/add-food.php" class="btn-primary">Add Food</a>
            <br /><br />
            <?php
if(isset($_SESSION['add']))
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
  
}
?>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
</tr>
<?php
        //create a SQL query to get all the food

        $sql="SELECT * FROM tbl_food";
        //execute the query

        $res=mysqli_query($con,$sql);

        //count rows to check wether we have foodsa or not

        $count=mysqli_num_rows($res);
        $sn=1;
if($count>0)
{
    //we have food in database
    //get the food from database and display
    while($row=mysqli_fetch_assoc($res)){
                //get the values from individual columns
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
        ?>
                        <tr>
                    <td><?php echo $sn++; ?>.</td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <?php echo $image_name; ?>


                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                    <button class="btn btn-primary"><a href="http://localhost/restaurant-project/admin/update-category.php?updateid='.$id.'"class="text-light">Update Food</a></button>
                        <button class="btn btn-danger"><a href="http://localhost/restaurant-project/admin/delete-food.php?deleteid='.$id.'"class="text-light">Delete Food</a></button>
                    </td>
        <?php
    }
}
else{
    //food not added to database
   echo" <tr><td colspan='7' class='error'>Food not added yet.</td></tr>";
}

?>

</table>
</div>
</div>
</body>
</html>