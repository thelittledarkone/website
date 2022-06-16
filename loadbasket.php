<?php
session_start();
include('connection.php');

//get id
$user_id = $_SESSION['user_id'];
$product_id = array_column($_SESSION['cart'], 'product_id');

$sql = "SELECT * FROM products";

//show notes or alert message
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            foreach($product_id as $id){
                if($row['product_id'] == $id){
                    $productName = $row['product_name'];
                    $productPrice = number_format((float)$row['product_price'], 2, '.', '');
                    $productImage = $row['product_image'];
                    $productID = $row['product_id'];
                    
                    $sql1 = "SELECT * FROM library WHERE product_id='$productID' AND user_id='$user_id'";
                    $result1 = mysqli_query($link, $sql1);
                    if(mysqli_num_rows($result1)==0){

                    echo '
                             <div class="bordered">
                                 <div class="row">
                                     <div class="col-xs-3 col-xs-offset-0 col-md-offset-1 cartPicture">
                                         <img src="'.$productImage.'">
                                     </div>
                                     <div class="col-xs-7 col-xs-offset-0 cartCard">
                                         <h2>'.$productName.'</h2>';
                                         if($productPrice > 0){
                                             echo '<h4>£'.$productPrice.'</h4>';
                                         }else{
                                             echo '<h4>FREE!</h4>';
                                         }
                                         echo '
                                         <button class="btn btn-danger removeItem" name="remove" id="'.$productID.'">Remove</button>
                                     </div>
                                </div>
                            </div>
                    ';
                    }else{
                        foreach($_SESSION['cart'] as $key=>$value){
                            if($value['product_id'] == $productID){
                                unset($_SESSION['cart'][$key]);
                            }
                        }
                    }
                    
                }
            }
        }
    }else{
        echo '<div class="alert alert-warning">Nothing in the cart.</div>';
    }
}else{
    echo '<div class="alert alert-warning">An error occured, finding your cart.</div>';
//    echo mysqli_error($link); USED FOR DEBUGGING
}
?>