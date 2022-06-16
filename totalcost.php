<?php
session_start();
include('connection.php');

//get product_id
$product_id = array_column($_SESSION['cart'], 'product_id');

////variables
$total = 0;

//run query to look for notes corresponding to user_id
$sql = "SELECT * FROM products";

//show notes or alert message
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){            
            foreach($product_id as $id){
                if($row['product_id'] == $id){
                    $total = $total + (float)$row['product_price'];
                    
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

$total = number_format((float)$total, 2, '.', '');
$count = count($_SESSION['cart']);
echo "£".$total;
echo "
    <input type='hidden' name='cmd' value='_ext-enter'>
    <input type='hidden' name='amount' id='paymentamount' value='$total'>
    <input type='hidden' name='cartcount' id='cart_count_input' value='$count'>
    
";
?>