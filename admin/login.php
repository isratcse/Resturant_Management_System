<?php
include 'connect.php';

?>
<html>
<head>
   
    <title>Login-for Restaurant management project</title>
    <style>
        h1 {text-align: center;}
    .login{
        border:1px solid grey;
        width:30%;
        margin:10% auto;
        background:#16a085;
    }

        </style>
    
</head>
<body>
<div class="login">
<h1 text-align: center>Welcome login page</h1>
    
    

        <?php
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
        
        $sql="SELECT * FROM tbl_admin WHERE email='$email'AND password='$password'";
        $query = $con->query($sql);
        if(mysqli_num_rows($query)>0){
            header('location:http://localhost/restaurant-project/admin/index.php/');
        }
        else{
            echo 'not ok';
        }
        }
        ?>

               
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="text-center">
            Email:
                
            <input type="email" name="email"placeholder="Enter Email"><br><br>
            
            Password:
            
             <input type="password" name="password" placeholder="Enter Password"><br><br>
                
            <input type="submit" name= "submit" value="Login" class="btn-primary">
    </form>
        </div>
   
</body>
</html>
