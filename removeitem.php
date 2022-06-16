<?php
session_start();

//<!--Connect to database-->
include('connection.php');

//Get product id
$product_id = array_column($_SESSION['cart'], 'product_id');

if(isset($_POST['product_id'])){
    foreach($_SESSION['cart'] as $key=>$value){
        if($value['product_id'] == $_POST['product_id']){
            unset($_SESSION['cart'][$key]);
        }
    }
}
?>

