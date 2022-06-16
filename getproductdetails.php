<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$product_name = $_SESSION["product_name"];
$product_array = array_column($_SESSION['cart'], 'product_id');

//Get username and email
$sql = 'SELECT * FROM products WHERE product_name="'.$product_name.'" LIMIT 1';
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $productID = $row['product_id'];
    $productName = $row['product_name'];
    $productDescription = $row['product_description'];
    $productPrice = number_format((float)$row['product_price'], 2, '.', '');
    $productImage = $row['product_image'];
    if($row['product_cat'] == 'c'){
        $type = 'Class Option';
    }elseif($row['product_cat'] == 'm'){
        $type = 'Monster Block';
    }elseif($row['product_cat'] == 'g'){
        $type = 'Game Mechanic';
    }elseif($row['product_cat'] == 'v'){
        $type = 'Adventure';
    }elseif($row['product_cat'] == 'x'){
        $type = 'Campaign';
    }elseif($row['product_cat'] == 'w'){
        $type = 'World Building';
    }elseif($row['product_cat'] == 'z'){
        $type = 'Compendium';
    }
    
    foreach($product_array as $id){
        if($productID == $id){
            $inArray = 1;
        }
    }
    
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
}

$synopsisToDisplay = nl2br(htmlentities($productDescription, ENT_QUOTES, 'UTF-8'));


echo "
    <h2>$productName</h2>
                    <div class='row'>
                        <div class='col-xs-5' id='pictureCell'>
                            <img src='$productImage' class='gamePageProfilePic'>";
                            if($inArray == 1){
                                echo '
                                  <a type="button" class="btn btnDone lrgBtn" href="cart.php">Checkout <i class="fas fa-shopping-cart"></i></a>';
                            }else{
                                echo '
                                  <button type="submit" name="add" class="btn btnDone lrgBtn addtocart" id="'.$productID.'">Add to Cart</button>';
                            }
                echo "
                        </div>
                        <div class='col-xs-7'>
                            <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td>Name:</td>
                                    <td class='borderedRight'>$productName</td>
                                    <td>Genre:</td>
                                    <td></td>
                                </tr>
                            </table>
                            <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td>Game:</td>
                                    <td class='borderedRight'>D&D 5e</td>
                                    <td>Type:</td>
                                    <td class='borderedRight'>$type</td>
                                    <td>Age Rating:</td>
                                    <td>14+</td>
                                </tr>
                            </table>
                            <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td>Company:</td>
                                    <td class='borderedRight'>thelittledarkone.com</td>
                                    <td>Creator:</td>
                                    <td>thelittledarkone</td>
                                </tr>
                            </table>
                            <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td>Illustrators:</td>
                                    <td></td>
                                </tr>
                            </table>
                            
                            <table class='table table-condensed statsTable vTable'>
                                <tr>
                                    <td>Name:</td>
                                    <td>$productName</td>
                                 </tr>
                                <tr>
                                    <td>Game:</td>
                                    <td>D&D 5e</td>
                                </tr>
                                <tr>
                                    <td>Type:</td>
                                    <td>$type</td>
                                 </tr>
                                 <tr>
                                    <td>Genre:</td>
                                    <td></td>
                                 </tr>
                                 <tr>
                                    <td>Age:</td>
                                    <td>14+</td>
                                 </tr>
                            </table>
                            
                            <h3 class='dTable'>About $productName</h3>
                            <div class='dTable'>$synopsisToDisplay</div>
                             
                        </div>
                    </div>
                   
                    <table class='table table-condensed statsTable vTable'>
                        <tr>
                            <td>Company:</td>
                            <td>thelittledarkone.com</td>
                        </tr>
                        <tr>
                            <td>Creator:</td>
                            <td>thelittledarkone</td>
                        </tr>
                    </table>
                    <table class='table table-condensed statsTable vTable'>
                        <tr>
                            <td>Illustrators:</td>
                            <td></td>
                        </tr>
                    </table>
                    
                    <h3 class='vTable'>About $productName</h3>
                    <div class='vTable'>$synopsisToDisplay</div>
                        ";

?>