<?php include('partials-front/menu.php'); ?>



<section class="food_search text-center">
<div class="container">

<form action="">

<input type="search"name="search"placeholder="Search for Food">

<input type="submit"name="submit"value="Search" class="btn btn-primary">

</form>

</div>
</section>

<section class="food-menu">
<div class="container">
<h2 class="text-center">Food menu</h2>

<?php
//Getting Foods databasethat are active and featured
//sql query
$sql2 = "SELECT *FROM tbl_food WHERE active='No' AND featured='Yes' LIMIT 6";
 //execute the query
 $res2 = mysqli_query($con,$sql2);
 //count rows to check wether the category is available or not
 $count2 = mysqli_num_rows($res2);
 if($count2>0){
    //categories available
    while($row=mysqli_fetch_assoc($res2)){
        //get the values  
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $description = $row['description'];
        $image_name = $row['image_name'];
       ?>
            <div>
            <div class="food-menu-box">
            <div class="food-menu-img">
                <?php
                //check wether image available or not
                if($image_name=="")
                {
                    //Image not available
                    echo "<div class='error'>Image not available.</div>";
                }
                    else{
                        //Image available
                        ?>
                           <img src="<?php echo SITEURL; ?> ../images/category/<?php echo $image_name; ?>"alt="Barger"class="img-responsive">
                        <?php
                    }
                ?>
          
            </div>
            <div class="food-menu-des">
            <h4><?php echo $title; ?></h4>
            <p class="food-price">Tk<?php echo $price; ?></p>
            <p class="food-detail">
                <?php echo $description; ?>
            </p>
            <br></br>
            <a href="http://localhost/restaurant-project/order.php?food_id=<?php echo $id; ?>"class=" btn btn-primary">Oder Now</a>
            </div>

       <?php

    }
 }
 else{
    //food not avilable
    echo "<div class='error'>Food available or not .</div>";
 }

?>

<div class="clearfix"></div>
</div>

</section>




