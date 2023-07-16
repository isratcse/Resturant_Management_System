<?php include('partials-front/menu.php'); ?>
<?php 
include 'admin/connect.php';
?>

<?php
//check wether food id is set or not
if(isset($_GET['food_id'])){
        //Get the food id and details of the selected food
        $food_id = $_GET['food_id'];
        //Get the details of the selected food
        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        //execute the query
        $res = mysqli_query($con,$sql);
        //count the rows
        $count = mysqli_num_rows($res);
        //check wether the data is available or not
        if($count==1){
            //we have data
            //Get the data from database
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
    }
    else{
        //food not available
          //Redirect to homapage
       header('location:'.SITEURL);
    }

}
else{
    //Redirect to homapage
    header('location:'.SITEURL);
}
?>

 <section class="food-search">
 <div class="container">
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
        <form action=""method="POST" class="order">
        <fieldset>
        <legend>Selected Food</legend>
        <div class="food-menu-img">
            <?php
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
        <div class="food-menu-desc">
        <h3><?php echo $title; ?></h3>
        <input type="hidden" name="food" value="<?php echo $title; ?>">
        <p class="food-price">TK<?php echo $price; ?></p>
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <div class="order-label">Quantity</div>
        <input type="number" name="quantity" class="input-responsive" value="1" required>
                            
 </div>

</fieldset>
                
<fieldset>
<legend>Delivery Details</legend>
        <div class="order-label">Full Name</div>
        <input type="text" name="full_name" placeholder="Name" class="input-responsive" required>
        <div class="order-label">Phone Number</div>
        <input type="tel" name="contact" placeholder="phone number" class="input-responsive" required>
        <div class="order-label">Email</div>
        <input type="email" name="email" placeholder="Email" class="input-responsive" required>
        <div class="order-label">Address</div>
        <textarea name="address" rows="7" placeholder="Street,House No,Region" class="input-responsive" required></textarea>
        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
    </fieldset>
 </form>
<?php
//check whether submit button is clickedor not
if(isset($_POST['submit'])){
    //Get all the datails from the form
        $food = $_POST['food'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $total = $price * $quantity;//total=price*qty
        $order_date= date("Y-m-d h:i:sa");//order date

        $status = "Ordered";//ordered,on delivary,delivered,cancelled
        $customer_name = $_POST['full_name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address= $_POST['address'];
        //save the order in database
        //create sql to save the data
        $sql2 = "INSERT INTO tbl_order SET
        food = '$food',
        price = $price,
        quantity = $quantity,
        total = $total,
        order_date = '$order_date',
        status = '$status',
        customer_name= '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'
        
    ";
      echo $sql2; die();
        //execute the query

        $res2 = mysqli_query($con,$sql2);

        //check wether query execute successfully or not
        if($res2==true){
            //query execute and order saved
            $_SESSION['order'] = "<div class='success'>Food order successfully.</div>";
            header('location:'.SITEURL);
        }
        else{
            //failed to save oder
           $_SESSION['order'] = "<div class='error'>Failed to Order Food.</div>";
            header('location:'.SITEURL);
        }
}
?>
 </div>
 </section>
 <?php include('partials-front/footer.php'); ?>