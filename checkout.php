
<?php 
session_start();
include("functions/functions.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ecommerce Website</title>
		<link rel="stylesheet" href="styles/styles.css" media="all">
		<script type="text/javascript"></script>
	</head>
	<body>
		<div class="main_wrapper">
			<div  class="header_wrapper">
                <a href="index.php"><img id="logo" src="images/ecommerce.png"/></a>
                <div class="menubar">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="all_products.php">All Products</a></li>
                        <li><a href="customer/my_account.php">My Account</a></li>
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                    </ul>
                    
                        <form id="form" method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query"/>
                        <input type="submit" name="search" value="Search"/>
                        
                        </form>
                    
                
                </div>
            </div>
        </div>
        <div class="content_wrapper">
            <div id="content_area">
                
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="color:white; float:right; font-size:18px; line-height:40px;">
                    Welcome Quest! <b>Shopping Cart</b>Total items:<?php total_items(); ?> Total Price:Ksh.<?php total_price(); ?> <a href="cart.php" style="color:#F4A460">Go to Cart</a>
                    
                    </span>
                </div>
                <div id="product_box">
                <?php
                    if(!isset($_SESSION['customer_email'])){
                        
                        include("customer_login.php");
                        
                        
                    }
                       
                       else{
                           
                           include("payment.php");
                           
                       }
                ?>       
                </div>
            
            
            </div>
			<div id="sidebar">
            
                <div id="sidebar_title">Categories</div>
                    <ul id="cats">
                        <?php getCats(); ?>
                    </ul>
                <div id="sidebar_title">Brands</div>
                    <ul id="brands">
                         <?php getBrands(); ?>
                    </ul>
            </div>
			
        
            <div id="footer"><h3>&copy; 2018 ALEGANZ DESIGNS</h3></div>
        </div>
		 	
	</body>
</html>