
<?php 
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
                
                <div id="shopping_cart">
                    <span style=" color:white; float:right; font-size:18px; line-height:40px;">
                    Welcome Quest! <b>Shopping Cart</b>Total items: Total Price <a href="cart.php" style="color:#F4A460">Go to Cart</a>
                    
                    </span>
                </div>
                <div id="product_box">
                
                   <?php
                    $get_pro = "select * from products order by 1 DESC";

                        $run_pro = mysqli_query($con, $get_pro);


                        while($row_pro=mysqli_fetch_array($run_pro)){

                             $pro_id = $row_pro['product_id'];
                             $pro_cat = $row_pro['product_cat'];
                             $pro_brand = $row_pro['product_brand'];
                             $pro_title = $row_pro['product_title'];
                             $pro_price = $row_pro['product_price'];
                             $pro_image = $row_pro['product_image'];

                            echo "

                            <div id='single_product'>
                            <h3>$pro_title</h3>
                            <img src='admin_area/product_images/$pro_image' width='200' height='200'/>
                            <p><b>Ksh.$pro_price</b></><br>
                            <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                            <a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
                            </div>



                            ";

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