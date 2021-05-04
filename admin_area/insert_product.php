
<?php
 
 include("includes/db.php");

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Inserting new post</title>
        <!---<script src="//tinymce.cachefly.net/4.1/tinymce.mn.js"></script>
        <script>tinymce.init({selector:textarea});</script>--->
    </head>
    <body bgcolor="#4682B4">
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <table align="center" width="600" border="2" bgcolor=" 	#5F9EA0">
                <tr>
                    <th colspan="6">Insert New Post Here</th>

                </tr>
                <tr>
                    <td align="right"><strong>Product Title</strong></td>
                    <td><input type="text" name="product_title" size="40" required="required"/></td>
                </tr>
                <tr>
                    <td align="right"><strong>Product Category</strong></td>
                    <td><select name="product_cat">
                        <option><strong>Select a Category</strong></option>
                    <?php
                    $get_cats="select * from categories"; 

                    $run_cats = mysqli_query($con, $get_cats);
                    while ($row_cats=mysqli_fetch_array($run_cats)){

                    $cat_id=$row_cats['cat_id'];
                    $cat_title=$row_cats['cat_title'];
                      echo "<option value='$cat_id'>$cat_title</option>";   
                        }
        
                        
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><strong>Product Brand</strong></td>
                    <td>
                        <select name="product_brand">
                        <option><strong>Select a Brand</strong></option>
                    <?php
                        $get_brands="select * from brands"; 
            
					$run_brands = mysqli_query($con, $get_brands);
					while ($row_brands=mysqli_fetch_array($run_brands)){
						
						$brand_id=$row_brands['brand_id'];
						$brand_title=$row_brands['brand_title'];
					  echo "<option value='$brand_id'>$brand_title</option>";   
					}
            ?>
                        </select></td>
                </tr>
                <tr>
                    <td align="right"><strong>Product Image</strong></td>
                    <td><input type="file" name="product_image" required="required"/></td>
                </tr>
                <tr>
                    <td align="right"><strong>Product Price</strong></td>
                    <td><input type="text" name="product_price" required="required"/></td>
                </tr>
                <tr>
                    <td align="right"><strong>Product Description</strong></td>
                    <td><textarea name="product_desc" rows="8" cols="25"></textarea></td>
                </tr>
                <tr>
                    <td align="right"><strong>Product Keywords</strong></td>
                    <td><input type="text" name="product_keywords" size="40" required="required"/></td>
                </tr>
                <tr align="center">
                    
                    <td colspan="6"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
                </tr>
            </table>
			
        </form>
	</body>
</html>
<?php
global $con;
if(isset($_POST['insert_post'])){
    
	//getting text data from fields
     $product_title= $_POST['product_title'];
     $product_cat= $_POST['product_cat'];
	 $product_brand= $_POST['product_brand'];
	 $product_price= $_POST['product_price']; 
	 $product_desc= $_POST['product_desc']; 
	 $product_keywords= $_POST['product_keywords']; 
    //getting image from field
     $product_image=$_FILES['product_image']['name'];
     $product_image_tmp=$_FILES['product_image']['tmp_name'];
    
    move_uploaded_file($product_image_tmp,"product_images/$product_image");
    
   $insert_product = "insert into products
   (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)
   values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
    
    
    $insert_pro = mysqli_query($con, $insert_product);
    
    if ($insert_pro){  
        
    echo "<script>alert('Successfully inserted product')</script>";
    echo "<script>window.open('insert_product.php','_self')</script>";
}
}

?>