<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$data = $_SESSION['data'];
$product_array = array_column($_SESSION['cart'], 'product_id');

$sql = "SELECT * FROM products WHERE product_name LIKE '%$data%' AND printer_friendly='0'";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $productID = $row['product_id'];
            $productName = $row['product_name'];
            $productDescription = $row['product_description'];
            $productPrice = number_format((float)$row['product_price'], 2, '.', '');
            $productImage = $row['product_image'];
            
            $inArray = 0;
            foreach($product_array as $id){
                if($productID == $id){
                    $inArray = 1;
                }
            }
            
            echo "
        <div class='col-sm-6 col-md-3'>
            <div class='panel-custom productPanel'>
                ";
            echo '<a href="productprofile.php?product_name='.$productName.'">';
            echo " 
                <div class='panel-heading'><img src='$productImage' class='navProfilePic FPic'>
                </div>
                </a>
                <div class='panel-body'>
                    <h2 class='panel-title'>$productName</h2>";
                        if($productPrice > 0){
                            echo "<h4>£$productPrice</h4>";
                        }else{
                            echo "<h4>FREE!</h4>";
                        }
            $sql1 = "SELECT * FROM library WHERE product_id='$productID' AND user_id='$user_id'";
            $result1 = mysqli_query($link, $sql1);
            if(mysqli_num_rows($result1)==0){
                if($inArray == 1){
                    echo "
                      <a type='button' class='btn btnDone' href='cart.php'>Checkout <i class='fas fa-shopping-cart'></i></a>";
                }else{
                    echo "
                      <button type='submit' name='add' class='btn btnDone addtocart' id='$productID'>Add to Cart</button>";
                }
                echo '
                                  <a type="button" name="add" class="btn cancelBtn" href="productprofile.php?product_name='.$productName.'">More Details</a>
                                  <input type="hidden" name="product_id" value="' . $productID . '">';
            }else{
                echo "
                        <a type='button' name='add' class='btn btnDone' href='library.php'>Go To My Library</a>
                        <a type='button' name='add' class='btn cancelBtn' href='productprofile.php?product_name=$productName'>More Details</a>";
            }
                    echo "    
                </div>
            </div>
        </div>
                ";
                
            
        }
    }
}
?>