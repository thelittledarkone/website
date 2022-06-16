<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

// APR1-MD5 encryption method (windows compatible)
                    function crypt_apr1_md5($plainpasswd)
                    {
                    $salt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
                    $len = strlen($plainpasswd);
                    $text = $plainpasswd.'$apr1$'.$salt;
                    $bin = pack("H32", md5($plainpasswd.$salt.$plainpasswd));
                    for($i = $len; $i > 0; $i -= 16) { $text .= substr($bin, 0, min(16, $i)); }
                    for($i = $len; $i > 0; $i >>= 1) { $text .= ($i & 1) ? chr(0) : $plainpasswd{0}; }
                    $bin = pack("H32", md5($text));
                    for($i = 0; $i < 1000; $i++)
                    {
                    $new = ($i & 1) ? $plainpasswd : $bin;
                    if ($i % 3) $new .= $salt;
                    if ($i % 7) $new .= $plainpasswd;
                    $new .= ($i & 1) ? $bin : $plainpasswd;
                    $bin = pack("H32", md5($new));
                    }
                    for ($i = 0; $i < 5; $i++)
                    {
                    $k = $i + 6;
                    $j = $i + 12;
                    if ($j == 16) $j = 5;
                    $tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
                    }
                    $tmp = chr(0).chr(0).$bin[11].$tmp;
                    $tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
                    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
                    "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");

                    return "$"."apr1"."$".$salt."$".$tmp;
                    }

//Get user id
$user_id = $_SESSION['user_id'];
//get product_id
$product_id = array_column($_SESSION['cart'], 'product_id');

$sql = "SELECT * FROM products";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            foreach($product_id as $id){
                if($row['product_id'] == $id){
                    $productid = $row['product_id'];
                    $productname = $row['product_name'];
                    
                    //create credentials to view/download the file
                    // Password to be used for the user
                    $username = strval(rand(99999, 999999999999));
                    $password = strval(rand(99999, 999999999999));

                    // Encrypt password
                    $encrypted_password = crypt_apr1_md5($password);
        
                    $sql1 = "INSERT INTO library (`user_id`, `product_id`, `downloaded`, `username`, `passwd`) VALUES ('$user_id', '$productid', '0', '$username', '$password')";

                    $result1 = mysqli_query($link, $sql1);
                    //Check Query success
                    if(!$result1){
                        echo "<div class='alert alert-danger'>There was an error! The item could not be added to the library! Please contact customer support for help in resolving this issue.</div>";
                    }
                    
                    //update the htpasswd file
                    $fn = "/home3/serapces/.htpasswds/thelittledarkone.com/products/$productname/passwd";
                    $file = fopen($fn, "a+");
//                    $size = filesize($fn);
                    
                    $filetoadd = "\n" . $username . ':' . $encrypted_password;
                    
                    fwrite($file, $filetoadd);

//                    $text = fread($file, $size);
                    fclose($file);
                    
//                    Also add high definition version
//                    $hdProduct = $productname." (High Def)";
//                    $sql13 = 'SELECT * FROM products WHERE product_name="'.$hdProduct.'"';
//                    if($result13 = mysqli_query($link, $sql13)){
//                        if(mysqli_num_rows($result13)>0){
//                            while($row13 = mysqli_fetch_array($result13, MYSQLI_ASSOC)){
//                                $hdproductid = $row13['product_id'];
//
//                                $sql14 = "INSERT INTO library (`user_id`, `product_id`, `downloaded`, `username`, `passwd`, `printer_friendly`) VALUES ('$user_id', '$hdproductid', '0', '$username', '$password', '2')";
//
//                                $result14 = mysqli_query($link, $sql14);
//                                //Check Query success
//                                if(!$result14){
//                                    echo "<div class='alert alert-danger'>There was an error! The item could not be added to the library! Please contact customer support for help in resolving this issue.</div>";
//                                }
//                            }
//                        }
//                    }
                    
                    //                    Also add printer friendly version
                    $pfProduct = $productname." (Printer Friendly)";
                    $sql11 = 'SELECT * FROM products WHERE product_name="'.$pfProduct.'"';
                    if($result11 = mysqli_query($link, $sql11)){
                        if(mysqli_num_rows($result11)>0){
                            while($row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC)){
                                $pfproductid = $row11['product_id'];

                                $sql12 = "INSERT INTO library (`user_id`, `product_id`, `downloaded`, `username`, `passwd`, `printer_friendly`) VALUES ('$user_id', '$pfproductid', '0', '$username', '$password', '1')";

                                $result12 = mysqli_query($link, $sql12);
                                //Check Query success
                                if(!$result12){
                                    echo "<div class='alert alert-danger'>There was an error! The item could not be added to the library! Please contact customer support for help in resolving this issue.</div>";
                                }
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

//Send receipt via email
$message = "
<html>
    <head>
        <title>Customer Receipt</title>
    </head>
    <body>
        <p>The following items have been added to your library. Click <a href='https://thelittledarkone.com/library.php'>here</a> to go to your library and download your items</p>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>";

$sql2 = "SELECT * FROM products";
if($result2 = mysqli_query($link, $sql2)){
    if(mysqli_num_rows($result2)>0){
        while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
            foreach($product_id as $id){
                if($row2['product_id'] == $id){
                    $productName = $row2['product_name'];
                    $productPrice = number_format((float)$row2['product_price'], 2, '.', '');
                    $total = $total + (float)$row2['product_price'];

                    $message .= "
                        <tr>
                            <th>$productName</th>
                            <th>£$productPrice</th>
                        </tr>
                    ";
                }
            }
        }
    }
}
$total = number_format((float)$total, 2, '.', '');
$message .= "
            <tr>
                <td>TOTAL</td>
                <td>£$total</td>
            </tr>
        </table>
    </body>
</html>";

//Fetch email
$sql3 = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
$result3 = mysqli_query($link, $sql3);
if(mysqli_num_rows($result3)>0){
    $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
    $email = $row3['email'];
}

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <cs@thelittledarkone.com>' . "\r\n";

mail($email, 'Receipt from thelittledarkone', $message, $headers);

//reset cart
unset($_SESSION['cart']);

?>