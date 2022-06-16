<?php
session_start();
include('connection.php');

////get id
$user_id = $_SESSION['user_id'];
$refine = $_POST['refine'];
$sort = $_POST['sort'];
$product_array = array_column($_SESSION['cart'], 'product_id');

$sql = "SELECT * FROM products WHERE printer_friendly='0'";

if($sort == ''){
    $sort = $_SESSION['sort'];
    if($sort == ''){
        $sort = 'r';
        $_SESSION['sort'] = $sort;
    }
}

if($refine == ''){
    $refine = $_SESSION['refine'];
    if($refine == ''){
        $refine = 'a';
        $_SESSION['refine'] = $refine;
    }
}

if($refine == 'f'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_price='0'";
}elseif($refine == 'c'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_cat='c'";
}elseif($refine == 'g'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_cat='g'";
}elseif($refine == 'v'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_cat='v'";
}elseif($refine == 'x'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_cat='x'";
}elseif($refine == 'm'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_cat='m'";
}elseif($refine == 'z'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_cat='z'";
}elseif($refine == 'w'){
    $_SESSION['refine'] = $refine;
    $sql .= " AND product_cat='w'";
}elseif($refine == 'a'){
    $_SESSION['refine'] = $refine;
}

if($sort == 'p'){
    $_SESSION['sort'] = $sort;
    $sql .= " ORDER BY product_price ASC";
}elseif($sort == 'c'){
    $_SESSION['sort'] = $sort;
    $sql .= " ORDER BY product_price DESC";
}elseif($sort == 'r'){
    $_SESSION['sort'] = $sort;
    $sql .= " ORDER BY product_id DESC";
}elseif($sort == 'l'){
    $_SESSION['sort'] = $sort;
    $sql .= " ORDER BY product_id ASC";
}


if($result = mysqli_query($link, $sql)){
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
                    
            $sql1 = "SELECT * FROM library WHERE product_id='$productID' AND user_id='$user_id'";
            $result1 = mysqli_query($link, $sql1);
            if(mysqli_num_rows($result1)==0){
            
                echo '
            <div class="col-md-3 col-sm-6">
                          <div class="panel panel-warning">
                              <div class="panel-heading">
                                  <img src="' . $productImage . '" alt="Image1" class="img-fluid card-image-top shopItem">
                              </div>
                              <div class="panel-body">
                                  <h2 class="panel-title">' . $productName . '</h2>
                                  <p class="panel-text">'.$productDescription.'</p>';
                                         if($productPrice > 0){
                                             echo '<h4>£'.$productPrice.'</h4>';
                                         }else{
                                             echo '<h4>FREE!</h4>';
                                         }
                            if($inArray == 1){
                                echo '
                                  <a type="button" class="btn btnDone" href="cart.php">Checkout <i class="fas fa-shopping-cart"></i></a>';
                            }else{
                                echo '
                                  <button type="submit" name="add" class="btn btnDone addtocart" id="'.$productID.'">Add to Cart</button>';
                            }
                                         echo '
                                  <a type="button" name="add" class="btn cancelBtn" href="productprofile.php?product_name='.$productName.'">More Details</a>
                                  <input type="hidden" name="product_id" value="' . $productID . '">
                              </div>
                          </div>                  
                  </div>
            ';
            }
                
            
            
            
        }
    }else{
        echo '<div class="alert alert-warning">No products found.</div>';
    }
}else{
    echo '<div class="alert alert-warning">An error occured, finding products.</div>';
}
            
?>