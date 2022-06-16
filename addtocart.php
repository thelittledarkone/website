<?php
session_start();

//<!--Connect to database-->
include('connection.php');

if(isset($_POST['product_id'])){

    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], 'product_id');
        
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "Already in Cart!";
        }else{
            $count = count($_SESSION['cart']);
            $item_array=array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count]=$item_array;
        }
    }else{
        $item_array=array(
            'product_id' => $_POST['product_id']
        );
        //Create session variable
        $_SESSION['cart'][0]=$item_array;
    }
}

?>

