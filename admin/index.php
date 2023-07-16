
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
<li><a href="http://localhost/restaurant-project/admin/manage-food.php">Food</a></li>

<li><a href="#">Order</a></li>
<li><a href="http://localhost/restaurant-project/admin/login.php/">Logout</a></li>
</ul>
</div>
</div>
<div class="main-content">
<div class="wrapper">
<h1>DASHBOARD</h1>
<?php
               if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset  ($_SESSION['login']);

               }
               ?>
<div class="col-4 text-center">
<h1>5</h1>
<br>
categories
</div>
<div class="col-4 text-center">
<h1>5</h1>
<br>
categories
</div>
<div class="col-4 text-center">
<h1>5</h1>
<br/>
categories
</div>
<div class="col-4 text-center">
<h1>5</h1>
<br>
caegories
</div>
<div class="clearfix"></div>
</div>
</div>
<br>
<div class="footer">
<div class="wrapper">
<p class="text-center">Created by <a href="#">Taposh Shimul Israt</a> All Rights Reserved</p>
</div>
</div>
</body>
</html>