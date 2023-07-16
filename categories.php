<?php include('partials-front/menu.php'); ?>

    <!-- Navbar Section Ends Here -->



    <!-- Categories Section Starts Here -->
    <section class="catagories">
<div class="container">
<h2 class="text-center">categories</h2>
             <?php
             //display all the categories that are active
             //sql query
             $sql="SELECT * FROM tbl_category WHERE active='Yes'";
             //Execute the query
             $res = mysqli_query($con,$sql);
             //count rows
             $count = mysqli_num_rows($res);
              //check whether categories available are not 
              if($count>0){
                //Categories available
                while($row=mysqli_fetch_assoc($res)){
                    //get the values  like id,title,image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="box-4" class="float-container">
                        <?php
                        //check image is available or not.
                        if($image_name==""){
                            //display message
                            echo "<div class='error'>Image not available</div>";
    
                        }
                        else{
                            //Image avialable
                            ?>
                             <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>"alt="Barger"class="img-responsive">
                            <?php
                        }
                        ?>
                   
                    <h3 class="text-white"><?php echo $title; ?></h3>
                    </div>
                    
                
                <?php
    
                }
              }
              else{
                //categories not available
                echo "<div class='error'>Category not found .</div>";
              }
             ?>

          

<div class="clearfix"></div>
</div>
</section>
    <!-- Categories Section Ends Here -->


    

    <!-- footer Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>